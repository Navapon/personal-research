@extends('template.landing-template')

@section('page-header')

    @include('components.page-header',[
        'header' =>   'เพิ่มข้อมูลโครงการวิจัย'
    ])

@endsection


@section('content')

    {!! Form::open(
        [
            'action' => 'ProjectController@store' ,
            'class' => 'form-horizontal',
            'enctype' => "multipart/form-data",
            'id' => 'project-form',
            'files' => true
        ]) !!}

    @include('research.project.project-form',['type' => 'create'])

    {!! Form::close() !!}

@endsection
