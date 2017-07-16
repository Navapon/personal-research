@extends('template.landing-template')

@section('page-header')

    @include('components.page-header',[
        'header' =>   'เพิ่มเครื่องมือวิจัย'
    ])

@endsection


@section('content')

    {!! Form::open(
        [
            'action' => 'ResearchEquipmentController@store' ,
            'class' => 'form-horizontal',
            'enctype' => "multipart/form-data",
            'id' => "equipment-form",
            'files' => true
        ]) !!}

    @include('equipment.equipment-form',['type' => 'create'])

    {!! Form::close() !!}


@endsection
