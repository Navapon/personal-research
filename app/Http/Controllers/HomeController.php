<?php

namespace App\Http\Controllers;

use App\BlogModel;
use Illuminate\Http\Request;
use Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct ()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {

        $blogs = BlogModel::where('blog_status','=','open')->orderBy('created_at', 'desc')->take(3)->get();

        $data = array(
            'blogs' => $blogs
        );

        return view('homepage')->with($data);
    }
}
