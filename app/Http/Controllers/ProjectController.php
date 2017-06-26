<?php

namespace App\Http\Controllers;



use App\FundtypeModel;
use App\Http\Requests\ProjectRequest;
use App\ProfileModel;;
use App\ProjectModel;
use App\ResearchstatusModel;
use App\UserresearchModel;
use App\ResearhteamModel;
use App\ResearchlevelModel;

use App\YearModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    public function __construct ()
    {
        if (!$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ])) {

            alert()->warning('', 'กรุณาเข้าสู่ระบบเพื่อทำรายการ');
            return redirect()->route('home');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        $funds = FundtypeModel::all();
        $status = ResearchstatusModel::all();
        $years = YearModel::all();


        $data = array(
            'funds' => $funds,
            'status' => $status,
            'user' => $user,
            'years' => $years
        );

        return view('research.project.project-create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        //
        $project = new ProjectModel();

        if ($request->file('rp_file')) {

            $path = '/files/users/' . Auth::id() . '/' . 'project/';
            // check directory exist
            if (!File::exists($path)) {
                // path does not exist
                File::makeDirectory($path, 0775, true,true);
            }

            $file_name = time().'.' . $request->file('rp_file')->getClientOriginalExtension();
            $request->file('rp_file')->move(public_path($path), $file_name);
            $project->rp_file = $file_name;
        }

        $project->rp_name = $request->rp_name;
        $project->rp_abstract = $request->rp_abstract;
        $project->rp_meta_tag = $request->rp_meta_tag;
        $project->fund_id = $request->fund_id;
        $project->rp_fund_name = $request->fund_name;
        $project->rp_year = $request->rp_year;
        $project->rp_amount = $request->rp_amount;
        $project->rp_status = $request->rp_status;
        $project->rp_start = $request->rp_start;
        $project->rp_end = $request->rp_end;

        try {
            DB::beginTransaction();

            // Save project to db
            $project->save();

            // Save who is owner this research
            $user_research = new UserresearchModel();
            $user_research->u_id = Auth::id();
            $user_research->rp_id = $project->rp_id;
            $user_research->save();

            // Save team of this research
            foreach ($request->rt_name as $key => $item) {

                $user_team = new  ResearhteamModel();
                $user_team->rt_name = $item;
                $user_team->rp_id = $project->rp_id;
                $user_team->save();

            }

            DB::commit();
            /* Transaction successful. */
        } catch (\Exception $e) {

            DB::rollback();
            alert()->error('', 'เกิดข้อผิดพลาดในการบันทึกโครงการ');
            return redirect()->route('profile.edit', Auth::id());
            /* Transaction failed. */
        }

        alert()->success('', 'ทำการเพิ่มข้อมูลโครงการสำเร็จ');

        return redirect()->route('profile.edit', Auth::id());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $project = UserresearchModel::with(['project','user','teamProject'])->where('users_research.rp_id',$id)->first();


        $data = array(
            'project' => $project
        );

        return view('research.project.project-show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user_research = UserresearchModel::where('rp_id', $id)->get([ 'ur_id', 'u_id' ]);
        $project = ProjectModel::with([ 'team' ])->where('research_project.rp_id', $id)->first();
        $funds = FundtypeModel::all();
        $status = ResearchstatusModel::all();
        $years = YearModel::all();

        if (Auth::id() == $user_research[ 0 ][ 'u_id' ]) {

            $user = ProfileModel::find(Auth::id());

            $data = array(
                'project' => $project,
                'funds' => $funds,
                'status' => $status,
                'years' => $years,
                'user' => $user
            );

        } else {

            alert()->warning('เนื่องจากท่านไม่ใช่เจ้าของการประชุมครั้งนี้', 'ไม่สามารถแก้ไขได้');
            return redirect()->route('home');
        }

        return view('research.project.project-edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
        //
        $project =  ProjectModel::find($id);

        if ($request->file('rp_file')) {

            $path = '/files/users/' . Auth::id() . '/' . 'project/';
            // check directory exist
            if (!File::exists($path)) {
                // path does not exist
                File::makeDirectory($path, 0775, true);
            }

            $file_name = time().'.' . $request->file('rp_file')->getClientOriginalExtension();
            $request->file('rp_file')->move(public_path($path), $file_name);
            $project->rp_file = $file_name;
        }

        $project->rp_name = $request->rp_name;
        $project->rp_abstract = $request->rp_abstract;
        $project->rp_meta_tag = $request->rp_meta_tag;
        $project->fund_id = $request->fund_id;
        $project->rp_fund_name = $request->fund_name;
        $project->rp_year = $request->rp_year;
        $project->rp_amount = $request->rp_amount;
        $project->rp_status = $request->rp_status;
        $project->rp_start = $request->rp_start;
        $project->rp_end = $request->rp_end;

        try {

            DB::beginTransaction();
            $project->save();
            // Delete row
            ResearhteamModel::where('rp_id', $project->rp_id)->delete();
            // Save team of this research
            foreach ($request->rt_name as $key => $item) {

                $user_team = new ResearhteamModel();
                $user_team->rt_name = $item;
                $user_team->rp_id = $project->rp_id;
                $user_team->save();
            }

            DB::commit();
            /* Transaction successful. */
        } catch (\Exception $e) {

            DB::rollback();

            alert()->error('', 'เกิดข้อผิดพลาดในการบันทึก');
            return redirect()->route('profile.edit', Auth::id());
            /* Transaction failed. */
        }

        alert()->success(' ', 'อัพเดตข้อมูลเรียบร้อย');

        return redirect()->route('profile.edit', Auth::id());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user_research = UserresearchModel::where('rp_id', $id)->get([ 'u_id' ]);

        try {

            if ($user_research[ 0 ][ 'u_id' ] == Auth::id()) {
                DB::beginTransaction();

                UserresearchModel::destroy($user_research->toArray());

                $project = ProjectModel::find($id);
                $project->delete();

                DB::commit();
            } else {
                alert()->error('ไม่สามารถลบได้', 'ท่านไม่ใช่เจ้าของข้อมูล');
                return redirect()->route('profile.edit', Auth::id());
            }

            /* Transaction successful. */
        } catch (\Exception $e) {

            DB::rollback();

            alert()->error('', 'เกิดข้อผิดพลาดในการลบข้อมูล');
            return redirect()->route('profile.edit', Auth::id());
            /* Transaction failed. */
        }

        alert()->success(' ', 'ลบข้อมูลโครงการเรียบร้อยแล้ว');
        return back();


    }
}
