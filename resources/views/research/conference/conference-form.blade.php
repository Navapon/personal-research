<script src="{{ mix('js/date-picker-th.js') }}"></script>

<section>
    <div class="wizard">
        <div class="wizard-inner">
            <div class="connecting-line"></div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab"
                       title="ขั้นตอนที่ 1 Proceeding Paper">
                            <span class="round-tab">
                                    <i class="glyphicon glyphicon-file"></i>
                            </span>
                    </a>
                </li>

                <li role="presentation" class="disabled">
                    <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab"
                       title="ขั้นตอนที่ 2 การประชุม ">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                    </a>
                </li>

                <li role="presentation" class="disabled">
                    <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"
                       title="ขั้นตอนที่ 3 ผู้ร่วมวิจัย">
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
                    <legend>ข้อมูลผลงาน ( Proceeding Paper )</legend>
                    <div class="form-group row">
                        <div class="col-md-offset-3 control-label pull-left">
                            <small style="color:red">หมายเหตุ กรุณากรอกข้อมูลที่มีเครื่องหมาย *
                                ให้ครบเพื่อความสมบูรณ์ของข้อมูล
                            </small>
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-2 control-label" for="rc_article_name">ชื่อบทความ <span
                                    style="color:red"> * </span> </label>
                        <div class="col-md-8">


                            <input id="rc_article_name" name="rc_article_name" type="text"
                                   placeholder="ชื่อบทความของท่าน"
                                   class="form-control input-md"
                                   value="{{ old('rc_article_name',isset($conference->rc_article_name) ? $conference->rc_article_name : '') }}"
                            >
                            <span class="help-block">ระบุชื่อบทความของท่าน</span>
                        </div>
                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-2 control-label" for="rc_abstract">บทคัดย่อ ( Abstract )
                            <span
                                    style="color:red"> * </span></label>
                        <div class="col-md-8">
                                    <textarea class="form-control" name="rc_abstract" id="rc_abstract" cols="30"
                                              rows="10" maxlength="1500"
                                              placeholder="บทคัดย่อของวารสาร">{{ old('rc_abstract',isset($conference->rc_abstract) ? $conference->rc_abstract : '') }}</textarea>
                            <span class="help-block">ระบุบทคัดย่อของงานของท่าน</span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-2 control-label" for="rc_meta_tag">คำสำคัญ </label>
                        <span
                                style="color:red"> * </span></label>
                        <div class="col-md-8">

                            <input id="rc_meta_tag" name="rc_meta_tag" type="text"
                                   placeholder="คำสำคัญใช้สำหรับในการค้นหาผ่าน google"
                                   class="form-control input-md"
                                   value="{{ old('rc_meta_tag',isset($conference->rc_meta_tag) ? $conference->rc_meta_tag : '') }}"
                            >
                            <span class="help-block">ระบุคำสำคัญใช้สำหรับการค้นหา</span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        {{-- ACCEPT DATE--}}
                        <label class="col-md-offset-1 col-md-2 control-label" for="rc_publish_date">วันที่เผยแพร่
                            <span
                                    style="color:red"> * </span>
                        </label>
                        <div class="col-md-3">
                            <div class='input-group date' id=''>
                                <input type="text" id="publish-picker" class="form-control"
                                       name="rc_publish_date"
                                       value="{{ old('rc_publish_date',isset($conference->rc_publish_date) ? \Carbon\Carbon::createFromFormat('Y-m-d',$conference->rc_publish_date)->toDateString() : '') }}"
                                       placeholder="คลิกเพื่อเลือกวันที่เผยแพร่" readonly/>

                                <input type="hidden" name="publish-picker" >
                                <span class="input-group-addon" data-toggle="tooltip" title="คลิกเพื่อเลือกวันที่">
                                    <span class="glyphicon glyphicon-calendar"> </span>
                                </span>
                            </div>
                            <span class="help-block">หากต้องการเปลี่ยนปีคลิก เดือน-ปี -> ปี</span>
                        </div>

                        <label class="col-md-2 control-label" for="rc_evaluate_article">ประเมินบทความโดย
                        </label>
                        <div class="col-md-3">
                            <input id="rc_evaluate_article" name="rc_evaluate_article" type="text"
                                   placeholder="ระบุการประเมินบทความ"
                                   class="form-control input-md"
                                   value="{{ old('rc_evaluate_article',isset($conference->rc_evaluate_article) ? $conference->rc_evaluate_article : '') }}"
                            >
                            <span class="help-block">เช่น ผู้ประเมินอิสระ ฯลฯ</span>
                        </div>

                    </div>


                    <div class="form-group">

                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-2 control-label" for="rc_proceeding_type">รูปแบบ Proceeding
                            <span
                                    style="color:red"> * </span>
                        </label>
                        <div class="col-md-3">
                            <select name="rc_proceeding_type" id="rc_proceeding_type" class="form-control">
                                <option value="">กรุณาระบุประเภทของ Proceeding</option>
                                @foreach($proceedings as $proceeding)
                                    <option value="{{ $proceeding->rpt_id }}"
                                            {{  old('rc_proceeding_type') == $proceeding->rpt_id  ? 'selected' : '' }}
                                            {{  old('rc_proceeding_type',isset($conference) ? $conference->rc_publish_level == $proceeding->rpt_id  ? 'selected' : '' : '' )}}
                                    >

                                        {{ $proceeding->rpt_name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="help-block">ประเภท</span>
                        </div>

                        <label class="col-md-2 control-label" for="rc_present_type">รูปแบบการนำเสนอ
                            <span
                                    style="color:red"> * </span>
                        </label>
                        <div class="col-md-3">
                            <select name="rc_present_type" id="rc_present_type" class="form-control">
                                <option value="">กรุณาระบุ รูปแบบการนำเสนอ</option>
                                @foreach($presents as $present)
                                    <option value="{{ $present->rsp_id }}"
                                            {{  old('rc_present_type') == $present->rsp_id  ? 'selected' : '' }}
                                            {{  old('rc_present_type',isset($conference) ? $conference->rc_present_type == $present->rsp_id  ? 'selected' : '' : '' )}}
                                    >{{ $present->rsp_name }}</option>
                                @endforeach
                            </select>
                            <span class="help-block">รูปแบบการนำเสนอ</span>
                        </div>
                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-2 control-label" for="rc_publish_level">เผยแพร่ในระดับ
                            <span
                                    style="color:red"> * </span>
                        </label>
                        <div class="col-md-3">
                            <select name="rc_publish_level" id="rc_publish_level" class="form-control">
                                <option value="">กรุณาระบุระดับการเผยแพร่</option>
                                @foreach($research_level as $level)
                                    <option value="{{ $level->rl_id }}"
                                            {{  old('rc_publish_level') == $level->rl_id  ? 'selected' : '' }}
                                            {{  old('rc_publish_level',isset($conference) ? $conference->rc_publish_level == $level->rl_id  ? 'selected' : '' : '' )}}
                                    >

                                        {{ $level->rl_name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="help-block">ระดับของวารสาร</span>
                        </div>

                        <label class="col-md-2 control-label" for="rc_volume">ปีที่ ( Volume ) <span
                                    style="color:red"> * </span>
                        </label>
                        <div class="col-md-3">
                            <input id="rc_volume" name="rc_volume" type="number" step="1"
                                   placeholder="ปีที่ของวารสาร"
                                   class="form-control input-md"
                                   value="{{ old('rc_volume',isset($conference->rc_volume) ? $conference->rc_volume : '') }}"
                            >
                            <span class="help-block">ปีที่ของวารสาร </span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-2 control-label" for="rc_issue">ฉบับที่ ( Issue )
                            {{--<span style="color:red"> * </span>--}}
                        </label>
                        <div class="col-md-3">
                            <input id="rc_issue" name="rc_issue" type="number" step="1"
                                   placeholder="เลขที่ของฉบับที่ได้รับ"
                                   class="form-control input-md"
                                   value="{{ old('rc_issue',isset($conference->rc_issue) ? $conference->rc_issue : '') }}"
                            >
                            <span class="help-block">หมายเลขฉบับ </span>
                        </div>

                        <label class="col-md-2 control-label" for="rc_page">หน้าที่พิมพ์
                            {{--<span style="color:red"> * </span>--}}
                        </label>
                        <div class="col-md-3">
                            <input id="rc_page" name="rc_page" type="text"
                                   placeholder="หน้าที่พิมทพ์"
                                   class="form-control input-md"
                                   value="{{ old('rc_page',isset($conference->rc_page) ? $conference->rc_page : '') }}"
                            >
                            <span class="help-block"> หมายเลขหน้า</span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-2 control-label" for="rc_award">รางวัลที่ได้รับ </label>
                        <div class="col-md-8">

                            <input id="rc_award" name="rc_award" type="text"
                                   placeholder="ระบุชื่อรางวัล ประเภทรางวัล หากงานของท่านได้รับรางวัลจ"
                                   class="form-control input-md"
                                   value="{{ old('rc_award',isset($conference->rc_award) ? $conference->rc_award : '') }}"
                            >
                            <span class="help-block">หากท่านได้รับรางวัลใดๆกรุณาระบุ</span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-offset-1 c col-md-2 control-label"
                               for="textinput">อัพโหลดไฟล์ <span
                                    style="color:red"> * </span></label>
                        <div class="col-md-8">

                            <div class="input-group image-preview-input">
                                <input type="text" class="form-control image-preview-filename"
                                       value="{{ old('rc_file',isset($conference->rc_file) ? $conference->rc_file : '') }}"
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
                                                <input type="file" accept=".docx,.doc,.pdf" name="rc_file"
                                                       placeholder=""/>
                                                <!-- rename it -->
                                            </div>
                                </span>

                            </div>
                            <span class="help-block">หมายเหตุ เมื่อทำการอัพโหลดไฟล์เข้าระบบ ระบบจะทำการเปลี่ยนชื่อของไฟล์</span>


                            @if( $type == 'edit')
                                <a href="{{ asset('files').'/users/'. $conference->user->u_id . '/conference/'.$conference->rc_file}}"
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

                {{-- TAB  2 --}}
                <div class="tab-pane" role="tabpanel" id="step2">
                    <!-- Form Name -->
                    <legend>ข้อมูลการประชุม ( Meeting )</legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-2 control-label" for="rc_meeting_name">ชื่อการประชุม <span
                                    style="color:red"> * </span> </label>
                        <div class="col-md-8">

                            <input id="rc_meeting_name" name="rc_meeting_name" type="text"
                                   placeholder="ระบุ ชื่อของงานการประชุม"
                                   class="form-control input-md"
                                   value="{{ old('rc_meeting_name',isset($conference->rc_meeting_name) ? $conference->rc_meeting_name : '') }}"
                            >
                            <span class="help-block">ระบุชื่อการประชุม</span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-2 control-label" for="rc_meeting_owner">หน่วยงาน/องค์กรที่จัดประชุม
                            <span
                                    style="color:red"> * </span> </label>
                        <div class="col-md-8">

                            <input id="rc_meeting_owner" name="rc_meeting_owner" type="text"
                                   placeholder="เจ้าของการประชุม"
                                   class="form-control input-md"
                                   value="{{ old('rc_meeting_owner',isset($conference->rc_meeting_owner) ? $conference->rc_meeting_owner : '') }}"
                            >
                            <span class="help-block">ระบุชื่อหน่วยงาน หรือ องค์กรที่จัดการประชุม</span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-2 control-label" for="rc_meeting_place">สถานที่จัดการประชุม
                            <span
                                    style="color:red"> * </span> </label>
                        <div class="col-md-8">

                            <input id="rc_meeting_place" name="rc_meeting_place" type="text"
                                   placeholder="สถานที่จัดการประชุม"
                                   class="form-control input-md"
                                   value="{{ old('rc_meeting_place',isset($conference->rc_meeting_place) ? $conference->rc_meeting_place : '') }}"
                            >
                            <span class="help-block">ระบุสถานที่จัดการประชุม</span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-2 control-label" for="rc_meeting_province">จังหวัด / รัฐ
                            <span
                                    style="color:red"> * </span> </label>
                        <div class="col-md-8">

                            <input id="rc_meeting_province" name="rc_meeting_province" type="text"
                                   placeholder="ชื่อจังหวัด หรือ รัฐ ที่จัดการประชุม"
                                   class="form-control input-md"
                                   value="{{ old('rc_meeting_province',isset($conference->rc_meeting_province) ? $conference->rc_meeting_province : '') }}"
                            >
                            <span class="help-block">ระบุจังหวัด / รัฐ </span>
                        </div>
                    </div>

                    <div class="form-group">
                        {{-- START DATE--}}
                        <label class="col-md-offset-1 col-md-2 control-label" for="rc_meeting_start">
                            ช่วงวันงานตั้งแต่วันที่
                            <span
                                    style="color:red"> * </span>
                        </label>
                        <div class="col-md-3">
                            <div class='input-group date' id=''>
                                <input type="text" id="start-picker" class="form-control"
                                       name="rc_meeting_start"
                                       value="{{ old('rc_meeting_start',isset($conference->rc_meeting_start) ? $conference->rc_meeting_start : '') }}"
                                       placeholder="คลิกเพื่อเลือกวันที่การประชุม" onkeydown="return false" readonly/>
                                <input type="hidden" name="start-picker">
                                <span class="input-group-addon" data-toggle="tooltip" title="คลิกเพื่อเลือกวันที่">
                                    <span class="glyphicon glyphicon-calendar"> </span>
                                </span>
                            </div>
                            <span class="help-block">หากต้องการเปลี่ยนปีคลิก เดือน-ปี -> ปี</span>
                        </div>

                        {{-- END DATE --}}
                        <label class="col-md-2 control-label" for="rc_meeting_end">ถึงวันที่ <span
                                    style="color:red"> * </span>
                        </label>
                        <div class="col-md-3">

                            <div class='input-group date' id=''>
                                <input type="text" class="form-control" readonly
                                       name="rc_meeting_end" id="end-picker"
                                       placeholder="คลิกเพื่อเลือกวันที่การประชุม" onkeydown="return false;"
                                       value="{{ old('rc_meeting_end',isset($conference->rc_meeting_end) ? $conference->rc_meeting_end : '') }}"
                                />
                                <input type="hidden" name="end-picker">
                                <span class="input-group-addon" data-toggle="tooltip" title="คลิกเพื่อเลือกวันที่">
                                        <i class="glyphicon glyphicon-calendar"></i>
                                </span>
                            </div>
                            <span class="help-block">หากต้องการเปลี่ยนปีคลิก เดือน-ปี -> ปี</span>
                        </div>


                    </div>
                    {{-- Button --}}
                    <div class="form-group">

                        <div class="col-md-6 col-md-pull-2">
                        </div>
                        <div class="col-md-6 col-md-pull-1" style="margin-top: 10px">
                            <ul class="list-inline pull-right">
                                <li>
                                    <button type="button" class="btn btn-warning prev-step"><i
                                                class="fa fa-arrow-left"></i> Previous
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-primary next-step"> Next <i
                                                class="fa fa-arrow-right"></i></button>
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>

                {{--TAB 3--}}
                <div class="tab-pane" role="tabpanel" id="step3">

                    <legend>ผู้ร่วมวิจัย</legend>


                    @include('research.components.research-team',[
                        'obj' =>   isset($conference) ? $conference : ''
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
                {{-- TAB 4--}}
                {{--     <div class="tab-pane" role="tabpanel" id="complete">
                         <h3>Complete</h3>
                         <p>You have successfully completed all steps.</p>
                     </div>--}}
                {{-- Button --}}


                <div class="clearfix"></div>
                {{--END TAB 4--}}
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
        width: 33%;
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


        $('#start-picker,#end-picker,#publish-picker').pickadate({
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