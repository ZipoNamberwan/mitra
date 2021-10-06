<?php

namespace App\Http\Controllers;


use App\Models\Mitras;
use App\Models\Educations;
use App\Models\PhoneNumbers;
use App\Models\Subdistricts;
use App\Models\Surveys;
use App\Models\Villages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    public function index()
    {
        
        return view('survey.survey-index');
    }

    public function data(Request $request)
    {
        $recordsTotal = Surveys::count();
        $recordsFiltered = Surveys::where('name', 'like', '%' . $request->search["value"] . '%')->count();
        
        $orderColumn = 'end_date';
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

        $surveys = Surveys::where('name', 'like', '%' . $request->search["value"] . '%')            
        ->orderByRaw($orderColumn . ' ' . $orderDir)
        ->get();
        $surveysArray = array();
        $i = 1;
        foreach ($surveys as $survey) {
            $surveyData = array();
            $surveyData["index"] = $i;
            $surveyData["name"] = $survey->name;
            $surveyData["start_date"] = $survey->start_date;
            $surveyData["end_date"] = $survey->end_date;
            $surveyData["id"] = $survey->id;
            $surveysArray[] = $surveyData;
            $i++;
        }
        return json_encode([
            "draw" => $request->draw,
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $surveysArray
        ]);
    }
}
