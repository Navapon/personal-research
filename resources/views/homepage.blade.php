@extends('template.landing-template')

@section('meta_tag')

    <meta name="description" content="ฐานข้อมูลวิจัยคณะวิทยาศาสตร์ราชมงคลกรุงเทพ,วิจัยราชมงคลกรุงเทพ,วิจัย,วิจัยคณะวิทย์,คณะวิท วิจัย,research science,คณะวิทยาศาสตร์และเทคโนโลยี,ฐานข้อมูลวิจัย,research rmutk,rmutk,utk">

@endsection



@section('carousel')

    @include('components.carousel')

@endsection

@section('blog')
    <div class="div" style="float: right">
        <i class="fa fa-eye" aria-hidden="true"> {{ Counter::showAndCount('home') }}</i>
            <i class="fa fa-eye" aria-hidden="true">   All hits {{ Counter::allHits() }}</i>
    </div>

    @include('components.blog.blog-component',$blogs)

@endsection

@section('menu')

    @include('sweet::alert')

    @include('components.menu')

@endsection


