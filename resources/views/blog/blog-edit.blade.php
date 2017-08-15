@extends('template.landing-template')

@section('page-header')

    @include('components.page-header',[
        'header' =>   'แก้ไขข่าว'
    ])

@endsection



@section('content')

    {{ Form::open(
        ['route' =>
            [
                'blog.update', $blog->blog_id
             ],
                'method' => 'PUT',
                'class' => 'form-horizontal',
                'enctype' => "multipart/form-data",
                'id' => 'blog-form'
         ])
    }}


    @include('blog.blog-form',['type' => 'edit'])

    {!! Form::close() !!}

@endsection
