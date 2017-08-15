<script src="//cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>

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
            <label class="col-md-3 control-label" for="textinput">ชื่อเรื่อง
                <span style="color:red"> * </span> </label>
            <div class="col-md-9">
                <input id="blog_title" name="blog_title" placeholder="ระบุชื่อหัวข้อ หรือ ชื่อเรื่อง"
                       class="form-control input-md"
                       type="text" value="{{ old('blog_title',isset($blog->blog_title) ? $blog->blog_title : '') }}">

            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="textarea">รายละเอียดเบื้องต้น
                <span style="color:red"> * </span>
            </label>
            <div class="col-md-9">
                <textarea rows="2" class="form-control" name="blog_information" maxlength="1000"
                          placeholder="ระบุรายละเอียดเบื้องต้น เพื่อดึงความสนใจของผู้ชม สามารถระบุได้ 1000 ตัวอักษร ">{{ old('blog_information',isset($blog->blog_information) ? $blog->blog_information : '') }}</textarea>
            </div>
        </div>
        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="textarea">เนื้อหาข่าว
                <span style="color:red"> * </span>
            </label>
            <div class="col-md-9">
                <textarea rows="10" class="form-control" name="blog_content" maxlength="3500"
                          placeholder="รายละเอียดของข่าว">{{ old('blog_content',isset($blog->blog_content) ? $blog->blog_content : '') }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-md-3 control-label">ประเภทของข่าว
                <span style="color:red"> * </span>
            </label>
            <div class="col-md-9">
                <select class="form-control" name="blog_type" id="blog_type">


                    <option value="">กรุณาระบุประเภท</option>
                    @foreach($blogtype as $type)
                        <option value="{{ $type->blog_type_id }}"
                                {{  old('blog_type') == $type->blog_type_id  ? 'selected' : '' }}
                                {{  old('blog_type',isset($blog) ? $blog->blog_type == $type->blog_type_id  ? 'selected' : '' : '' )}}
                        > {{ $type->blog_type_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-md-3 control-label">สถานะ
                <span style="color:red"> * </span>
            </label>
            <div class="col-md-9">
                <label class="radio-inline" for="radios-0">
                    <input type="radio" name="blog_status"
                           value="open" {{ old('blog_status',isset($blog) ? $blog ? 'checked' : '' : '' ) }} >
                    เปิดการประกาศข่าว
                </label>
                <label class="radio-inline" for="radios-1">
                    <input type="radio" name="blog_status"
                           value="close" {{  old('blog_status',isset($blog) ? $blog == "close" ? 'checked' : '' : '' ) }} >
                    ปิดการประกาศ
                </label>

            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-md-3 control-label">รูปภาพข่าว
                <span style="color:red"> * </span>
            </label>
            <div class="col-md-9">


                <div class="input-group image-preview-input">
                    <input type="text" class="form-control image-preview-filename"
                           value="{{ old('blog_image',isset($blog->blog_image) ? $blog->blog_image : '') }}"
                           readonly placeholder="สามารถอัพโหลดประเภทไฟล์ PNG และ JPG เท่านั้น"
                    >

                    <!-- don't give a name === doesn't send on POST/GET -->
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
                                                <input type="file" accept=".png,.jpg" name="blog_image"
                                                       placeholder=""/>
                                                <!-- rename it -->
                                            </div>
                                </span>

                </div>
                <span class="help-block">หมายเหตุ แนะนำความละเอียดของภาพ 750 x 450 ขึ้นไปและขนาดไฟล์ไม่เกิน 50MB</span>


                {{-- @if( $type == 'edit')
                     <a href="{{ asset('files').'/users/'. $journal->user->u_id . '/journal/'.$journal->rj_file}}"
                        class="btn btn-success">Uploaded file</a>

                 @endif--}}

            </div>
        </div>
{{--        @if( $type != 'edit')
            <div class="form-group">
                <label for="" class="col-md-3 control-label">ต้องการส่งข่าวผ่านทางอีเมลให้นักวิจัย
                    <span style="color:red"> * </span>
                </label>
                <div class="col-md-9">
                    <label class="radio-inline" for="">
                        <input type="radio" name="blog_email_flag" id="" value="send">
                        ใช่
                    </label>
                    <label class="radio-inline" for="">
                        <input type="radio" name="blog_email_flag" id="" value="none">
                        ไม่ใช่
                    </label>
                </div>
            </div>
        @endif--}}

        <div class="form-group">
            <div class="" style="text-align: center">
                <a href="{{ route('blog.index') }}" class="btn btn-danger">ยกเลิก</a>
                <button type="submit" id="submit-btn" class="btn btn-success">บันทึก</button>
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

        $('#blog-form').one('submit', function () {
            $(this).find('#submit-btn').attr('disabled', 'disabled');
        });

        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.

        CKEDITOR.replace('blog_content', {
            toolbar: [
                {name: 'document', items: ['Source']},
                {name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']},
                {name: 'editing', items: ['Find', 'Replace', 'SelectAll']},
                {name: 'forms', items: ['ImageButton']},
                '/',
                {name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike']},
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-']
                },
                {name: 'links', items: ['Link', 'Unlink', 'Anchor']},
                {
                    name: 'insert',
                    items: ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe']
                },
                '/',
                {name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize']},
                {name: 'colors', items: ['TextColor', 'BGColor']},
                {name: 'tools', items: ['Maximize']},

            ]
        });
    });
</script>