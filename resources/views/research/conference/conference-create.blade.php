@extends('template.landing-template')

@section('page-header')

    @include('components.page-header',[
        'header' =>   'เพิ่มข้อมูลการประชุมวิชาการ'
    ])

@endsection


@section('content')

    {!! Form::open(
        [
            'action' => 'ConferenceController@store' ,
            'class' => 'form-horizontal',
            'enctype' => "multipart/form-data",
             'files' => true
        ]) !!}

    @include('research.conference.conference-form',['type' => 'create'])

    {!! Form::close() !!}

@endsection
