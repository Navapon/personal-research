@extends('template.landing-template')

@section('meta_tag')

    <meta name="description" content="งานวิจัยคณะวิทยาศาสตร์ราชมงคลกรุงเทพ,นักวิจัย,ราชมงคลกรุงเทพ">

@endsection

@section('page-header')

    @include('components.page-header', [
            'header' => 'ผลงานวิชาการด้านวิจัย',
            'sub_header' => 'ของคณะวิทยาศาสตร์และเทคโนโลยี'
            ] )

@endsection

@section('content')

    <div class="col-xs-12 col-md-12 col-lg-12">
        <h4 style="color:red" class="pull-right" >สามารถค้นหาข้อมูลโดยพิมลงในช่อง Search ด้านล่าง</h4>

        <!-- Tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab-item-1" aria-controls="tab-item-1"
                                                      role="tab"
                                                      data-toggle="tab"
                                                      aria-expanded="false">วารสารวิชาการ</a>
            </li>
            <li role="presentation" class=""><a href="#tab-item-2" aria-controls="tab-item-2"
                                                role="tab" data-toggle="tab"
                                                aria-expanded="true">โครงการวิจัย</a>
            </li>

            <li role="presentation" class=""><a href="#tab-item-3" aria-controls="tab-item-3"
                                                role="tab" data-toggle="tab"
                                                aria-expanded="true">บทความประชุมวิชาการ</a>
            </li>
            <li role="presentation" class=""><a href="#tab-item-4" aria-controls="tab-item-4"
                                                role="tab" data-toggle="tab"
                                                aria-expanded="true">สิทธิบัตร</a>
            </li>

        </ul>

        <div class="tab-content">
            <!-- Research -->
            <div role="tabpanel" class="tab-pane fade active in" id="tab-item-1">
                <hr>

                @includeIf('research.journal.journal-list',['journals'=> $journals])


            </div>

            <!-- Project -->
            <div role="tabpanel" class="tab-pane fade" id="tab-item-2">
                <hr>

                @includeIf('research.project.project-profile-list',['projects'=> $projects,'task' => 'show'])

            </div>

            <!-- Conference  -->
            <div role="tabpanel" class="tab-pane fade" id="tab-item-3">
                <hr>

                @includeIf('research.conference.conference-list',['conferences'=> $conferences])


            </div>

            <div role="tabpanel" class="tab-pane fade" id="tab-item-4">
                <hr>

                @includeIf('research.patent.patent-list',['patents'=> $patents])


            </div>
        </div>
    </div>



@endsection