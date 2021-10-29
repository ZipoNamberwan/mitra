<?php

namespace App\Http\Controllers; 
use App\Models\Mitras;
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
        $jumlah = Mitras::where('email')::total();
        return view('home');
    }
}
