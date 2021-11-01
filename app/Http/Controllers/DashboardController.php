<?php

namespace App\Http\Controllers; 
use App\Models\Mitras;
use App\Models\Surveys;
use Carbon\Carbon;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // buat dashboard di sini
        // $jumlah = Mitras::total();
        // dd($jumlah);
        $total_mitra = count(Mitras::all());

        // $saiki = Carbon::now()->toDateTimeString();
        $start_date = Surveys::get('start_date');
        $end_date = Surveys::get('end_date');
        $surveys = Surveys::whereBetween('saiki', [$start_date, $end_date])->get();

        return view('home', compact('total_mitra', 'surveys'));
    }
}
