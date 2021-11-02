<?php

namespace App\Http\Controllers;

use App\Models\Mitras;
use App\Models\Surveys;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $total_mitra = count(Mitras::all());

        $surveys = Surveys::all();
        $now = new DateTime(date("Y-m-d"));
        $currentsurveys = [];
        foreach ($surveys as $survey) {
            $start = $survey->start_date;
            $end = $survey->end_date;

            $s =  new DateTime($start);
            $e =  new DateTime($end);
            if ($now > $s && $now < $e)
                $currentsurveys[] = $survey;
        }

        $mitras = Mitras::all();
        // $nama_mitra = [];
        // foreach($mitras as $mitra){
        // $nama_mitra []= $mitra->name;
        // // $nama_mitra = $mitra->name;
        // dd($nama_mitra);
        // }

        
        // foreach($mitras as $mitra => ){
        //     $mitra= $mitras->hasMany->mitra_id;
        //     dd($mitra);
        // }

        // $survey = Surveys::find($request->id);
        //     $mitras = $survey->mitras;
        //     $recordsTotal = count($mitras);
        //     $recordsFiltered = $mitras->where('name', 'like', '%' . $request->search["value"] . '%')->count();

        return view('home', compact('total_mitra', 'currentsurveys', 'mitras'));
    }
}
