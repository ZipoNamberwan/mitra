<?php

namespace App\Http\Controllers; 
use App\Models\Mitras;
use Request;

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
        $jumlah = Mitras::total();
        return view('home', ['jumlah'=>$jumlah]);
    }
}
