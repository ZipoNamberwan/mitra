<?php

namespace App\Http\Controllers;

use App\Models\Mitras;
use App\Models\Subdistricts;
use App\Models\Surveys;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;




class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $id)
    {

        $total_mitra = count(Mitras::all());

        $surveys = Surveys::all();
        $now = new DateTime(date("Y-m-d"));
        $currentsurveys = [];
        foreach ($surveys as $survey) {
            $start = $survey->start_date;
            $end = $survey->end_date;

            $s =  new DateTime($start);
            $e =  new DateTime($end);
            if ($now >= $s && $now <= $e)
                $currentsurveys[] = $survey;
        }

        $mitras = Mitras::all();
        $kecamatan = Subdistricts::all();
        $data = [];

        foreach ($kecamatan as $dt) {
            $data[$dt->name] = 0;
        }

        foreach ($mitras as $mitra) {
            $data[$mitra->subdistrictdetail->name]++;
        }
        $label = [];
        $total = [];

        foreach ($data as $key => $value) {
            $label[] = $key;
            $total[] = $value;
        }

        $label = json_encode($label);
        $total = json_encode($total);

        $bestmitras = DB::select('SELECT `assessmentvalue`.`mitra_id`, `assessmentvalue`.`cooperation`, `assessmentvalue`.`communication`, `assessmentvalue`.`dicipline`, `assessmentvalue`.`itskill`, `assessmentvalue`.`integrity`, `mitras`.`name`, (`assessmentvalue`.`cooperation` + `assessmentvalue`.`communication` + `assessmentvalue`.`dicipline`+ `assessmentvalue`.`itskill`+ `assessmentvalue`.`integrity`)/5 AS `totalaverage` FROM (SELECT `mitra_id`, AVG(`cooperation`) AS `cooperation`, AVG(`communication`) AS `communication`, AVG(`dicipline`) AS `dicipline`, AVG(`itskill`) AS `itskill`, AVG(`integrity`) AS `integrity` FROM `assessments`, `mitras_surveys` WHERE `assessments`.`id` = `mitras_surveys`.`assessment_id` GROUP BY `mitra_id`) AS `assessmentvalue`, `mitras` WHERE `mitras`.email = `assessmentvalue`.mitra_id ORDER BY `totalaverage` DESC  LIMIT 10');

        return view('home', compact('total_mitra', 'bestmitras', 'currentsurveys', 'label', 'total'));
    }


    public function data(Request $request)
    {
        if ($request->id == 0) {
            return json_encode([
                "draw" => $request->draw,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            ]);
        } else {
            $survey = Surveys::find($request->id);
            $mitras = $survey->mitras;
            $recordsTotal = count($mitras);
            $recordsFiltered = $mitras->where('name', 'like', '%' . $request->search["value"] . '%')->count();

            $orderColumn = 'name';
            $orderDir = 'desc';
            if ($request->order != null) {
                if ($request->order[0]['dir'] == 'asc') {
                    $orderDir = 'asc';
                } else {
                    $orderDir = 'desc';
                }
                if ($request->order[0]['column'] == '2') {
                    $orderColumn = 'name';
                } else if ($request->order[0]['column'] == '3') {
                    $orderColumn = 'email';
                }
            }
            $searchkeyword = $request->search['value'];
            if ($searchkeyword != null) {
                $mitras = $mitras->filter(function ($q) use (
                    $searchkeyword
                ) {
                    return Str::contains(strtolower($q['name']), strtolower($searchkeyword));
                });
            }
            if ($orderDir == 'asc') {
                $mitras = $mitras->sortBy($orderColumn)->skip($request->start)
                    ->take($request->length);
            } else {
                $mitras = $mitras->sortByDesc($orderColumn)->skip($request->start)
                    ->take($request->length);
            }

            $mitrasArray = array();
            $i = $request->start + 1;
            foreach ($mitras as $mitra) {
                $mitraData = array();
                $mitraData["index"] = $i;
                $mitraData["name"] = $mitra->name;
                $mitraData["email"] = $mitra->email;
                $mitraData["id"] = $mitra->email;
                $mitrasArray[] = $mitraData;
                $i++;
            }
            return json_encode([
                "draw" => $request->draw,
                "recordsTotal" => $recordsTotal,
                "recordsFiltered" => $recordsFiltered,
                "data" => $mitrasArray
            ]);
        }
    }
}
