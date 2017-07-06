<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportJournalController extends Controller
{
    //
    public function index(){


        return view('report.journal.journal-dashboard');
    }
}
