@extends('template.landing-template')

@section('page-header')

    @include('components.page-header',[
        'header' =>   'เพิ่มข้อมูลสิทธิบัตร'
    ])

@endsection


@section('content')

    {!! Form::open(
        [
            'action' => 'PatentController@store' ,
            'class' => 'form-horizontal',
            'enctype' => "multipart/form-data",
            'files' => true
        ]) !!}

    @include('research.patent.patent-form',['type' => 'create'])

    {!! Form::close() !!}

@endsection
