@extends('template.landing-template')

@section('meta_tag')

    <meta name="description" content="รายงานวิจัยคณะวิทยาศาสตร์,สถิติงานวิจัยคณะวิทยาศาสตร์">

@endsection

@section('page-header')

    @include('components.page-header',[
        'header' =>   'ยุทธศาสตร์ด้านวิจัย'
    ])

@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">
            <h2><a href="{{ asset('document/stragy.pdf') }}" TARGET="_blank" download>คลิก เพื่อดาวโหลด</a></h2>
            <iframe src="{{ asset('document/stragy.pdf') }}" frameborder="0" width="100%" height="800px"></iframe>
        </div>
    </div>


@endsection
