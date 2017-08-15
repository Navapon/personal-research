@extends('template.landing-template')

@section('meta_tag')

    <meta name="description" content="ฐานข้อมูลวิจัยคณะวิทยาศาสตร์ราชมงคลกรุงเทพ,วิจัยราชมงคลกรุงเทพ,วิจัย,วิจัยคณะวิทย์,คณะวิท วิจัย,research science,คณะวิทยาศาสตร์และเทคโนโลยี,ฐานข้อมูลวิจัย,research rmutk,rmutk,utk">

@endsection



@section('carousel')

    @include('components.carousel')

@endsection

@section('blog')

    @include('components.blog.blog-component',$blogs)

@endsection

@section('menu')

    @include('sweet::alert')

    @include('components.menu')

@endsection


