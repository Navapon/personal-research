<?php

namespace App\Http\Controllers;

use App\FundtypeModel;
use App\JournalModel;
use Illuminate\Http\Request;

class ResearchContoller extends Controller
{



    public function __construct()
    {
        if(!$this->middleware('auth', ['except' => ['index','show']])){

            return redirect()->route('home');
        }

    }

    public function index(){

        $journals = JournalModel::all();

        $data = array(
            'journals' => $journals
        );

        return view('research.research-list',$data);
    }

    public function create(Request $request)
    {
        $type = $request->type;
        $funds = FundtypeModel::all();


        switch ($type){
            case 'journal' :
                return redirect()->route('journal.create');

            case('conference'):
                route('journal.create');
                break;
            case 'book' :
                route('journal.create');
                break;
        }
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

        $user = ProfileModel::find($id);

        if (!empty($user))
            return view('profile.profile-show')->with('user', $user);
        else
            return redirect('homepage');
    }

    public function edit($id = "")
    {

        if (!Auth::check()) {
            return redirect()->route('home');
        }

        $current_user = Auth::user();
        $majors = MajorModel::all();
        $academics = AcademicModel::all();

        if ($current_user->u_id == $id) {
            $user = ProfileModel::find($id);

            $data = array(
                'user' => $user,
                'majors' => $majors,
                'academics' => $academics
            );

        } else {
            return view('homepage');
        }

        return view('profile.profile-edit')->with($data);

    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'u_name_th' => 'required|string',
            'u_email' => 'required|string|email',
            'u_surname_th' => 'required|string',
            'u_birthdate' => 'required|string',
            'u_major_id' => 'required',
        ]);


        $profile = ProfileModel::find($id);;
        $profile->u_email = $request->u_email;
        $profile->u_academic_id = $request->u_academic_id;
        $profile->u_birthdate = $request->u_birthdate;
        $profile->u_name_th = $request->u_name_th;
        $profile->u_surname_th = $request->u_surname_th;
        $profile->u_major_id = $request->u_major_id;
        $profile->u_phone = $request->u_phone;
        $profile->u_facebook = $request->u_facebook;
        $profile->u_description = $request->u_description;

        $profile->save();

        alert()->success(' ', 'อัพเดตข้อมูลเรียบร้อย');

        return redirect()->route('profile.edit', $id);
    }

    public function uploadProfileImage(Request $request)
    {

        $profile = ProfileModel::find($request->id);

        if ($request->file('u_img')) {

            if (File::exists('images' . '/' . $profile->u_image)) {
                File::delete('images' . '/' . $profile->u_image);
            }

            $photoName = time() . '.' . $request->u_img->getClientOriginalExtension();
            $request->u_img->move(public_path('images'), $photoName);
            $profile->u_image = $photoName;
            $profile->save();

            echo 'อัพโหลดรูปภาพเรียบร้อย';
        }else{
            echo 'ไม่สามารถอัพโหลดรูปภาพได้';
        }

    }

    public function destroy()
    {

    }
}
