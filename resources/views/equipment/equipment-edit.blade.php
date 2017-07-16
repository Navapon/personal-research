@extends('template.landing-template')

@section('page-header')

    @include('components.page-header',[
        'header' =>   'แก้ไขข้อมูลเครื่องมือ'
    ])

@endsection



@section('content')

    {{ Form::open(
        ['route' =>
            [
                'equipment.update', $equipment->re_id
             ],
                'method' => 'PUT',
                'class' => 'form-horizontal',
                'enctype' => "multipart/form-data",
                'id' => 'equipment-form'
         ])
    }}


    @include('equipment.equipment-form',['type' => 'edit'])

    {!! Form::close() !!}

@endsection
