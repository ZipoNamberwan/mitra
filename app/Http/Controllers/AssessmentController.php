<?php

namespace App\Http\Controllers;

use App\Models\Assessments;
use App\Models\Surveys;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AssessmentController extends Controller
{
    public function create(Request $request)
    {
        $idsurvey = $request->id;
        return view('survey.survey-assessment', compact('idsurvey'));
    }

    public function assess(Request $request)
    {
        $response = array();
        try {
            $pivot = DB::table('mitras_surveys')
                ->where('id', '=', $request->idpivot)
                ->first();

            if ($pivot->assessment_id != null) {
                $assessment = Assessments::find($pivot->assessment_id);
                $assessment->kerjasama = $request->value;
                $assessment->komunikasi = $request->value;
                $assessment->disiplin = $request->value;
                $assessment->sikap = $request->value;
                $assessment->integritas = $request->value;
                $assessment->save();
            } else {
                $data = array(
                    'kerjasama' => $request->value,
                    'komunikasi' => $request->value,
                    'disiplin' => $request->value,
                    'sikap' => $request->value,
                    'integritas' => $request->value,
                );
                $assessment = Assessments::create($data);
                DB::table('mitras_surveys')
                    ->where('id', $request->idpivot)
                    ->update(['assessment_id' => $assessment->id]);
            }
            $response['is_success'] = true;
            $response['test'] = $pivot->assessment_id;
        } catch (Exception $e) {
            $response['is_success'] = false;
            $response['message'] = 'djasdjas';
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
                $assessmentid = DB::table('mitras_surveys')
                    ->where('id', '=', $mitra->pivot->id)
                    ->first()->assessment_id;
                if ($assessmentid != null) {
                    $assessment = Assessments::find($assessmentid);
                    $value = ($assessment->kerjasama
                        + $assessment->komunikasi
                        + $assessment->disiplin
                        + $assessment->sikap
                        + $assessment->integritas) / 5;

                    $mitraData["value"] = $value;
                } else {
                    $mitraData["value"] = 7;
                }

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
