<script src="{{ mix('js/date-picker-th.js') }}"></script>

<section>
    <div class="wizard">
        <div class="wizard-inner">
            <div class="connecting-line"></div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab"
                       title="ขั้นตอนที่ 1 Project Information">
                            <span class="round-tab">
                                    <i class="glyphicon glyphicon-file"></i>
                            </span>
                    </a>
                </li>

                <li role="presentation" class="disabled">
                    <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab"
                       title="ขั้นตอนที่ 2 ผู้ร่วมวิจัย">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                    </a>
                </li>
            </ul>
        </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    <li style="color: blue">กรณีใส่ข้อมูลไม่ครบตามเงื่อนไข กรุณาทำการอัพโหลดไฟล์ใหม่อีกครั้ง</li>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>
            </div>
        @endif

        <form role="form" class="form-horizontal">
            <div class="tab-content">
                {{--TAB 1 --}}
                <div class="tab-pane active" role="tabpanel" id="step1">
                    <!-- Form Name -->
                    <legend>ข้อมูลโครงการวิจัย</legend>
                    <div class="form-group row">
                        <div class="col-md-offset-3 control-label pull-left">
                            <small style="color:red">หมายเหตุ กรุณากรอกข้อมูลที่มีเครื่องหมาย *
                                ให้ครบเพื่อความสมบูรณ์ของข้อมูล
                            </small>
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-2 control-label" for="rp_name">ชื่อโครงการวิจัย <span
                                    style="color:red"> * </span> </label>
                        <div class="col-md-8">


                            <input id="rp_name" name="rp_name" type="text"
                                   placeholder="ชื่อโครงการวิจัยของท่าน"
                                   class="form-control input-md"
                                   value="{{ old('rp_name',isset($project->rp_name) ? $project->rp_name : '') }}"
                            >
                            <span class="help-block">ระบุชื่อโครงการวิจัยของท่าน</span>
                        </div>
                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-2 control-label" for="rp_abstract">บทคัดย่อ ( Abstract )
                            <span
                                    style="color:red"> * </span></label>
                        <div class="col-md-8">
                                    <textarea class="form-control" name="rp_abstract" id="rp_abstract" cols="30"
                                              rows="10" maxlength="1500"
                                              placeholder="บาคัดย่อโครงการวิจัย">{{ old('rp_abstract',isset($project->rp_abstract) ? $project->rp_abstract : '') }}</textarea>
                            <span class="help-block">ระบุบทคัดย่อของงานของท่าน</span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-2 control-label" for="rp_meta_tag">คำสำคัญ
                        <span                     style="color:red"> * </span></label>
                        <div class="col-md-8">

                            <input id="rp_meta_tag" name="rp_meta_tag" type="text"
                                   placeholder="คำสำคัญใช้สำหรับในการค้นหาผ่าน google"
                                   class="form-control input-md"
                                   value="{{ old('rp_meta_tag',isset($project->rp_meta_tag) ? $project->rp_meta_tag : '') }}"
                            >
                            <span class="help-block">ระบุคำสำคัญใช้สำหรับการค้นหาผ่าน Google </span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        {{-- ACCEPT DATE--}}
                        <label class="col-md-offset-1 col-md-2 control-label" for="ืfund_id">แหล่งทุน
                            <span
                                    style="color:red"> * </span>
                        </label>
                        <div class="col-md-3">
                            <select name="fund_id" id="ืfund_id" class="form-control">
                                <option value="">กรุณาระบุประเภทแหล่งทุน</option>
                                @foreach($funds as $fund)
                                    <option value="{{ $fund->fund_id }}"
                                            {{  old('fund_id') == $fund->fund_id  ? 'selected' : '' }}
                                            {{  old('fund_id',isset($project) ? $project->fund_id == $fund->fund_id  ? 'selected' : '' : '' )}}
                                    >

                                        {{ $fund->fund_name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="help-block">ประเภทแหล่งทุน</span>
                        </div>


                        <label class="col-md-2 control-label" for="rp_fund_name"> ชื่อของแหล่งทุน
                        </label>
                        <div class="col-md-3">
                            <input id="rp_fund_name" name="rp_fund_name" type="text"
                                   placeholder="กรุณาระบุชื่อแหล่งทุน"
                                   class="form-control input-md"
                                   value="{{ old('rp_fund_name',isset($project->rp_fund_name) ? $project->rp_fund_name : '') }}"
                            >
                            <span class="help-block">หากมีกรุณาระบุ</span>
                        </div>

                    </div>

                    <div class="form-group">
                        {{-- ACCEPT DATE--}}
                        <label class="col-md-offset-1 col-md-2 control-label" for="rp_year">ปีที่ได้รับทุน
                            <span
                                    style="color:red"> * </span>
                        </label>
                        <div class="col-md-3">
                            <select name="rp_year" id="rp_year" class="form-control">
                                <option value="">กรุณาระบุปี</option>
                                @foreach($years as $year)
                                    <option value="{{ $year->year_id }}"
                                            {{  old('rp_year') == $year->year_id  ? 'selected' : '' }}
                                            {{  old('rp_year',isset($project) ? $project->rp_year == $year->year_id  ? 'selected' : '' : '' )}}
                                    >

                                        {{ $year->year_name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="help-block">ระบุปีที่ได้รับทุน</span>
                        </div>


                        <label class="col-md-2 control-label" for="rp_amount"> จำนวนเงินที่ได้รับ
                            <span
                                    style="color:red"> * </span>
                        </label>
                        <div class="col-md-3">
                            <input id="rp_amount" name="rp_amount" type="number"
                                   placeholder="กรุณาระบุจำนวนเงิน"
                                   class="form-control input-md"
                                   value="{{ old('rp_amount',isset($project->rp_amount) ? $project->rp_amount : '') }}"
                            >
                            <span class="help-block">กรุณาระบุจำนวนเงิน</span>
                        </div>

                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-2 control-label" for="rp_status">สภานะโครงการ
                            <span                     style="color:red"> * </span></label>
                        <div class="col-md-8">
                            <select name="rp_status" id="rp_status" class="form-control">
                                <option value="">กรุณาระบุสถานะของโครงการ</option>
                                @foreach($status as $item)
                                    <option value="{{ $item->rst_id }}"
                                            {{  old('rp_status') == $item->rst_id  ? 'selected' : '' }}
                                            {{  old('rp_status',isset($project) ? $project->rp_status == $item->rst_id  ? 'selected' : '' : '' )}}
                                    >

                                        {{ $item->rst_name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="help-block">ระบุสถานะของโครงการ</span>
                        </div>
                    </div>


                    <div class="form-group">
                        {{-- START DATE--}}
                        <label class="col-md-offset-1 col-md-2 control-label" for="rp_start">
                            ระยะเวลาทำวิจัยตั้งแต่
                            <span
                                    style="color:red"> * </span>
                        </label>
                        <div class="col-md-3">
                            <div class='input-group date' id=''>
                                <input type="text" id="start-picker" class="form-control"
                                       name="rp_start"
                                       value="{{ old('rp_start',isset($project->rp_start) ? \Carbon\Carbon::createFromFormat('Y-m-d',$project->rp_start)->toDateString(): '') }}"
                                       placeholder="คลิกเพื่อเลือกวันที่เริ่มต้นโครงการ" onkeydown="return false" readonly/>
                                <span class="input-group-addon" data-toggle="tooltip" title="คลิกเพื่อเลือกวันที่">
                                    <span class="glyphicon glyphicon-calendar"> </span>
                                </span>
                            </div>
                            <span class="help-block">หากต้องการเปลี่ยนปีคลิก เดือน-ปี -> ปี</span>
                        </div>

                        {{-- END DATE --}}
                        <label class="col-md-2 control-label" for="rp_end">ถึงวันที่ <span
                                    style="color:red"> * </span>
                        </label>
                        <div class="col-md-3">

                            <div class='input-group date' id=''>
                                <input type="text" class="form-control" readonly
                                       name="rp_end" id="end-picker"
                                       placeholder="คลิกเพื่อเลือกวันสิ้นสุดโครงการ" onkeydown="return false;"
                                       value="{{ old('rp_end',
                                       isset($project->rp_end) ?  \Carbon\Carbon::createFromFormat('Y-m-d',$project->rp_end)->toDateString()  : '') }}"
                                />
                                <span class="input-group-addon" data-toggle="tooltip" title="คลิกเพื่อเลือกวันที่">
                                        <i class="glyphicon glyphicon-calendar"></i>
                                </span>
                            </div>
                            <span class="help-block">หากต้องการเปลี่ยนปีคลิก เดือน-ปี -> ปี</span>
                        </div>


                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-offset-1 c col-md-2 control-label"
                               for="textinput">อัพโหลดไฟล์</label>
                        <div class="col-md-8">

                            <div class="input-group image-preview-input">
                                <input type="text" class="form-control image-preview-filename"
                                       value="{{ old('rp_file',isset($project->rp_file) ? $project->rp_file : '') }}"
                                       readonly>
                                <span class="input-group-btn">
                                             <!-- image-preview-clear button -->
                                            <button type="button" class="btn btn-danger image-preview-clear"
                                                    style="display:none;">
                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                    <!-- image-preview-input -->
                                            <div class="btn btn-success image-preview-input">
                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                <span class="image-preview-input-title">Choose File</span>
                                                <input type="file" accept=".docx,.doc,.pdf" name="rp_file"
                                                       placeholder=""/>
                                                <!-- rename it -->
                                            </div>
                                </span>

                            </div>
                            <span class="help-block">หมายเหตุ กรุณาอัพโหลดไฟล์</span>


                            @if( $type == 'edit' && (isset($project) && !empty($project->rp_file)))

                                <a href="{{ asset('files').'/users/'. $project->user->u_id . '/project/'.$project->rp_file}}"
                                   class="btn btn-success">Uploaded file</a>

                            @endif
                        </div>

                    </div>
                    {{-- Button --}}
                    <div class="form-group">

                        <div class="col-md-10 col-md-pull-2">
                        </div>

                        <div class="col-md-2 col-md-pull-1">
                            <ul class="list-inline col-md-offset-2 pull-right">
                                <li>
                                    <button type="button" class="btn btn-primary next-step">Next <i
                                                class="fa fa-arrow-right"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>

                {{--TAB 3--}}
                <div class="tab-pane" role="tabpanel" id="step2">

                    <legend>ผู้ร่วมวิจัย</legend>


                    @include('research.components.research-team',[
                        'obj' =>   isset($project) ? $project : '',
                        'user' => $user
                    ])

                    <div class="form-group">

                        <div class="col-md-6 col-md-pull-2">
                        </div>

                        <div class="col-md-6 col-md-pull-1">
                            <ul class="list-inline pull-right">
                                <li>
                                    <button type="button" class="btn btn-warning prev-step"><i
                                                class="fa fa-arrow-left"></i> Previous
                                    </button>
                                </li>
                                <li>
                                    <button type="submit" class="btn btn-success next-step"> Save <i
                                                class="fa fa-save"></i></button>
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>


            </div>
        </form>
    </div>
</section>

<style>

    .help-block {
        color: #bf5329;
    }

    .image-preview-input {
        position: relative;
        overflow: hidden;
        margin: 0px;
        color: #333;
        background-color: #fff;
        border-color: #ccc;
    }

    .image-preview-input input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }

    .image-preview-input-title {
        margin-left: 2px;
    }

    .wizard {
        margin: 10px auto;
        background: #fff;
    }

    .wizard .nav-tabs {
        position: relative;
        margin: 10px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }

    .connecting-line {
        height: 2px;
        background: #e0e0e0;
        position: absolute;
        width: 60%;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: 50%;
        z-index: 1;
    }

    .wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
        color: #555555;
        cursor: default;
        border: 0;
        border-bottom-color: transparent;
    }

    span.round-tab {
        width: 70px;
        height: 70px;
        line-height: 70px;
        display: inline-block;
        border-radius: 100px;
        background: #fff;
        border: 2px solid #e0e0e0;
        z-index: 2;
        position: absolute;
        left: 0;
        text-align: center;
        font-size: 25px;
    }

    span.round-tab i {
        color: #555555;
    }

    .wizard li.active span.round-tab {
        background: #fff;
        border: 2px solid #5bc0de;

    }

    .wizard li.active span.round-tab i {
        color: #5bc0de;
    }

    span.round-tab:hover {
        color: #333;
        border: 2px solid #333;
    }

    .wizard .nav-tabs > li {
        width: 50%;
    }

    .wizard li:after {
        content: " ";
        position: absolute;
        left: 46%;
        opacity: 0;
        margin: 0 auto;
        bottom: 0px;
        border: 5px solid transparent;
        border-bottom-color: #5bc0de;
        transition: 0.1s ease-in-out;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 46%;
        opacity: 1;
        margin: 0 auto;
        bottom: 0px;
        border: 10px solid transparent;
        border-bottom-color: #5bc0de;
    }

    .wizard .nav-tabs > li a {
        width: 70px;
        height: 70px;
        margin: 20px auto;
        border-radius: 100%;
        padding: 0;
    }

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

    .wizard .tab-pane {
        position: relative;
        padding-top: 50px;
    }

    .wizard h3 {
        margin-top: 0;
    }

    @media ( max-width: 585px ) {

        .wizard {
            width: 90%;
            height: auto !important;
        }

        span.round-tab {
            font-size: 16px;
            width: 50px;
            height: 50px;
            line-height: 50px;
        }

        .wizard .nav-tabs > li a {
            width: 50px;
            height: 50px;
            line-height: 50px;
        }

        .wizard li.active:after {
            content: " ";
            position: absolute;
            left: 35%;
        }
    }
</style>

<script type="text/javascript">
    $(document).ready(function () {
        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');

            nextTab($active);
            goToByScroll('tab-content');

        });
        $(".prev-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);
            goToByScroll('tab-content');
//            $(".tab-content").animate({ scrollTop: 0 }, 500);

        });
    });

    // This is a functions that scrolls to #{blah}link
    function goToByScroll(id) {
        // Remove "link" from the ID
        id = id.replace("link", "");
        // Scrolli
        $('html,body').animate({
                scrollTop: $("." + id).offset().top
            },
            'slow');
    }

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }
    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }

    $(document).on('click', '#close-preview', function () {
        $('.image-preview').popover('hide');
        // Hover befor close the preview
    });

    $(function () {
        // Create the close button
        var closebtn = $('<button/>', {
            type: "button",
            text: 'x',
            id: 'close-preview',
            style: 'font-size: initial;',
        });
        closebtn.attr("class", "close pull-right");

        // Clear event
        $('.image-preview-clear').click(function () {
            $('.image-preview').attr("data-content", "").popover('hide');
            $('.image-preview-filename').val("");
            $('.image-preview-clear').hide();
            $('.image-preview-input input:file').val("");
            $(".image-preview-input-title").text("Browse");
        });
        // Create the preview image
        $(".image-preview-input input:file").change(function () {
            var img = $('<img/>', {
                id: 'dynamic',
                width: 250,
                height: 200
            });
            var file = this.files[0];
            var reader = new FileReader();
            // Set preview image into the popover data-content
            reader.onload = function (e) {
                $(".image-preview-input-title").text("Change");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
            }
            reader.readAsDataURL(file);
        });


        $('#start-picker,#end-picker').pickadate({
            today: '',
            labelMonthNext: 'กดเพื่อไปยังเดือนถัดไป',
            labelMonthPrev: 'กดเพื่อย้อนไปยังเดือนก่อนหน้านี้',
            labelMonthSelect: 'กดเพื่อเลือกเดือน',
            labelYearSelect: 'กดเพื่อเลือกปี',
            selectMonths: true,
            selectYears: 50,
            format: ' dddd, dd mmm, yyyy',
            formatSubmit: 'yyyy-mm-dd',
            hiddenPrefix: 'date_',
        })


    });
</script>