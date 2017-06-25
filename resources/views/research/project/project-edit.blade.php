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
                'project.update', $project->rp_id
             ],
                'method' => 'PUT',
                'class' => 'form-horizontal',
                'enctype' => "multipart/form-data",
                'id' => 'project-form'
         ])
    }}


     @include('research.project.project-form',['type' => 'edit'])

    {!! Form::close() !!}

@endsection
