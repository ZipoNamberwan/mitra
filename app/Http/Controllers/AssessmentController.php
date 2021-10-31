<?php

namespace App\Http\Controllers;

use App\Models\Assessments;
use App\Models\Mitras;
use App\Models\Statuses;
use App\Models\Surveys;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AssessmentController extends Controller
{
    public function getSurveyMitra(Request $request)
    {
        $idsurvey = $request->id;
        return view('survey.survey-assessment', compact('idsurvey'));
    }

    public function create(Request $request)
    {


        $this->validate(
            $request,
            [
                'rating' => 'required',
                'idpivot' => 'required'
            ]
        );

        foreach ($request->idpivot as $key=>$insert){
            $data = [
                'id' => $request->idpivot[$key],
                'kerjasama' => $request->rating[$key],
                'komunikasi' => $request->rating[$key],
                'disiplin' => $request->rating[$key],
                'sikap' => $request->rating[$key],
                'integritas' => $request->rating[$key],
                
            ];
            
            DB::table('assessments')->insert($data);
        }

      


        

      
        return redirect('/surveys')->with('success-create', ' penilaian telah ditambah!');
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
            $i = 1;
            foreach ($mitras as $mitra) {
                $mitraData = array();
                $mitraData["index"] = $i;
                $mitraData["name"] = $mitra->name;
                $mitraData["idpivot"] = $mitra->pivot->id;
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
