@extends('template.landing-template')

@section('page-header')

    @include('components.page-header',[
        'header' =>   'เพิ่มข้อมูลผลงานวารสารวิชาการ'
    ])

@endsection


@section('content')

    {!! Form::open(
        [
            'action' => 'JournalController@store' ,
            'class' => 'form-horizontal',
            'enctype' => "multipart/form-data",
             'files' => true
        ]) !!}

    @include('research.journal._form',['type' => 'create'])

    {!! Form::close() !!}




@endsection
