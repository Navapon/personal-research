@extends('template.landing-template')

@section('page-header')

    @include('components.page-header',[
        'header' =>   'รายงานผลงานวิจัย'
    ])

@endsection

@section('content')

    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-success"></i>
                              <i class="fa fa-pie-chart fa-stack-1x fa-inverse"></i>
                        </span>
                </div>
                <div class="panel-body">
                    <h4>รายงานโครงการวิจัย</h4>
                    <p>แสดงข้อมูลรายงานโครงการวิจัย ตามสาขาและภาพรวมรายปี</p>
                    <a href="{{ route('report-project')}}" class="btn btn-success">View</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-success"></i>
                              <i class="fa fa-bar-chart-o fa-stack-1x fa-inverse"></i>
                        </span>
                </div>
                <div class="panel-body">
                    <h4>รายงานวารสารตีพิมพ์</h4>
                    <p>แสดงข้อมูลรายงานวารสารที่ถูกตีพิมพ์ ตามสาขาและภาพรวมรายปี</p>
                    <a href="{{ route('report-journal') }}" class="btn btn-success">View</a>

                </div>
            </div>
        </div>
    </div>


@endsection
