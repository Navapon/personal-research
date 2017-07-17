<?php

namespace App\Http\Controllers;

use App\ProjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\MajorModel;
class ReportProjectController extends Controller
{

    //
    public function index ()
    {

        $fund = Input::get('fund');
        $year = Input::get('year');

        $years = ProjectModel::orderBy('rp_year', 'desc')
            ->groupBy('rp_year')
            ->get();

        $byMajors = $users = DB::table('majors as m')
            ->leftJoin('users as u', 'm.major_id', '=', 'u.u_major_id')
            ->leftJoin('users_research as ur', 'ur.u_id', '=', 'u.u_id')
            ->leftJoin('research_project as rp', 'rp.rp_id', '=', 'ur.rp_id')
            ->leftJoin('fund_type as ft', 'ft.fund_id', '=', 'rp.fund_id')
            ->select('m.major_name',
                DB::raw('COALESCE(sum(rp.rp_amount),0) as project_amount, count(rp.rp_id) as project_number' )
            )
            ->when($fund, function ($query) use ($fund) {
                return $query->where('ft.fund_type', $fund);
            })
            ->when($year, function ($query) use ($year) {
                return $query->where('rp.rp_year', $year);
            })
            ->groupBy('m.major_id')
            ->orderBy('project_amount','desc')
            ->get();

        $byYears = $users = DB::table('year as y')
            ->join('research_project as rp', 'rp.rp_year', '=', 'y.year_id')
            ->join('users_research as ur', 'ur.rp_id', '=', 'rp.rp_id')
            ->join('users as u', 'u.u_id', '=', 'ur.u_id')
            ->select('rp.rp_year', DB::raw('COALESCE(sum(rp.rp_amount),0) as project_amount, count(rp.rp_id) as project_number'))
            ->groupBy('rp.rp_year')
            ->get();

        $data = array(
            'projects' => $byMajors,
            'static' => $byYears,
            'year' => $years
        );

//        dd($results);
        return view('report.project.project-dashboard')->with($data);

    }

    public function a ()
    {

    }
}
