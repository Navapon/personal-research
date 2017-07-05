<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatentRequest;
use App\PatentModel;
use App\PatentTypeModel;
use App\ProfileModel;
use App\ResearchlevelModel;

use App\UserresearchModel;
use Illuminate\Http\Requestว;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PatentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
        $user = Auth::user();
        $research_level = ResearchlevelModel::all();
        $patent_type = PatentTypeModel::all();
        $data = array(
            'user' => $user,
            'research_level' => $research_level,
            'patent_type' => $patent_type
        );

        return view('research.patent.patent-create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store (PatentRequest $request)
    {

        $patent = new PatentModel();

        $patent->pt_name = $request->pt_name;
        $patent->pt_number = $request->pt_number;
        $patent->pt_description = $request->pt_description;
        $patent->pt_meta_tag = $request->pt_meta_tag;
        $patent->pt_type = $request->pt_type;
        $patent->pt_publish_level = $request->pt_publish_level;
        $patent->pt_accept = $request->date_pt_accept_submit;
        $patent->pt_expire = $request->date_pt_expire_submit;

        try {
            DB::beginTransaction();

            // Save Patent to db
            $patent->save();

            // Save who is owner this research
            $user_research = new UserresearchModel();
            $user_research->u_id = Auth::id();
            $user_research->pt_id = $patent->pt_id;
            $user_research->save();

            DB::commit();
            /* Transaction successful. */
        } catch (\Exception $e) {

            DB::rollback();

            alert()->error('', 'เกิดข้อผิดพลาดในการบันทึก');
            return redirect()->route('profile.edit', Auth::id());
            /* Transaction failed. */
        }


        alert()->success('', 'ทำการเพิ่มข้อมูล สิทธิบัตร สำเร็จ');

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
        $patent = UserresearchModel::with(['patent','user'])->where('users_research.pt_id',$id)->first();


        $data = array(
            'patent' => $patent
        );

        return view('research.patent.patent-show')->with($data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit ($id)
    {
        //
        $user_research = UserresearchModel::where('pt_id', $id)->get([ 'ur_id', 'u_id' ]);
        $patent = PatentModel::find($id);
        $research_level = ResearchlevelModel::all();
        $patent_type = PatentTypeModel::all();

        if (Auth::id() == $user_research[ 0 ][ 'u_id' ]) {

            $user = ProfileModel::find(Auth::id());

            $data = array(
                'patent' => $patent,
                'patent_type' => $patent_type,
                'research_level' => $research_level,
                'user' => $user
            );

        } else {

            alert()->warning('เนื่องจากท่านไม่ใช่เจ้าสิทธิบัตรชิ้นนี้', 'ไม่สามารถแก้ไขได้');
            return redirect()->route('home');
        }

        return view('research.patent.patent-edit')->with($data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update (PatentRequest $request, $id)
    {
        //
        $patent = PatentModel::find($id);
        $patent->pt_name = $request->pt_name;
        $patent->pt_number = $request->pt_number;
        $patent->pt_description = $request->pt_description;
        $patent->pt_meta_tag = $request->pt_meta_tag;
        $patent->pt_type = $request->pt_type;
        $patent->pt_publish_level = $request->pt_publish_level;
        $patent->pt_accept = $request->date_pt_accept_submit;
        $patent->pt_expire = $request->date_pt_expire_submit;

        try {
            DB::beginTransaction();

            // Save Patent to db
            $patent->save();

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
        $user_research = UserresearchModel::where('pt_id', $id)->get([ 'ur_id', 'u_id' ]);

        try {

            if ($user_research[ 0 ][ 'u_id' ] == Auth::id()) {
                DB::beginTransaction();

                UserresearchModel::destroy($user_research->toArray());

                $patent = PatentModel::withTrashed()->find($id);
                $patent->delete();
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

        alert()->success(' ', 'ลบข้อมูลสิทธิบัตรเรียบร้อย');
        return back();
    }
}
