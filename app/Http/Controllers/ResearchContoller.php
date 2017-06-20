<?php

namespace App\Http\Controllers;

use App\FundtypeModel;
use App\JournalModel;
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

        $journals = JournalModel::all();

        $data = array(
            'journals' => $journals
        );

        return view('research.research-list', $data);
    }

    public function create (Request $request)
    {
        $type = $request->type;
        $funds = FundtypeModel::all();


        switch ($type) {
            case 'journal' :
                return redirect()->route('journal.create');
                break;
            case( 'conference' ):

                return redirect()->route('conference.create');
                break;
            case 'book' :

                return redirect()->route('journal.create');
                break;
            default:
                alert()->warning('','ไม่พบประเภทผลงานวิชาการที่ระบุ');
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
