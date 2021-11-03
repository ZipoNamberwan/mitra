<?php

namespace App\Http\Controllers;

use App\Models\Surveys;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Surveys::all();
        return view('survey.survey-index', compact('surveys'));
    }

    public function create()
    {
        return view('survey.survey-create');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'start_date' => 'required',
                'end_date' => 'required'
            ]
        );

        Surveys::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);

        return redirect('/surveys')->with('success-create', 'Survey telah ditambah!');;
    }

    public function edit($id)
    {
        $survey = Surveys::find($id);
        return view('survey.survey-edit', compact('survey'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'start_date' => 'required',
                'end_date' => 'required'
            ]
        );

        Surveys::find($id)->update([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);

        return redirect('/surveys')->with('success-create', 'Survey telah diubah!');;
    }

    public function destroy($id)
    {
        $survey = Surveys::find($id);
        $survey->delete();
        return redirect('/surveys')->with('success-delete', 'Survey telah dihapus!');
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
            if ($request->order[0]['column'] == '1') {
                $orderColumn = 'name';
            } else if ($request->order[0]['column'] == '2') {
                $orderColumn = 'start_date';
            } else if ($request->order[0]['column'] == '3') {
                $orderColumn = 'end_date';
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

    public function show()
    {
        // $surveys = Surveys::all();
    }
}
