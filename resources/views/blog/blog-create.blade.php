@extends('template.landing-template')

@section('page-header')

    @include('components.page-header',[
        'header' =>   'เพิ่มข่าว'
    ])

@endsection


@section('content')

    {!! Form::open(
        [
            'action' => 'BlogController@store' ,
            'class' => 'form-horizontal',
            'enctype' => "multipart/form-data",
            'id' => "blog-form",
            'files' => true
        ]) !!}

    @include('blog.blog-form',['type' => 'create'])

    {!! Form::close() !!}


@endsection
