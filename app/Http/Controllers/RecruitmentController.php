<?php

namespace App\Http\Controllers;

use App\Models\Mitras;
use App\Models\Statuses;
use App\Models\Surveys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecruitmentController extends Controller
{
    public function index()
    {
        return view('recruitment.recruitment-index', [
            'surveys' => Surveys::all()
        ]);
    }

    // public function json(Request $request)
    // {

    //     if ($request->survey_id) {
    //         $members = Mitras::where('survey_id', $request->survey_id)->get();
    //         return response()->json(['data' => $members]);
    //     } else {
    //         $members = Mitras::get();
    //         return response()->json(['data' => $members]);
    //     }
    // }

    public function data(Request $request)
    {
        $survey = Surveys::find($request->id);
        $mitras = $survey->mitras;
        $recordsTotal = count($mitras);
       
        $recordsFiltered =  $mitras->where('name', 'like', '%' . $request->search["value"] . '%')
            ->count();

        

        $orderColumn = 'name';
        $orderDir = 'DESC';
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
        // $mitras = $mitras->where('name', 'like', '%' . $request->search["value"] . '%')
            
        //     ->sortBy ($orderColumn . ' ' . $orderDir)
        //     ->skip($request->start)
        //     ->take($request->length)
        //     ->get();
        $mitrasArray = array();
        $i = 1;
        foreach ($mitras as $mitra) {
            $mitraData = array();
            $mitraData["index"] = $i;
            $mitraData["name"] = $mitra->name;
            $mitraData["email"] = $mitra->email;
            $mitraData["phone"] = count($mitra->phonenumbers) > 0 ? $mitra->phonenumbers[0]->phone : '';
            $mitraData["status_id"] = Statuses::find($mitra->surveys[0]->pivot->status_id)->name;
            
            $mitraData["id"] = $mitra->id;
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
