<form class="form-horizontal">
    <fieldset>
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


    <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="textinput">ชื่อเครื่องมือวิจัย
                <span style="color:red"> * </span> </label>
            <div class="col-md-9">
                <input id="textinput" name="re_name" placeholder="ระบุชื่อของเครื่องมือ" class="form-control input-md"
                       type="text" value="{{ old('re_name',isset($equipment->re_name) ? $equipment->re_name : '') }}">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="textinput">รหัสครุภัณฑ์ของเครื่องมือ
                <span style="color:red"> * </span>
            </label>
            <div class="col-md-9">
                <input id="textinput" name="re_serial_number" placeholder="ระบุรหัสครุภัณฑ์"
                       class="form-control input-md" type="text"
                       value="{{ old('re_serial_number',isset($equipment->re_serial_number) ? $equipment->re_serial_number : '') }}"
                >
            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="textarea">คำอธิบาย หรือ รายละเอียดของเครื่องมือ
                <span style="color:red"> * </span>
            </label>
            <div class="col-md-9">
                <textarea rows="5" class="form-control" name="re_description" maxlength="1500"
                          placeholder="อธิบายรายละเอียดต่างๆ ของเครื่องมือ">{{ old('re_description',isset($equipment->re_description) ? $equipment->re_description : '') }}</textarea>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="textinput">สาขาที่รับผิดชอบ
                <span style="color:red"> * </span>
            </label>
            <div class="col-md-9">
                <select name="re_major" id="" class="form-control">

                    <option value="">กรุณาระบุสาขา</option>
                    @foreach($majors as $major)

                        <option value="{{ $major->major_id }}"
                                {{  old('re_major') == $major->major_id  ? 'selected' : '' }}
                                {{  old('re_major',isset($equipment) ? $equipment->re_major == $major->major_id ? 'selected' : '' : '' )}}
                        >{{ $major->major_name }}</option>

                    @endforeach
                </select>

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="textinput">เบอร์ติดต่อ
                <span style="color:red"> * </span>
            </label>
            <div class="col-md-9">
                <input id="textinput" name="re_phone"
                       placeholder="ระบุเบอร์ภายใน หรือ มือถือ เพื่อไว้สำหรับติดต่อหากมีผู้สนใจอยากขอใช้เครื่องมือ"
                       class="form-control input-md" type="text"
                       value="{{ old('re_phone',isset($equipment->re_phone) ? $equipment->re_phone : '') }}"
                >
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="textinput">ปีของเครื่องมือ
                <span style="color:red"> * </span>
            </label>
            <div class="col-md-3">
                <select name="re_year" id="" class="form-control">

                    <option value="">กรุณาระบุปี</option>
                    @foreach($years as $year)
                        <option value="{{ $year->year_id }}"
                                {{  old('re_year') == $year->year_id  ? 'selected' : '' }}
                                {{  old('re_year',isset($equipment) ? $equipment->re_year == $year->year_id  ? 'selected' : '' : '' )}}
                        >

                            {{ $year->year_name }}
                        </option>
                    @endforeach
                </select>

            </div>

            <label class="col-md-2 control-label" for="textinput">สถานะเครื่องมือ
                <span style="color:red"> * </span>
            </label>
            <div class="col-md-4">
                <select name="re_status" id="" class="form-control">

                    <option value="">ระบุสถานะปัจจุบันของเครื่องมือ</option>
                    @foreach($eqstatus as $status)
                        <option value="{{ $status->re_status_id }}"
                                {{  old('re_status') == $status->re_status_id  ? 'selected' : '' }}
                                {{  old('re_status',isset($equipment) ? $equipment->re_status == $status->re_status_id  ? 'selected' : '' : '' )}}
                        >

                            {{$status->re_status_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>


        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="textinput">ราคา</label>
            <div class="col-md-9">
                <input id="textinput" name="re_amount" placeholder="ระบุราคาของเครื่องมือ หากไม่มีให้ปล่อยว่างไว้"
                       class="form-control input-md" type="number"
                       value="{{ old('re_amount',isset($equipment->re_amount) ? $equipment->re_amount : '') }}"

                       step="any"
                >
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="textinput">จำนวนเครื่องมือ
                <span style="color:red"> * </span>
            </label>
            <div class="col-md-3">
                <input id="textinput" name="re_number" placeholder="ระบุจำนวน"
                       class="form-control input-md" type="number"
                       value="{{ old('re_number',isset($equipment->re_number) ? $equipment->re_number : '') }}"
                       oninput="this.value=this.value.replace(/[^0-9\.]/g,'','');"
                >
            </div>

            <label class="col-md-2 control-label" for="textinput">หน่วยนับ
                <span style="color:red"> * </span>
            </label>
            <div class="col-md-4">
                <input id="textinput" name="re_namenumber" placeholder="หน่วยนับเช่น ชิ้น , ชุด , ตู้"
                       class="form-control input-md" type="text"
                       value="{{ old('re_namenumber',isset($equipment->re_namenumber) ? $equipment->re_namenumber : '') }}"
                >
            </div>
        </div>


        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="textinput">สถาที่ตั้ง ห้อง</label>
            <div class="col-md-2">
                <input id="textinput" name="re_room" placeholder="เลขห้อง"
                       class="form-control input-md" type="text"
                       value="{{ old('re_room',isset($equipment->re_room) ? $equipment->re_room : '') }}"
                >
            </div>
            <label class="col-md-1 control-label" for="textinput">ชั้น</label>
            <div class="col-md-2">
                <input id="textinput" name="re_floor" placeholder="ชั้นที่"
                       class="form-control input-md" type="text"
                       value="{{ old('re_floor',isset($equipment->re_floor) ? $equipment->re_floor : '') }}"
                >
            </div>
            <label class="col-md-2 control-label" for="textinput">ตึก
                <span style="color:red"> * </span>
            </label>
            <div class="col-md-2">
                <input id="textinput" name="re_building" placeholder="ชื่อหรือหมายเลขตึกเก็บเครื่องมือวิจัย"
                       class="form-control input-md" type="text"
                       value="{{ old('re_building',isset($equipment->re_building) ? $equipment->re_building : '') }}"
                >
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-offset-1 c col-md-2 control-label"
                   for="textinput">อัพโหลดรูปภาพประกอบ</label>
            <div class="col-md-9">

                <div class="input-group image-preview-input">
                    <input type="text" class="form-control image-preview-filename"
                           value="{{ old('re_file',isset($equipment->re_image) ? $equipment->re_image : '') }}"
                           readonly placeholder="สามารถอัพโหลดประเภทไฟล์ JPEG และ PNG เท่านั้น">
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
                                                <input type="file" accept=".jpeg,.png" name="re_file"
                                                       placeholder=""/>
                                                <!-- rename it -->
                                            </div>
                                </span>

                </div>
                <span class="help-block">หมายเหตุ สามารถอัพโหลดประเภทไฟล์ JPEG และ PNG เท่านั้นและขนาดไฟล์ไม่เกิน 50MB</span>

            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="pull-right">
                    <button type="submit" class="btn btn-success" id="submit-btn"><i class="fa fa-floppy-o"></i>
                        Save
                    </button>
                </div>
            </div>
        </div>
    </fieldset>
</form>

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
<script>
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

        $('#equipment-form').one('submit', function () {
            $(this).find('#submit-btn').attr('disabled', 'disabled');
        });

    });
</script>