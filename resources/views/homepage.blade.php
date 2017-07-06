@extends('template.landing-template')

@section('meta_tag')

    <meta name="description" content="utk,ราชมงคลกรุงเทพ,วิจัย,วิจัยคณะวิทย์,คณะวิท วิจัย,research science,คณะวิทยาศาสตร์และเทคโนโลยี,ฐานข้อมูลวิจัย">

@endsection



@section('carousel')

    @include('components.carousel')

@endsection

@section('blog')

    @include('components.blog.blog-component')

@endsection

@section('menu')

    @include('sweet::alert')

    @include('components.menu')

@endsection


