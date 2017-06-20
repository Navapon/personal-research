@extends('template.landing-template')

@section('page-header')

    @include('components.page-header',[
        'header' =>   'แก้ไขข้อมูลผลงานวารสารวิชาการ'
    ])

@endsection



@section('content')

    {{ Form::open(
        ['route' =>
            [
                'journal.update', $journal->rj_id
             ],
                'method' => 'PUT',
                'class' => 'form-horizontal',
                'enctype' => "multipart/form-data",
                'id' => 'journal-form'
         ])
    }}


    @include('research.journal._form',['type' => 'edit'])

    {!! Form::close() !!}

@endsection
