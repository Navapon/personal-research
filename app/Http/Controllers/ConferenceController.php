<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConferenceFormRequest;

use App\ConferenceModel;
use App\ProfileModel;
use App\ResearchPresentTypeModel;
use App\ResearchProceedingTypeModel;
use App\UserresearchModel;
use App\ResearhteamModel;
use App\ResearchlevelModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;

class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct ()
    {
        if (!$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ])) {

            alert()->warning('', 'กรุณาเข้าสู่ระบบเพื่อทำรายการ');
            return redirect()->route('home');
        }

    }


    public function index ()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        $user = Auth::user();
        $research_level = ResearchlevelModel::all();
        $proceeding = ResearchProceedingTypeModel::all();
        $present = ResearchPresentTypeModel::all();

        $data = array(

            'research_level' => $research_level,
            'proceedings' => $proceeding,
            'presents' => $present,
            'user' => $user
        );

        return view('research.conference.conference-create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store (ConferenceFormRequest $request)
    {
        //

        $project = new ConferenceModel();

        if ($request->file('rc_file')) {

            $path = '/files/users/' . Auth::id() . '/' . 'conference/';
            // check directory exist
            if (!File::exists($path)) {
                // path does not exist
                File::makeDirectory($path, 0775, true, true);
            }

            $project_filename = time() . '.' . $request->rc_file->getClientOriginalExtension();
            $request->rc_file->move(public_path($path), $project_filename);
            $project->rc_file = $project_filename;


        }

        $project->rc_article_name = $request->rc_article_name;
        $project->rc_abstract = $request->rc_abstract;
        $project->rc_meta_tag = $request->rc_article_name;
        $project->rc_publish_date = $request->date_rc_publish_date_submit;
        $project->rc_evaluate_article = $request->rc_evaluate_article;
        $project->rc_proceeding_type = $request->rc_proceeding_type;
        $project->rc_present_type = $request->rc_present_type;
        $project->rc_publish_level = $request->rc_publish_level;
        $project->rc_volume = $request->rc_volume;
        $project->rc_issue = $request->rc_issue;
        $project->rc_page = $request->rc_page;
        $project->rc_award = $request->rc_award;
        $project->rc_meeting_name = $request->rc_meeting_name;
        $project->rc_meeting_owner = $request->rc_meeting_owner;
        $project->rc_meeting_place = $request->rc_meeting_place;
        $project->rc_meeting_province = $request->rc_meeting_province;
        $project->rc_meeting_start = $request->date_rc_meeting_start_submit;
        $project->rc_meeting_end = $request->date_rc_meeting_end_submit;



        try {
            DB::beginTransaction();

            // Save journal to db
            $project->save();

            // Save who is owner this research
            $user_research = new UserresearchModel();
            $user_research->u_id = Auth::id();
            $user_research->rc_id = $project->rc_id;
            $user_research->save();

            // Save team of this research
            foreach ($request->rt_name as $key => $item) {

                $user_team = new  ResearhteamModel();
                $user_team->rt_name = $item;
                $user_team->rc_id = $project->rc_id;
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


        alert()->success('', 'ทำการเพิ่มข้อมูลการประชุมวิชาการสำเร็จ');

        return redirect()->route('profile.edit', Auth::id());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        $project = UserresearchModel::with(['conference','user','teamConference'])->where('users_research.rc_id',$id)->first();


        $data = array(
            'conference' => $project
        );

        return view('research.conference.conference-show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit ($id)
    {
        $user_research = UserresearchModel::where('rc_id', $id)->get([ 'ur_id', 'u_id' ]);
        $project = ConferenceModel::with([ 'team' ])->where('research_conference.rc_id', $id)->first();
        $research_level = ResearchlevelModel::all();
        $proceeding = ResearchProceedingTypeModel::all();
        $present = ResearchPresentTypeModel::all();

        if (Auth::id() == $user_research[ 0 ][ 'u_id' ]) {

            $user = ProfileModel::find(Auth::id());

            $data = array(
                'conference' => $project,
                'research_level' => $research_level,
                'proceedings' => $proceeding,
                'presents' => $present,
                'user' => $user
            );


        } else {

            alert()->warning('เนื่องจากท่านไม่ใช่เจ้าของการประชุมครั้งนี้', 'ไม่สามารถแก้ไขได้');
            return redirect()->route('home');
        }

        return view('research.conference.conference-edit')->with($data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, $id)
    {

        $project = ConferenceModel::find($id);

        if ($request->file('rc_file')) {

            $path = '/files/users/' . Auth::id() . '/' . 'conference/';
            // check directory exist
            if (!File::exists($path)) {
                // path does not exist
                File::makeDirectory($path, 0775, true, true);
            }

            $project_filename = time() . '.' . $request->rc_file->getClientOriginalExtension();
            $request->rc_file->move(public_path($path), $project_filename);
            $project->rc_file = $project_filename;

        }


        $project->rc_article_name = $request->rc_article_name;
        $project->rc_abstract = $request->rc_abstract;
        $project->rc_meta_tag = $request->rc_article_name;
        $project->rc_publish_date = $request->date_rc_publish_date_submit;
        $project->rc_evaluate_article = $request->rc_evaluate_article;
        $project->rc_proceeding_type = $request->rc_proceeding_type;
        $project->rc_present_type = $request->rc_present_type;
        $project->rc_publish_level = $request->rc_publish_level;
        $project->rc_volume = $request->rc_volume;
        $project->rc_issue = $request->rc_issue;
        $project->rc_page = $request->rc_page;
        $project->rc_award = $request->rc_award;
        $project->rc_meeting_name = $request->rc_meeting_name;
        $project->rc_meeting_owner = $request->rc_meeting_owner;
        $project->rc_meeting_place = $request->rc_meeting_place;
        $project->rc_meeting_province = $request->rc_meeting_province;
        $project->rc_meeting_start = $request->date_rc_meeting_start_submit;
        $project->rc_meeting_end = $request->date_rc_meeting_end_submit;

        $project->save();

        try {

            DB::beginTransaction();
            $project->save();
            // Delete row
            ResearhteamModel::where('rc_id', $project->rc_id)->delete();
            // Save team of this research
            foreach ($request->rt_name as $key => $item) {

                $user_team = new ResearhteamModel();
                $user_team->rt_name = $item;
                $user_team->rc_id = $project->rc_id;
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {

        $user_research = UserresearchModel::where('rc_id', $id)->get([ 'u_id' ]);

        try {

            if ($user_research[ 0 ][ 'u_id' ] == Auth::id()) {
                DB::beginTransaction();

                UserresearchModel::destroy($user_research->toArray());

                $project = ConferenceModel::find($id);
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

        alert()->success(' ', 'ลบข้อมูลการประชุมวิชาการเรียบร้อย');
        return back();

    }
}
