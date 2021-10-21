<?php

namespace App\Http\Controllers;

use App\Models\Mitras;
use App\Models\Statuses;
use App\Models\Surveys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;


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
        $survey->mitras()->attach($request->id, ['status_id' => 2]);
        // // $survey -> mitras()->detach(where::$request->id == id);

        // return redirect('/recruitments');

        //  $survey = Surveys::create($request->surveys);
        //  //Get skills id to link with contract
        //  $data = $request->mitras;
        //  //syncs with additional data
        //  $survey->mitras()->sync(array_column($data, 'id'), ['id'=>auth()->user()->id]);
 
        return view('recruitment.recruitment-index', [
            'surveys' => Surveys::all()
        ]);
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
            if ($request->order[0]['column'] == '2') {
                $orderColumn = 'name';
            } else if ($request->order[0]['column'] == '3') {
                $orderColumn = 'email';
            }
        }
        // $mitras = Mitras::where('name', 'like', '%' . $request->search["value"] . '%')
        //     ->orderByRaw($orderColumn . ' ' . $orderDir)
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
            // $mitraData["status_id"] = $mitra->surveys[0]->name;
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
