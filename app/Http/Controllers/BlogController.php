<?php

namespace App\Http\Controllers;

use App\BlogModel;
use App\BlogTypeModel;
use App\Http\Requests\BlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use File;
class BlogController extends Controller
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
    public function index ()
    {
        //
        $blogs = BlogModel::where('blog_status','=','open')->orderBy('created_at', 'desc')->get();

        $data = array(
            'blogs' => $blogs
        );

        return view('blog.blog-index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        //
        $blogtype = BlogTypeModel::all();

        $data = array(
            'blogtype' => $blogtype
        );
        return view('blog.blog-create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store (BlogRequest $request)
    {
        //
        $blog = new BlogModel();

        $blog->blog_title = $request->blog_title;
        $blog->blog_information = $request->blog_information;
        $blog->blog_content = $request->blog_content;
        $blog->blog_type = $request->blog_type;
        $blog->blog_status = $request->blog_status;
        $blog->blog_email_flag = $request->blog_email_flag;
        $blog->u_id = \Auth::id();

        try {

            DB::beginTransaction();

            // Save Blog to db

            $blog->save();
            if ($request->file('blog_image')) {

                $path = '/files/blog/' . $blog->blog_id . '/';
                // check directory exist
                if (!File::exists($path)) {
                    // path does not exist
                    File::makeDirectory($path, 0775, true, true);
                }

                $blog_filename = time() . '.' . $request->blog_image->getClientOriginalExtension();
                $request->blog_image->move(public_path($path), $blog_filename);
                $blog->blog_image = $blog_filename;

                $blog->save();

            }

            DB::commit();
            /* Transaction successful. */
        } catch (\Exception $e) {

            DB::rollback();

            alert()->error('', 'เกิดข้อผิดพลาดในการบันทึกข่าว');
            return redirect()->route('blog.index');
            /* Transaction failed. */
        }

        alert()->success('', 'ทำการเพิ่มข้อมูลข่าวสำเร็จ');
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        //

        $blog = BlogModel::find($id);

        $data = array(
            'blog' => $blog
        );

        return view('blog.blog-show')->with($data);
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
        $blog = BlogModel::find($id);
        $blogtype = BlogTypeModel::all();

        $data = array(
            'blog' => $blog,
            'blogtype' => $blogtype
        );

        return view('blog.blog-edit')->with($data);
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
        //
        $blog = BlogModel::find($id);

        if ($request->file('blog_image')) {

            $path = '/files/blog/' . $blog->blog_id . '/';
            // check directory exist
            if (!File::exists($path)) {
                // path does not exist
                File::makeDirectory($path, 0775, true, true);
            }

            $blog_filename = time() . '.' . $request->blog_image->getClientOriginalExtension();
            $request->blog_image->move(public_path($path), $blog_filename);
            $blog->blog_image = $blog_filename;

        }

        $blog->blog_title = $request->blog_title;
        $blog->blog_information = $request->blog_information;
        $blog->blog_content = $request->blog_content;
        $blog->blog_type = $request->blog_type;
        $blog->blog_status = $request->blog_status;
        $blog->blog_email_flag = $request->blog_email_flag;
        $blog->u_id = \Auth::id();

        try {

            DB::beginTransaction();

            // Save Blog to db

            $blog->save();


            DB::commit();
            /* Transaction successful. */
        } catch (\Exception $e) {

            DB::rollback();

            alert()->error('', 'เกิดข้อผิดพลาดในการอัพเดตข่าว');
            return redirect()->route('blog.index');
            /* Transaction failed. */
        }

        alert()->success('', 'ทำการอัพเดตข่าวสำเร็จ');
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        //
    }
}
