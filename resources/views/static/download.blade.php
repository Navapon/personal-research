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
        @include('sweet::alert')
        <div class="col-md-12">
            @if( !empty(Auth::id()) )
                @if( Auth::user()->u_role_id == 1 )
                    <button class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">Upload file</button>

                @endif
            @endif

            <br><br>
            <ul>
                @foreach($files as $row)
                    <li>

                        <a href="{{ asset('document/'.$row->download_file ) }}" target="_blank">
                            <i class="fa fa-download"></i> {{ $row->download_name }}</a>

                        @if( !empty(Auth::id()) )
                            @if( Auth::user()->u_role_id == 1 )
                                <form action="{{ route('deleteDownload', $row->download_id) }}" method="post" id="delete{{$row->download_id }}">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> ลบ
                                    </button>
                                </form>
                            @endif
                        @endif
                    </li>
                    @endforeach
                <li><a href="{{ asset('document/manual-research.pdf') }}" target="_blank">
                        <i class="fa fa-download"></i> คู่มือนักวิจัย</a>
                </li>

                <li><a href="{{ asset('document/junyabun.pdf') }}" target="_blank">
                        <i class="fa fa-download"></i> จรรยาบรรณนักวิจัย </a>
                </li>
                <li><a href="http://www.rdi.rmutk.ac.th/index.php/ระเบียบมหาวิทยาลัยเทคโนโลยีราชมงคลกรุงเทพ"
                       target="_blank">
                        <i class="fa fa-download"></i> ระเบียบมหาวิทยาลัยเทคโนโลยีราชมงคลกรุงเทพ</a>
                </li>
                <li><a href="http://www.rdi.rmutk.ac.th/index.php/download" target="_blank">
                        <i class="fa fa-download"></i> ดาวน์โหลดเอกสารงานวิจัย</a>
                </li>
                <li><a href="http://www.rdi.rmutk.ac.th/index.php/2015-09-14-10-50-56" target="_blank">
                        <i class="fa fa-download"></i> ฐานข้อมูลเพื่อการศึกษาและวิจัย</a>
                </li>
                <li><a href="http://www.rdi.rmutk.ac.th/index.php/2015-09-29-05-31-42" target="_blank">
                        <i class="fa fa-download"></i>
                        หลักเกณฑ์การพิจารณาวารสารทางวิชาการสำหรับการเผยแพร่ผลงานทางวิชาการ พ.ศ.2556</a>
                </li>
            </ul>
        </div>
    </div>
    <div id="uploadModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">อัพโหลดไฟล์</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('uploadDownload') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="" class="col-md-3">ชื่อที่แสดง </label>
                            <div class="col-md-9">
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3">เลือกไฟล์ </label>
                            <div class="col-md-9">
                                <input type="file" name="files" id="files" class="form-control" accept=".pdf,.docx" >
                            </div>
                        </div>
                        <div style="text-align: center">
                        <button class="btn btn-success" type="submit">บันทึก</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <br><br><br><br><br><br>

@endsection
