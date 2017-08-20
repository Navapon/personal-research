@extends('template.landing-template')

@section('meta_tag')

    <meta name="description" content="รายงานวิจัยคณะวิทยาศาสตร์,สถิติงานวิจัยคณะวิทยาศาสตร์">

@endsection

@section('page-header')

    @include('components.page-header',[
        'header' =>   'ดาวโหลดเอกสาร'
    ])

@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">
            <ul>
                <li><a href="{{ asset('document/manual-research.pdf') }}" target="_blank">
                        <i class="fa fa-download"></i> คู่มือนักวิจัย</a>
                </li>

                <li><a href="{{ asset('document/junyabun.pdf') }}" target="_blank">
                        <i class="fa fa-download"></i> จรรยาบรรณนักวิจัย </a>
                </li>
                <li><a href="http://www.rdi.rmutk.ac.th/index.php/ระเบียบมหาวิทยาลัยเทคโนโลยีราชมงคลกรุงเทพ" target="_blank">
                        <i class="fa fa-download"></i> ระเบียบมหาวิทยาลัยเทคโนโลยีราชมงคลกรุงเทพ</a>
                </li>
                <li><a href="http://www.rdi.rmutk.ac.th/index.php/download" target="_blank">
                        <i class="fa fa-download"></i> ดาวน์โหลดเอกสารงานวิจัย</a>
                </li>
                <li><a href="http://www.rdi.rmutk.ac.th/index.php/2015-09-14-10-50-56" target="_blank">
                        <i class="fa fa-download"></i> ฐานข้อมูลเพื่อการศึกษาและวิจัย</a>
                </li>
                <li><a href="http://www.rdi.rmutk.ac.th/index.php/2015-09-29-05-31-42" target="_blank">
                        <i class="fa fa-download"></i> หลักเกณฑ์การพิจารณาวารสารทางวิชาการสำหรับการเผยแพร่ผลงานทางวิชาการ พ.ศ.2556</a>
                </li>
            </ul>
        </div>
    </div>

    <br><br><br><br><br><br>

@endsection
