@extends('template.landing-template')

@section('page-header')

    @include('components.page-header',[
        'header' =>   'แก้ไขข้อมูลสิทธิบัตร'
    ])

@endsection



@section('content')

    {{ Form::open(
        ['route' =>
            [
                'patent.update', $patent->pt_id
             ],
                'method' => 'PUT',
                'class' => 'form-horizontal',
                'enctype' => "multipart/form-data",
                'id' => 'patent-form'
         ])
    }}


    @include('research.patent.patent-form',['type' => 'edit'])

    {!! Form::close() !!}

@endsection
