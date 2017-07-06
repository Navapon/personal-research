@extends('template.landing-template')


@section('page-header')

    @include('components.page-header',[
        'header' => 'เกิดข้อผิดพลาด'
    ])

@endsection


@section('content')


    <div class="row">

        <div class="col-lg-12">
            <div class="jumbotron">
                <h1><span class="error-404">Something Wrong</span>
                </h1>
                <p>The page you're looking for could not be found or something is wrong <br> Please contact your administrator</p>
                <ul>
                    <li>
                        <a href="{{ route('home') }}"> หน้าแรก</a>
                    </li>
                    <li>
                        <a href="{{ route('research.index') }}">ผลงานวิชาการ</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.index') }}">รายชื่อนักวิจัย</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

@endsection