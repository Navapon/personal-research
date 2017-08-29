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


    <div class="row">
        <div class="col-md-12">
            <h2><a href="{{ asset('document/stragy.pdf') }}" TARGET="_blank" download>แบบประเมินเว็บไซต์</a></h2>
            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScLYnikVw1bsVIA20Sq10spfFzblZx_NGpCaOf-XqNclt6XEg/viewform" frameborder="0" width="100%" height="800px"></iframe>
        </div>
    </div>

@endsection


