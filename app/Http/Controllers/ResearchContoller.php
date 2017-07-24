<?php

namespace App\Http\Controllers;

use App\ConferenceModel;
use App\JournalModel;
use App\UserresearchModel;
use Illuminate\Http\Request;

class ResearchContoller extends Controller
{


    public function __construct ()
    {
        if (!$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ])) {

            return redirect()->route('home');
        }

    }

    public function index ()
    {
        $journals = UserresearchModel::
        join('research_journal as rj', 'rj.rj_id', '=', 'users_research.rj_id')
            ->orderBy('rj.rj_publish_date', 'desc')
            ->with('journal')->has('journal')->get();

        $projects = UserresearchModel::
        join('research_project as rp', 'rp.rp_id', '=', 'users_research.rp_id')
            ->orderBy('rp.rp_year', 'desc')
            ->with('project')->has('project')->get();

        $conferences = UserresearchModel::
        join('research_conference as rc', 'rc.rc_id', '=', 'users_research.rc_id')
            ->orderBy('rc.rc_publish_date', 'desc')
            ->with('conference')->has('conference')->get();

        $patents = UserresearchModel::
        join('research_patent as pt', 'pt.pt_id', '=', 'users_research.pt_id')
            ->orderBy('pt.pt_accept', 'desc')
            ->with('patent')->has('patent')->get();


        $data = array(
            'journals' => $journals,
            'projects' => $projects,
            'conferences' => $conferences,
            'patents' => $patents
        );

        return view('research.research-list', $data);
    }

    public function create (Request $request)
    {
        $type = $request->type;

        switch ($type) {
            case 'journal' :
                return redirect()->route('journal.create');
                break;
            case( 'conference' ):

                return redirect()->route('conference.create');
                break;
            case 'project' :

                return redirect()->route('project.create');
                break;
            case 'patent' :

                return redirect()->route('patent.create');
                break;
            default:
                alert()->warning('', 'ไม่พบประเภทผลงานวิชาการที่ระบุ');
                return redirect()->route('home');
                break;
        }
    }

    public function store (Request $request)
    {

    }

    public function show ($id)
    {

    }

    public function edit ($id)
    {


    }

    public function update (Request $request, $id)
    {

    }

    public function destroy ()
    {

    }
}
