<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportProjectController extends Controller
{

    //
    public function index(){


        return view('report.project.project-dashboard');
    }
}
