<?php

namespace App\Http\Controllers;

use App\Models\Assessments;
use App\Models\Surveys;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AssessmentController extends Controller
{
    public function create(Request $request)
    {
        $idsurvey = $request->id;
        $survey = Surveys::find($idsurvey);
        $mitras = $survey->mitras;
        foreach ($mitras as $mitra) {
            $assessmentid = DB::table('mitras_surveys')
                ->where('id', '=', $mitra->pivot->id)
                ->first()->assessment_id;
            if ($assessmentid == null) {
                $data = array(
                    'cooperation' => 7,
                    'communication' => 7,
                    'dicipline' => 7,
                    'itskill' => 7,
                    'integrity' => 7,
                );
                $assessment = Assessments::create($data);
                DB::table('mitras_surveys')
                    ->where('id', $mitra->pivot->id)
                    ->update(['assessment_id' => $assessment->id]);
            }
        }
        return view('survey.survey-assessment', ['idsurvey' => $idsurvey, 'surveyname' => $survey->name]);
    }

    public function assess(Request $request)
    {
        $response = array();

        $validator = Validator::make($request->all(), [
            'value' => 'required|numeric|min:0|max:10',
            'idpivot' => 'required',
        ]);

        if ($validator->fails()) {
            $response['is_success'] = false;
            $response['message'] = 'Range Penilaian 1 - 10';
            return $response;
        }

        try {
            $pivot = DB::table('mitras_surveys')
                ->where('id', '=', $request->idpivot)
                ->first();

            if ($pivot->assessment_id != null) {
                $assessment = Assessments::find($pivot->assessment_id);
                $assessment->cooperation = $request->value;
                $assessment->communication = $request->value;
                $assessment->dicipline = $request->value;
                $assessment->itskill = $request->value;
                $assessment->integrity = $request->value;
                $assessment->save();
            } else {
                $data = array(
                    'cooperation' => $request->value,
                    'communication' => $request->value,
                    'dicipline' => $request->value,
                    'itskill' => $request->value,
                    'integrity' => $request->value,
                );
                $assessment = Assessments::create($data);
                DB::table('mitras_surveys')
                    ->where('id', $request->idpivot)
                    ->update(['assessment_id' => $assessment->id]);
            }
            $response['is_success'] = true;
            $response['test'] = $validator->fails();
        } catch (Exception $e) {
            $response['is_success'] = false;
            $response['message'] = 'Gagal';
        }

        return $response;
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
            $recordsFiltered = $mitras->count();
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
                if ($mitra->pivot->status_id == 2) {
                    $mitraData = array();
                    $mitraData["index"] = $i;
                    $mitraData["name"] = $mitra->name;
                    $assessmentid = DB::table('mitras_surveys')
                        ->where('id', '=', $mitra->pivot->id)
                        ->first()->assessment_id;
                    if ($assessmentid != null) {
                        $assessment = Assessments::find($assessmentid);
                        $value = ($assessment->cooperation
                            + $assessment->communication
                            + $assessment->dicipline
                            + $assessment->itskill
                            + $assessment->integrity) / 5;

                        $mitraData["value"] = $value;
                    } else {
                        $mitraData["value"] = 7;
                    }

                    $mitraData["idpivot"] = $mitra->pivot->id;
                    $mitraData["id"] = $mitra->email;
                    $mitrasArray[] = $mitraData;
                    $i++;
                }
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
