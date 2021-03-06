@extends('template.landing-template')

@section('meta_tag')

    <meta name="description" content="รายงานวิจัยคณะวิทยาศาสตร์,สถิติงานวิจัยคณะวิทยาศาสตร์">

@endsection

@section('page-header')

    @include('components.page-header',[
        'header' =>   'ระบบกลไลบริหารงานวิจัย'
    ])

@endsection

@section('content')
        
    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-md-offset-2">
            <img src="{{ asset('images/flow1.png') }}" alt="" class="">
            <img src="{{ asset('images/flow2.png') }}" alt="" class="">
            <img src="{{ asset('images/flow3.png') }}" alt="" class="">
        </div>
    </div>


@endsection
