<?php

namespace App\Http\Controllers;

use App\Models\Surveys;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        $surveys = Surveys::all();
        return view('download.download', compact('surveys'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
        ]);

        $surveys = Surveys::all();
        return view('download.download', compact('surveys'));
    }
}
