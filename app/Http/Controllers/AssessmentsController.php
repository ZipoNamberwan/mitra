<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssessmentsController extends Controller
{
    public function index(){
        return view('survey.survey-assessments');
    }

    public function getSurveyMitra()
    {
        return view('survey.survey-assessments');
    }
}
