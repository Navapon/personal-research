<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportProjectController extends Controller
{

    //
    public function index ($fund_type = "", $year = "")
    {

        $byMajors = $users = DB::table('majors as m')
            ->leftjoin('users as u', 'm.major_id', '=', 'u.u_major_id')
            ->leftjoin('users_research as ur', 'ur.u_id', '=', 'u.u_id')
            ->leftjoin('research_project as rp', 'rp.rp_id', '=', 'ur.rp_id')
            ->select('m.major_name',DB::raw('COALESCE(sum(rp.rp_amount),0) as project_amount, count(rp.rp_id) as project_number' ) )
            ->groupBy('m.major_id')
            ->get();

        $byYears = $users = DB::table('year as y')

            ->join('research_project as rp', 'rp.rp_year', '=', 'y.year_id')
            ->join('users_research as ur', 'ur.rp_id', '=', 'rp.rp_id')
            ->join('users as u', 'u.u_id', '=', 'ur.u_id')
            ->select('rp.rp_year',DB::raw('COALESCE(sum(rp.rp_amount),0) as project_amount, count(rp.rp_id) as project_number' ) )
            ->groupBy('rp.rp_year')
            ->get();

        $data = array(
            'projects' => $byMajors,
            'static' => $byYears
        );

//        dd($results);
        return view('report.project.project-dashboard')->with($data);

    }
}
