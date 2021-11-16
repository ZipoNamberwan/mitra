<?php

namespace App\Http\Controllers;

use App\Models\Statuses;
use App\Models\Surveys;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class RecruitmentController extends Controller
{
    public function index()
    {
        return view('recruitment.recruitment-index', [
            'surveys' => Surveys::all()
        ]);
    }

    public function create()
    {
        return view('recruitment.recruitment-create', [
            'surveys' => Surveys::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id.*' => 'required',
            'survey' => 'required'
        ]);

        $survey = Surveys::find($request->survey);
        $pivotarray = [];
        foreach ($request->id as $id) {
            $pivotarray[$id] = ['status_id' => 2];
        }
        $survey->mitras()->syncWithoutDetaching($pivotarray);

        return redirect('/recruitments')->with(['survey-id' => $request->survey, 'message' => 'Mitra telah diterima sebagai petugas ' . $survey->name, 'type' => 'approve']);
    }

    public function accept(Request $request)
    {
        $survey = Surveys::find($request->surveyid);
        $survey->mitras()->updateExistingPivot($request->id, ['status_id' => 2]);
        return redirect('/recruitments')->with(['survey-id' => $request->surveyid, 'message' => 'Mitra telah diterima sebagai petugas ' . $survey->name, 'type' => 'approve']);
    }

    public function reject(Request $request)
    {
        $survey = Surveys::find($request->surveyid);
        $survey->mitras()->updateExistingPivot($request->id, ['status_id' => 3]);
        return redirect('/recruitments')->with(['survey-id' => $request->surveyid, 'message' => 'Mitra telah ditolak sebagai petugas ' . $survey->name, 'type' => 'reject']);
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
                $mitraData = array();
                $mitraData["index"] = $i;
                $mitraData["name"] = $mitra->name;
                $mitraData["email"] = $mitra->email;
                $mitraData["photo"] = $mitra->photo != null ? asset('storage/' . $mitra->photo) : asset('storage/images/profile.png');
                // $mitraData["phone"] = count($mitra->phonenumbers) > 0 ? $mitra->phonenumbers[0]->phone : '';
                $mitraData["phone"] = $mitra->pivot->phone_survey ?? '-';
                $status = Statuses::find($mitra->pivot->status_id);
                $mitraData["status_id"] = $status->name;
                $mitraData["status_color"] = 'secondary';
                if ($status->id == 2) {
                    $mitraData["status_color"] = 'success';
                } else if ($status->id == 3) {
                    $mitraData["status_color"] = 'danger';
                }
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
