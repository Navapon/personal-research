<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta_tag')

    <meta name="author" content="utk,ราชมงคลกรุงเทพ,สวส,สำนักวิทยบริการและเทคโนโลยีสารสนเทศ,carit,คณะวิทยาศาสตร์และเทคโนโลยี">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ระบบฐานข้อมูลวิจัย คณะวิทยาศาสตร์และเทคโนโลยี</title>
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/all.js') }}"></script>
    <link rel="stylesheet" href="{{ mix ('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix ('css/all.css') }}">

    {{-- Data Table --}}
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-colvis-1.3.1/b-html5-1.3.1/b-print-1.3.1/r-2.1.1/se-1.2.2/datatables.min.css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page filesfile:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>

        body {
            background-color: white;
            font-family: 'Prompt', sans-serif;
            font-size: 1.45em;
        }

        .navbar-default {
            color: #FFFFFF;
            background-color: #ffff00;
        }

        .navbar-default .navbar-nav > li > a {
            color: black
        }

        .navbar-default .navbar-nav > li > a:hover {
            color: green
        }

        /*.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus*/
        /*{*/
        /*background-color: red;*/
        /*}*/
        .example2 .navbar-brand > img {

        }

    </style>
</head>

<body>
{{-- NAV BAR --}}
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">

    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="color: white;font-family: 'Playfair Display', serif;font-size: 1.2em">
                <label id="brand-font " style="color: #00CC00;">UTK </label> <label
                        style="color:#575757">ราชมงคลกรุงเทพ</label>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="/home">หน้าแรก</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">ข้อมูลคณะ <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="blog-home-1.html">โครงสร้างหน่วยงาน</a>
                        </li>
                        <li>
                            <a href="blog-home-2.html">นโยบายและภารกิจ</a>
                        </li>
                        <li>
                            <a href="blog-post.html">ติดต่อเรา</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">ข้อมูลวิจัย <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="blog-home-1.html">ข้อมูลนักวิจัย</a>
                        </li>
                        <li>
                            <a href="blog-home-2.html">ข้อมูลงานวิจัย</a>
                        </li>
                        <li>
                            <a href="blog-post.html">ครุภัณฑ์สำหรับงานวิจัย</a>
                        </li>
                        <li>
                            <a href="blog-post.html">ถิติงานวิจัย</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">กฎระเบียบ <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="blog-home-1.html">จริยธรรมการวิจัย</a>
                        </li>
                        <li>
                            <a href="blog-home-2.html">สิทธิบัตร</a>
                        </li>
                    </ul>
                </li>
                @if (Auth::guest())
                    <li>

                        <a data-toggle="modal" data-target="#myModal">Login</a>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->u_name_th }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('profile.show',Auth::id()) }}">

                                    My Profile
                                </a>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>


        <!-- /.navbar-collapse -->


    </div>

    <!-- /.container -->
</nav>
{{-- END NAV BAR --}}

@yield('carousel')

<div class="container">

    {{--{{ dd(Adldap::auth()->attempt('navapon.t', 'ow092sadasd72821')) }}--}}

    @yield('page-header')

    @if(Route::current()->getName() != 'home')
        {!! Breadcrumbs::renderIfExists() !!}
    @endif


    @yield('content')

    @yield('blog')

    @yield('menu')

    @include('auth.login-modal')

    @if( Session::has('needlogin') )
        <script>
            $('#myModal').modal('show');
        </script>
    @endif
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; scir.rmutk.ac.th <b> คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชมงคลกรุงเทพ</b></p>
            </div>
        </div>
    </footer>
</div>
</body>
</html>

<script>

</script>