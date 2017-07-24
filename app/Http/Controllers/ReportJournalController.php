<?php

namespace App\Http\Controllers;

use App\JournalModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class ReportJournalController extends Controller
{
    //
    public function index ()
    {

        $fund = Input::get('fund');
        $year = Input::get('year');

        $years = DB::table('research_journal as rj')
            ->select(
                DB::raw("CONCAT_WS('','',YEAR(rj.rj_publish_date)) as year")
            )
            ->orderBy('year','desc')
            ->groupby('year')
            ->get();

        $byMajors = $users = DB::table('majors as m')
            ->leftJoin('users as u', 'm.major_id', '=', 'u.u_major_id')
            ->leftJoin('users_research as ur', 'ur.u_id', '=', 'u.u_id')
            ->leftJoin('research_journal as rj', 'rj.rj_id', '=', 'ur.rj_id')
            ->leftJoin('fund_type as ft', 'ft.fund_id', '=', 'rj.fund_id')
            ->select('m.major_name',
                DB::raw('count(rj.rj_id) as journal_number' )
            )
            ->when($fund, function ($query) use ($fund) {
                return $query->where('ft.fund_type', $fund);
            })
            ->when($year, function ($query) use ($year) {
                return  $query->whereYear('rj.rj_publish_date', '=', $year);
            })
            ->orderBy('journal_number','desc')
            ->groupBy('m.major_id')
            ->get();


        $byYears = $users = DB::table('research_journal as rj')
            ->join('users_research as ur', 'ur.rj_id', '=', 'rj.rj_id')
            ->join('users as u', 'u.u_id', '=', 'ur.u_id')
            ->select(
                DB::raw(' count(rj.rj_id) as journal_number'),
                DB::raw(' year(rj.rj_publish_date) as year')

            )
            ->groupBy(DB::raw("year" ))
            ->get();

        $data = array(
            'journals' => $byMajors,
            'static' => $byYears,
            'year' => $years
        );

        return view('report.journal.journal-dashboard')->with($data);
    }
}
