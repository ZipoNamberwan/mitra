<?php

namespace App\Http\Controllers;
use App\Models\Assessments; 

use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function index(){

        return view('assessment.assessment-create');
    }
}
