<?php

namespace App\Http\Controllers;

use App\Models\Mitras;
use App\Models\Statuses;
use App\Models\Surveys;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function getSurveyMitra()
    {
        return view('survey.survey-assessment');
    }

    public function data(Request $request)
    {
        $survey = Surveys::find($request->id);
        $mitras = $survey->mitras;
        $recordsTotal = count($mitras);
        $recordsFiltered = $mitras->where('name', 'like', '%' . $request->search["value"] . '%')->count();

        $orderColumn = 'created_at';
        $orderDir = 'DESC';
        if ($request->order != null) {
            if ($request->order[0]['dir'] == 'asc') {
                $orderDir = 'asc';
            } else {
                $orderDir = 'desc';
            }
            if ($request->order[0]['column'] == '3') {
                $orderColumn = 'name';
            } else if ($request->order[0]['column'] == '4') {
                $orderColumn = 'email';
            }
        }
        $mitra = Mitras::where('name', 'like', '%' . $request->search["value"] . '%')
            ->orderByRaw($orderColumn . ' ' . $orderDir)
            ->get();
        $mitrasArray = array();
        $i = 1;
        foreach ($mitras as $mitra) {
            $mitraData = array();
            $mitraData["index"] = $i;
            $mitraData["name"] = $mitra->name;
            $mitraData["email"] = $mitra->email;
            $mitraData["phone"] = count($mitra->phonenumbers) > 0 ? $mitra->phonenumbers[0]->phone : '';
            $mitraData["status_id"] = Statuses::find($mitra->surveys[0]->pivot->status_id)->name;
            //$mitraData["status_id"] = $mitra->surveys[0]->name;
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
