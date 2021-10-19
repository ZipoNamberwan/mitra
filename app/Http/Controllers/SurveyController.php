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

    public function create()
    {
        return view('survey.survey-create');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            ['name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
    ]);

        
        Surveys::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);

        return redirect('/testsurvey');
    }

    public function getSurveyMitra()
    {
        return view('survey.survey-assessment');
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
