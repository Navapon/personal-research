<script src="{{ mix('js/date-picker-th.js') }}"></script>

<section>
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
        <!-- Form Name -->
        <legend>ข้อมูลสิทธิบัตร</legend>
        <div class="form-group row">
            <div class="col-md-offset-3 control-label pull-left">
                <small style="color:red">หมายเหตุ กรุณากรอกข้อมูลที่มีเครื่องหมาย *
                    ให้ครบเพื่อความสมบูรณ์ของข้อมูล
                </small>
            </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-offset-1 col-md-2 control-label" for="pt_name">ชื่อผลงาน <span
                        style="color:red"> * </span> </label>
            <div class="col-md-8">


                <input id="pt_name" name="pt_name" type="text"
                       placeholder="ชื่อผลงานของท่าน"
                       class="form-control input-md"
                       value="{{ old('pt_name',isset($patent->pt_name) ? $patent->pt_name : '') }}"
                >
                <span class="help-block">กรุณาระบุชื่อผลงานของท่าน</span>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-offset-1 col-md-2 control-label" for="pt_description">รายละเอียดเกี่ยวกับผลงาน
                <span
                        style="color:red"> * </span></label>
            <div class="col-md-8">
                                    <textarea class="form-control" name="pt_description" id="pt_description" cols="30"
                                              rows="6" maxlength="1000"
                                              placeholder="รายละเอียดเกี่ยวกับงานท่าน">{{ old('pt_description',isset($patent->pt_description) ? $patent->pt_description : '') }}</textarea>
                <span class="help-block">รายละเอียดเกี่ยวกับผลงาน</span>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-offset-1 col-md-2 control-label" for="pt_meta_tag">คำสำคัญ </label>
            <span
                    style="color:red"> * </span></label>
            <div class="col-md-8">

                <input id="pt_meta_tag" name="pt_meta_tag" type="text"
                       placeholder="คำสำคัญใช้สำหรับในการค้นหาผ่าน google"
                       class="form-control input-md"
                       value="{{ old('pt_meta_tag',isset($patent->pt_meta_tag) ? $patent->pt_meta_tag : '') }}"
                >
                <span class="help-block">ระบุคำสำคัญใช้สำหรับการค้นหา</span>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-offset-1 col-md-2 control-label" for="pt_number">เลขที่คำขอรับสิทธิบัตร /
                อนุสิทธิบัตร </label>
            <span
                    style="color:red"> * </span></label>
            <div class="col-md-8">

                <input id="pt_number" name="pt_number" type="number"
                       placeholder="กรุณาระบุเลขที่"
                       class="form-control input-md"
                       value="{{ old('pt_number',isset($patent->pt_number) ? $patent->pt_number : '') }}"
                >
                <span class="help-block">ระบุเลขที่คำขอรับสิทธิบัตร / อนุสิทธิบัตร</span>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-offset-1 col-md-2 control-label" for="pt_publish_level">เผยแพร่ในระดับ
                <span
                        style="color:red"> * </span>
            </label>
            <div class="col-md-3">
                <select name="pt_publish_level" id="pt_publish_level" class="form-control">
                    <option value="">กรุณาระบุระดับการเผยแพร่</option>
                    @foreach($research_level as $level)
                        <option value="{{ $level->rl_id }}"
                                {{  old('pt_publish_level') == $level->rl_id  ? 'selected' : '' }}
                                {{  old('pt_publish_level',isset($patent) ? $patent->pt_publish_level == $level->rl_id  ? 'selected' : '' : '' )}}
                        >

                            {{ $level->rl_name }}
                        </option>
                    @endforeach
                </select>
                <span class="help-block">ระดับของสิทธิบัตร</span>
            </div>

            <label class="col-md-2 control-label" for="pt_type">ประเภทสิทธิบัตร <span
                        style="color:red"> * </span>
            </label>
            <div class="col-md-3">

                <select name="pt_type" id="pt_type" class="form-control">
                    <option value="">กรุณาระบุระดับการเผยแพร่</option>
                    @foreach($patent_type as $type)
                        <option value="{{ $type->ptt_id }}"
                                {{  old('pt_type') == $type->ptt_id  ? 'selected' : '' }}
                                {{  old('pt_type',isset($patent) ? $patent->pt_publish_level == $type->ptt_id  ? 'selected' : '' : '' )}}
                        >
                            {{ $type->ptt_name }}
                        </option>
                    @endforeach
                </select>
                <span class="help-block">ประเภทของสิทธิบัตร</span>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            {{-- ACCEPT DATE--}}
            <label class="col-md-offset-1 col-md-2 control-label" for="pt_accept">วันที่ออก
                <span
                        style="color:red"> * </span>
            </label>
            <div class="col-md-3">
                <div class='input-group date' >
                    <input type="text" id="publish-picker" class="form-control"
                           name="pt_accept"
                           value="{{ old('pt_accept',isset($patent->pt_accept) ? \Carbon\Carbon::createFromFormat('Y-m-d',$patent->pt_accept)->toDateString() : '') }}"
                           placeholder="คลิกเพื่อเลือกวันที่ออก" readonly/>
                    <span class="input-group-addon" data-toggle="tooltip" title="คลิกเพื่อเลือกวันที่ออก">
                                    <span class="glyphicon glyphicon-calendar"> </span>
                                </span>
                </div>
                <span class="help-block">หากต้องการเปลี่ยนปีคลิก เดือน-ปี -> ปี</span>
            </div>

            <label class="col-md-2 control-label" for="pt_expire">วันที่หมดอายุ
            </label>
            <div class="col-md-3">
                <div class='input-group date' id=''>
                    <input type="text" id="expire-picker" class="form-control"
                           name="pt_expire"
                           value="{{ old('pt_expire',isset($patent->pt_expire) ? \Carbon\Carbon::createFromFormat('Y-m-d',$patent->pt_expire )->toDateString(): '') }}"
                           placeholder="คลิกเพื่อเลือกวันที่หมดอายุ" readonly/>
                    <span class="input-group-addon" data-toggle="tooltip" title="คลิกเพื่อเลือกวันที่">
                                    <span class="glyphicon glyphicon-calendar"> </span>
                                </span>
                </div>
                <span class="help-block">หากต้องการเปลี่ยนปีคลิก เดือน-ปี -> ปี</span>
            </div>

        </div>

        </div>
        {{-- Button --}}
        <div class="form-group">

            <div class="col-md-6 ">
            </div>

            <div class="col-md-6 ">
                <ul class="list-inline">
                    <li>
                        <button type="submit" class="btn btn-success next-step"> Save <i
                                    class="fa fa-save"></i></button>
                    </li>
                </ul>
            </div>

        </div>

        <div class="clearfix"></div>
    </form>

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

</style>

<script type="text/javascript">

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

        $('#publish-picker,#expire-picker').pickadate({
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