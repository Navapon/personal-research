<?php

namespace App\Http\Controllers;

use App\AcademicModel;
use App\MajorModel;
use App\UserresearchModel;
use UxWeb\SweetAlert\SweetAlert;
use Session;
use Illuminate\Http\Request;
use App\ProfileModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{

    /**
     * ProfileController constructor.
     */
    public function __construct ()
    {

    }

    public function index ()
    {

        $users = ProfileModel::all();

        return view('users.users-list')->with('users', $users);
    }

    public function create ()
    {

    }

    public function store (Request $request)
    {

    }

    public function show ($id)
    {
        $user = ProfileModel::find($id);
        $journals = UserresearchModel::with('journal')->has('journal')->where('u_id', $id)->get();;
        $conferences = UserresearchModel::with('conference')->has('conference')->where('u_id', $id)->get();
        $projects = UserresearchModel::with('project')->has('project')->where('u_id', $id)->get();
        $patents = UserresearchModel::with('patent')->has('patent')->where('u_id', $id)->get();

        $data = array(
            'user' => $user,
            'journals' => $journals,
            'conferences' => $conferences,
            'projects' => $projects,
            'patents' => $patents
        );
        if (!empty($user))
            return view('profile.profile-show')->with($data);
        else
            return redirect('homepage');
    }

    public function edit ($id = "")
    {

        if (!Auth::check()) {
            return redirect()->route('home');
        }

        // that's mean to edit my profile
        if($id == "my"){
            $id = Auth::id();
        }
        $current_user = Auth::user();
        $majors = MajorModel::all();
        $academics = AcademicModel::all();
        $journals = UserresearchModel::with('journal')->has('journal')->where('u_id', $id)->get();
        $conferences = UserresearchModel::with('conference')->has('conference')->where('u_id', $id)->get();
        $projects = UserresearchModel::with('project')->has('project')->where('u_id', $id)->get();
        $patents = UserresearchModel::with('patent')->has('patent')->where('u_id', $id)->get();

        if ($current_user->u_id == $id || Auth::user()->u_role_id == 1 ) {
            $user = ProfileModel::find($id);

            $data = array(
                'user' => $user,
                'majors' => $majors,
                'academics' => $academics,
                'journals' => $journals,
                'conferences' => $conferences,
                'projects' => $projects,
                'patents' => $patents
            );

        } else {
            alert()->warning('ไม่สามารถแก้ไขข้อมูลที่ไม่ใช่ของตนได้', 'คุณไม่มีสิทธิ');
            return redirect()->route('home');
        }

        return view('profile.profile-edit')->with($data);

    }

    public function update (Request $request, $id)
    {

        $this->validate($request, [
            'u_name_th' => 'required|string',
            'u_email' => 'required|string|email',
            'u_surname_th' => 'required|string',
            'u_birthdate' => 'required|string',
            'u_major_id' => 'required',
            'u_identity' => 'required|min:13'
        ]);

        $profile = ProfileModel::find($id);;
        $profile->u_email = $request->u_email;
        $profile->u_identity = $request->u_identity;
        $profile->u_academic_id = $request->u_academic_id;
        $profile->u_sex = $request->u_sex;
        $profile->u_name_th = $request->u_name_th;
        $profile->u_surname_th = $request->u_surname_th;
        $profile->u_name_en = $request->u_name_en;
        $profile->u_surname_en = $request->u_surname_en;
        $profile->u_birthdate = $request->date_u_birthdate_submit;
        $profile->u_major_id = $request->u_major_id;
        $profile->u_phone = $request->u_phone;
        $profile->u_facebook = $request->u_facebook;
        $profile->u_line = $request->u_line;
        $profile->u_instragram = $request->u_instragram;
        $profile->u_description = $request->u_description;

        $profile->save();

        alert()->success(' ', 'อัพเดตข้อมูลเรียบร้อย');

        return redirect()->route('profile.show', $id);
    }

    public function uploadProfileImage (Request $request)
    {

        $profile = ProfileModel::find($request->id);

        if ($request->file('u_img')) {

            if (File::exists('images' . '/user-image/' . $profile->u_image)) {
                File::delete('images' . '/user-image/' . $profile->u_image);
            }

            $photoName = time() . '.' . $request->u_img->getClientOriginalExtension();
            $request->u_img->move(public_path('images/user-image/'), $photoName);
            $profile->u_image = $photoName;
            $profile->save();

            echo 'อัพโหลดรูปภาพเรียบร้อย';

        } else {
            echo 'ไม่สามารถอัพโหลดรูปภาพได้';
        }

    }

    public function myprofilecv(){

    }

    public function destroy ()
    {

    }


}
