@extends('template.landing-template')

@section('page-header')

    @include('components.page-header',[
        'header' => $user->u_name_th . ' ' . $user->u_surname_th
    ])

@endsection

@section('meta_tag')

    <meta name="description" content="{{ $user->u_name_th . ' ' . $user->u_surname_th }},{{$user->u_name_th}},คณะวิทยาศาสตร์,ราชมงคลกรุงเทพ,utk">

@endsection

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-md-4 col-lg-3">
                <div class="userProfileInfo">
                    <div class="image text-center">
                        <img id="user_image"
                             src="{{ $user->u_image ? asset('images').'/' .$user->u_image: '/images/user-img.png' }}"
                             style=""
                             alt="{{ $user->u_name_th . ' ' . $user->u_surname_th }}" class="img-responsive"
                        >

                        {{--<a href="#" title="#" class="editImage">--}}
                        {{--<i class="fa fa-camera"></i>--}}
                        {{--</a>--}}
                    </div>
                    <div class="box">
                        <div class="name">
                            <strong>{{ $user->academic->academic_name or ''}} {{ $user->u_name_th . ' ' . $user->u_surname_th }}</strong><br>
                            <label for="">
                            </label>
                        </div>

                        <div class="info">
                            <span><i class="fa fa-fw fa-phone"></i> <a href="tel:+4210555888777"
                                                                       title="#">{{ $user->u_phone }}</a></span>
                            <span><i class="fa fa-fw fa-list-alt"></i> <a href="#"
                                                                          title="#">{{ $user->u_email }}</a></span>
                        </div>


                        <div class="social-buttons row">
                            @if ($user->u_facebook)
                                <div class="col md-4">
                                    <a href="{{ $user->u_facebook }}" title="{{ $user->u_facebook  }}" target="_blank"
                                       class="button-facebook">
                                        <i class="social-icon fa fa-facebook fa-2x"></i>
                                    </a>
                                </div>

                            @endif
                            @if ($user->u_line)
                                <div class="col md-4">
                                    <a href="http://line.me/ti/p/~{{ $user->u_line }}" title="{{ $user->u_line  }}"
                                       target="_blank"
                                       class="button-line">
                                        <i class="social-icon fa  fa-2x">Line</i>
                                    </a>
                                </div>
                            @endif

                            @if ($user->u_instragram)
                                <div class="col md-4">
                                    <a href="http://instagram.com/_u/{{ $user->u_instragram }}"
                                       title="{{ $user->u_instragram  }}"
                                       target="_blank"
                                       class="button-instagram">
                                        <i class="social-icon fa fa-instagram fa-2x"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    {{--            <div class="box">
                                    <div class="name">
                                        <strong>{{ $user->academic->academic_name or '' }} {{ $user->u_name_th . ' ' . $user->u_surname_th }}</strong><br>
                                    </div>

                                    <div class="info">
                                        <span><i class="fa fa-fw fa-user"></i> <a href="#">{{ $user->major->major_name or '' }} </a></span>
                                        <span><i class="fa fa-fw fa-phone"></i> <a href="tel:+4210555888777"
                                                                                   title="#">{{ $user->u_phone }}</a></span>
                                        <span><i class="fa fa-fw fa-list-alt"></i> <a href="#"
                                                                                      title="#">{{ $user->u_email }}</a></span>

                                    </div>

                                    @if ($user->u_facebook)
                                        <div class="social-buttons ">
                                            <a href="{{ $user->u_facebook }}" title="{{ $user->u_facebook  }}"
                                               class="button-facebook" target="_blank">
                                                <i class="social-icon fa fa-facebook fa-2x"></i>
                                            </a>
                                        </div>
                                    @endif

                                </div>--}}
                </div>
            </div>


            <div class="col-xs-12 col-md-8 col-lg-9">

                <div class="box">
                    @if(Auth::id() == $user->u_id)
                        <a href="{{ route('profile.edit',$user->u_id) }}">
                            <button class="btn btn-primary pull-right"><i class="fa fa-cog"></i> แก้ไขข้อมูลส่วนตัว
                            </button>
                        </a>
                    @endif
                    <h1 class="boxTitle">ข้อมูลส่วนตัว</h1>
                    <!-- Tabs -->
                    <ul class="nav nav-tabs userProfileTabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab-item-1" aria-controls="tab-item-1"
                                                                  role="tab"
                                                                  data-toggle="tab"
                                                                  aria-expanded="false">เกี่ยวกับเรา</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab-item-2" aria-controls="tab-item-2"
                                                            role="tab" data-toggle="tab"
                                                            aria-expanded="true">ผลงานวิชาการ</a>
                        </li>

                    </ul>

                    <div class="tab-content">
                        <!-- About -->
                        <div role="tabpanel" class="tab-pane fade active in" id="tab-item-1">
                            <div class="userProfileContent">

                                {{--  ข้อมูลส่วนตัว --}}
                                <div class="i form-group">

                                    <h2 class="boxHeadline"><i class="fa fa-user" aria-hidden="true"></i>
                                        Profile </h2>

                                    <div class="form-group" style="margin-bottom: 37px">
                                        <div class="col-md-3"><strong>ชื่อ - นามสกุล</strong></div>
                                        <div class="col-md-9">{{ $user->academic->academic_name or '' }} {{ $user->u_name_th . ' ' . $user->u_surname_th }}</div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-md-3"><strong>อีเมล</strong></div>
                                        <div class="col-md-9">{{ $user->u_email or '' }} </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-md-3"><strong>ประจำสาขา</strong></div>
                                        <div class="col-md-9">{{ $user->major->major_name or '' }} </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-md-3"><strong>เบอร์โทรศํพท์</strong></div>
                                        <div class="col-md-9">{{ $user->u_phone or '' }}</div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-md-3"><strong>เกี่ยวกับตัวเรา</strong></div>
                                        <div class="col-md-9">{{ $user->u_description or ' - ' }} </div>
                                    </div>


                                </div>
                                <br>
                                {{--    <div class="i form-group">

                                        <h2 class="boxHeadline"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                            ประวัติการศึกษา </h2>
                                        <ul class="simpleListings">

                                            <li>
                                                <div class="title">Sr. UX designer <span>(3 years)</span></div>
                                                <div class="info">6th Sep 2012 - 24th Oct 2015 at <a href="#" title="#"
                                                                                                     class="text-orange">eFabrica.com</a>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>--}}

                            </div>
                        </div>

                        <!-- Research -->
                        <div role="tabpanel" class="tab-pane fade " id="tab-item-2">
                            <div class="i form-group">

                                <h2 class="boxHeadline"><i class="fa fa-files" aria-hidden="true"></i>
                                    ผลงานด้านวารสารวิชาการ </h2>

                                @include('research.journal.journal-profile-list',['journals' => $journals,'task' => 'show'])
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .i {
            margin-top: 35px;
        }

        .social-buttons {
            height: 80px;
            padding: 10px 30px;
            text-align: center;
        }

        .social-buttons .button-facebook, .button-instagram, .button-line {
            float: left;

            border-radius: 50%;
            width: 45px;
            height: 45px;
            margin-right: 30px;

        }

        .button-facebook {
            border: 2px solid #3b5998;
            background-color: #3b5998;
            color: white;
        }

        .button-line {
            border: 2px solid #00c300;
            background-color: #00c300;
            color: white;
        }

        .button-line i {

            font-size: 22px;
            line-height: 40px;
        }

        .button-instagram {
            border: 2px solid #fd1d1d;
            background-color: #fd1d1d;
            color: white;
        }

        .social-buttons .button-facebook i, .button-instagram i {
            font-size: 22px;
            line-height: 50px;
        }

        .userProfileInfo .image {
            position: relative
        }

        .userProfileInfo .image .editImage {
            position: absolute;
            bottom: -27px;
            right: 20px;
            background: #fe5621;
            color: #fff;
            text-align: center;
            font-size: 18px;
            font-size: 1.8rem;
            width: 54px;
            height: 54px;
            line-height: 54px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            -moz-background-clip: padding;
            -webkit-background-clip: padding-box;
            background-clip: padding-box
        }

        .userProfileInfo .image .editImage:hover {
            background: #fe693a
        }

        .userProfileInfo .box {
            padding: 0
        }

        .userProfileInfo .box .info,
        .userProfileInfo .box .name,
        .userProfileInfo .box .socialIcons {
            padding: 15px 20px;
            border-bottom: 1px solid #e6e7ed
        }

        .userProfileInfo .box .socialIcons {
            border: 0
        }

        .userProfileInfo .box .info > span {
            margin: 10px 0;
            display: block;
            padding: 0 0 0 35px;
            position: relative
        }

        .userProfileInfo .box .info > span .fa {
            position: absolute;
            left: 5px;
            top: 4px;
            color: #9da2a6
        }

        .boxHeadline {
            margin: 0 0 25px 0;
            font-size: 18px;
            font-size: 1.8rem
        }

        .boxHeadline + .boxHeadlineSub {
            margin: -18px 0 30px 0
        }

        .boxHeader .boxTitle {
            margin: 22px 0 20px 30px
        }

        .boxHeader .boxHeaderOptions {
            margin: 9px 12px 0 0
        }

        .boxHeader .boxHeaderOptions .btn {
            color: #9da2a6;
            padding: 0;
            width: 40px;
            height: 40px;
            line-height: 42px;
            text-align: center;
            font-size: 24px;
            font-size: 2.4rem
        }

        .boxHeader .boxHeaderOptions .btn:active,
        .boxHeader .boxHeaderOptions .btn:focus,
        .boxHeader .boxHeaderOptions .btn:hover {
            background: #f2f9ff;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none
        }

        .boxHeader.pageBoxHeader .boxHeaderOptions {
            margin: 20px 12px 0 0
        }

        .boxHeader.boxHeaderBorders {
            border-bottom: 1px solid #e6e7ed
        }

        .boxHeader.box {
            padding: 30px
        }

        .boxHeader.box .pageTitle {
            margin: 0 0 6px 0
        }

        .boxHeader.box .pageTitle + .breadcrumb {
            margin: 0
        }

        .boxTitle {
            font-size: 26px;
            /*font-size: 2rem;*/
            font-weight: 700;
            text-transform: uppercase;
            margin: 0 0 25px 0
        }

        .boxHeadlineSub {
            font-size: 14px;
            font-size: 1.4rem;
            font-weight: 400;
            font-style: italic;
            color: #919599;
            margin: 0 0 25px 0;
            line-height: 18px
        }

        .boxHeadlineSub a {
            color: #fe5621
        }

        .bgTitle {
            background: url(../../img/bg-sharpen.jpg) no-repeat;
            background-size: 100% 100%
        }

        .bgTitle .boxTitle {
            margin: 0;
            padding: 22px 30px;
            color: #fff
        }

        .box {
            background: #fff;
            padding: 30px;
            margin: 0 0 24px 0
        }

        .box.box-without-padding {
            padding: 0
        }

        .box.box-without-sidepadding {
            padding: 8px 0
        }

        .box.box-without-sidepadding .boxTitle {
            margin-left: 30px
        }

        .box.box-without-bottom-padding {
            padding-bottom: 0
        }

        .box .tableWrap {
            margin: 0 -30px
        }

        .box .table-responsive {
            width: auto
        }

        .box .panel-group:last-of-type {
            margin-bottom: 0
        }

        .simpleListings {
            padding: 0;
            margin: 0
        }

        .simpleListings li {
            list-style-type: none;
            padding: 0 0 20px 0;
            margin: 20px 0 0 0;
            border-bottom: 1px solid #e6e7ed;
            position: relative
        }

        .simpleListings li:first-child {
            margin-top: 0
        }

        .simpleListings li:only-child {
            border-bottom: 0
        }

        .simpleListings li .title {
            font-size: 14px;
            font-size: 1.4rem;
            font-weight: 700;
            text-transform: uppercase;
            margin: 0 0 2px 0
        }

        .simpleListings li .title span {
            font-weight: 400;
            text-transform: none
        }

        .simpleListings li .title a:hover {
            color: #fe5621
        }

        .simpleListings li .info {
            color: #919599;
            font-style: italic
        }

        .simpleListings li p {
            margin: 7px 0 0 0
        }

        .simpleListings li img {
            margin: 20px 0
        }

        .userActivities {
            margin-bottom: 25px
        }

        .userActivities + .showMore {
            margin: 0 0 0 70px
        }

        .userActivities .i {
            margin-top: 25px;
            position: relative
        }

        .userActivities .i:first-child {
            margin-top: 0
        }

        .userActivities .i .image {
            position: absolute;
            top: 20px;
            left: 0
        }

        .userActivities .i .activityContent {
            margin: 0 0 0 70px;
            border: 1px solid #e6e7ed;
            min-height: 70px
        }

        .userActivities .i .activityContent:after,
        .userActivities .i .activityContent:before {
            content: '';
            left: 48px;
            top: 40px;
            border: solid transparent;
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none
        }

        .userActivities .i .activityContent:after {
            border-right-color: #fff;
            border-width: 12px;
            margin-top: -12px
        }

        .userActivities .i .activityContent:before {
            border-right-color: #dcdcdc;
            border-width: 11px;
            margin-top: -11px
        }

        .userActivities ul {
            padding: 20px 25px
        }

        .userActivities ul li .title {
            font-size: 16px;
            font-size: 1.6rem;
            text-transform: none
        }

        .userActivities .status li {
            padding-bottom: 0
        }

        .userActivities .status li .share {
            margin: 20px 0 0 0
        }

        .userActivities .status li .share a {
            color: #fe5621;
            display: inline-block;
            margin: 0 0 0 20px
        }

        .userActivities .status li .share a:first-child {
            margin: 0
        }

        .userActivities .status li .share a .fa {
            color: #9da2a6;
            margin: 0 3px 0 0;
            -webkit-transition: color .3s ease;
            -moz-transition: color .3s ease;
            -ms-transition: color .3s ease;
            -o-transition: color .3s ease
        }

        .userActivities .status li .share a:hover .fa {
            color: #fe5621
        }

        .userActivities .comments {
            background: #f5f6fa;
            border-top: 1px solid #e6e7ed
        }

        .userActivities .comments li:last-child {
            border-bottom: 0;
            padding-bottom: 0
        }

        .userActivities .comments li .image {
            position: absolute;
            left: 0;
            top: 0
        }

        .userActivities .comments li .image img {
            margin: 0
        }

        .userActivities .comments li .c {
            margin: 0 0 0 70px
        }

        .userActivities .comments li .c .form-control {
            border-left: 1px solid #e6e7ed;
            padding: 10px 18px;
            margin: 0 0 10px 0
        }

        .userActivities .comments li .c .form-control:focus {
            border-color: #e6e7ed
        }

        .userActivities .comments li.showComments {
            border-bottom: 0;
            padding: 0;
            margin: 0 0 15px 0
        }

        .userActivities .comments li.showComments .fa {
            color: #9da2a6;
            margin: 0 3px 0 0
        }

        .userActivities .comments li.showComments a:hover {
            color: #fe5621
        }

        @media (min-width: 992px) {
            .userProfileInfo .image img {
                width: 100%;
            }
        }
    </style>
@endsection