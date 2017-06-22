@extends('template.landing-template')

@section('page-header')

    @include('components.page-header',[
        'header' =>   'แก้ไขข้อมูลการประชุมวิชาการ'
    ])

@endsection



@section('content')

    {{ Form::open(
        ['route' =>
            [
                'conference.update', $conference->rc_id
             ],
                'method' => 'PUT',
                'class' => 'form-horizontal',
                'enctype' => "multipart/form-data",
                'id' => 'conference-form'
         ])
    }}


    @include('research.conference.conference-form',['type' => 'edit'])

    {!! Form::close() !!}

@endsection
