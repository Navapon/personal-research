@extends('template.landing-template')

@section('page-header')

    @include('components.page-header',[
        'header' =>  $user->u_name_th . ' ' . $user->u_surname_th
    ])

@endsection


@section('content')

    <script src="{{ mix('js/date-picker-th.js') }}"></script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {

                // generate example files
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#user_image')
                        .attr('src', e.target.result)

                };
                reader.readAsDataURL(input.files[0]);

//                var fileSelect = $('#u_img');
//                var files = fileSelect.files;
//                var form_data = $('#profile_form').serialize()

                var form = new FormData();
                var image = input.files[0];
                form.append('u_img', image);
                form.append('_token', $("input[name*='_token']").val());
                form.append('id', $('#u_id').val());

                $.ajax({
                    url: '/profile/uploadProfileImage',
                    data: form,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: "post",
                    success: function (data) {

                        swal({
                            title: data,
                            text: 'ท่านได้ทำการเปลี่ยนรูปโปรไฟล์เรียบร้อย',
                            type: 'success',
                            timer: 1500,

                        })
                    }
                })
            }
        }
    </script>

    @include('sweet::alert')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 col-lg-3">
                <div class="userProfileInfo">
                    <div class="image text-center">
                        <img id="user_image"
                             src="{{ $user->u_image ? asset('images').'/' .$user->u_image: '/images/user-img.png' }}"
                             style=""
                             alt="" class="img-responsive"
                        >

                        <a href="#" onclick="document.getElementById('u_img').click();return false" title="#"
                           class="editImage">
                            <i class="fa fa-camera"></i>
                        </a>
                    </div>
                    <div class="box">
                        <div class="name">
                            <strong>{{ $user->academic->academic_name or ''}} {{ $user->u_name_th . ' ' . $user->u_surname_th }}</strong><br>
                            <label for="">
                            </label>
                        </div>

                        <div class="info">
                            <span><i class="fa fa-fw fa-phone"></i> <a href="tel:+4210555888777"
                                                                       title="#">{{ $user->u_phone }}</a></span>
                            <span><i class="fa fa-fw fa-list-alt"></i> <a href="#"
                                                                          title="#">{{ $user->u_email }}</a></span>
                        </div>


                        <div class="social-buttons row">
                            @if ($user->u_facebook)
                                <div class="col md-4">
                                    <a href="{{ $user->u_facebook }}" title="{{ $user->u_facebook  }}" target="_blank"
                                       class="button-facebook">
                                        <i class="social-icon fa fa-facebook fa-2x"></i>
                                    </a>
                                </div>

                            @endif
                            @if ($user->u_line)
                                <div class="col md-4">
                                    <a href="http://line.me/ti/p/~{{ $user->u_line }}" title="{{ $user->u_line  }}"
                                       target="_blank"
                                       class="button-line">
                                        <i class="social-icon fa  fa-2x">Line</i>
                                    </a>
                                </div>
                            @endif

                            @if ($user->u_instragram)
                                <div class="col md-4">
                                    <a href="http://instagram.com/_u/{{ $user->u_instragram }}"
                                       title="{{ $user->u_instragram  }}"
                                       target="_blank"
                                       class="button-instagram">
                                        <i class="social-icon fa fa-instagram fa-2x"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-8 col-lg-9">

                <div class="box">
                    @if(Auth::id() == $user->u_id)
                        <a href="{{ route('profile.show',$user->u_id) }}">
                            <button class="btn btn-primary pull-right"><i class="fa fa-arrow-left"></i>
                                กลับไปยังหน้าแสดงผล
                            </button>
                        </a>
                    @endif
                    <h1 class="boxTitle">ข้อมูลส่วนตัว</h1>
                    <!-- Tabs -->
                    <ul class="nav nav-tabs userProfileTabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab-item-1" aria-controls="tab-item-1"
                                                                  role="tab"
                                                                  data-toggle="tab"
                                                                  aria-expanded="false">เกี่ยวกับเรา</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab-item-2" aria-controls="tab-item-2"
                                                            role="tab" data-toggle="tab"
                                                            aria-expanded="true">ผลงานวิชาการ</a>
                        </li>

                        <li role="presentation" class=""><a href="#tab-item-3" aria-controls="tab-item-3"
                                                            role="tab" data-toggle="tab"
                                                            aria-expanded="true">โครงการวิจัย</a>
                        </li>

                    </ul>

                    <div class="tab-content">
                        <!-- About -->
                        <div role="tabpanel" class="tab-pane fade active in" id="tab-item-1">
                            <hr>
                            <div class="userProfileContent">
                                <div class="i form-group">
                                    <div class="row well">

                                        {{ Form::open( ['route' => ['profile.update', $user->u_id], 'method' => 'PUT','class' => 'form-horizontal','enctype' => "multipart/form-data",'id' => 'profile_form']) }}
                                        <input type="file" id="u_img" name="u_img" onchange="readURL(this)"
                                               accept="image/*"
                                               style="visibility: hidden; width: 1px; height: 1px"/>
                                        <!-- Form Name -->
                                        <input type="hidden" name="u_id" id="u_id" value="{{ $user->u_id }}">
                                        <legend>แก้ไขข้อมูลส่วนตัว</legend>

                                        <!-- Text input-->
                                        <div class="form-group{{ $errors->has('u_email') ? ' has-error' : '' }}">
                                            <label class="col-sm-2 control-label" for="textinput">อีเมล</label>
                                            <div class="col-sm-10">
                                                <input type="email" placeholder="กรุณาระบุอีเมลของท่าน"
                                                       name="u_email" class="form-control"
                                                       value="{{ old('u_email', $user->u_email ) }}">
                                                @if ($errors->has('u_email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('u_email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" {{ $errors->has('u_identity') ? ' has-error' : '' }}
                                                   for="textinput">รหัสบัตรประชาชน</label>
                                            <div class="col-sm-4 {{ $errors->has('u_identity') ? ' has-error' : '' }}" >
                                                <input type="text" maxlength="13" placeholder="ระบุรหัสบัตรประชาชน"
                                                       name="u_identity" class="form-control"
                                                       oninput="this.value=this.value.replace(/[^0-9]/g,''); "
                                                       value="{{ old('u_identity', $user->u_identity ) }}">
                                                @if ($errors->has('u_identity'))
                                                    <span class="help-block">
                                                        <strong>กรุณาระบุเลขบัตรประชาชนให้ครบ 13 หลัก</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <label class="col-sm-2 control-label" for="textinput">เพศ</label>
                                            <div class="col-sm-4">
                                                <select name="u_sex" id="u_sex" class="form-control">
                                                    <option value="">ไม่ระบุ</option>
                                                    <option value="ชาย" {{ $user->u_sex == 'ชาย' ||  old('u_sex') == 'ชาย' ? 'selected' : ''}} >
                                                        ชาย
                                                    </option>
                                                    <option value="หญิง" {{ $user->u_sex == 'หญิง' ||  old('u_sex') == 'หญิง' ? 'selected' : ''}} >
                                                        หญิง
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"
                                                   for="textinput">ตำแหน่งทางวิชาการ</label>
                                            <div class="col-sm-4">
                                                <select name="u_academic_id" id="" class="form-control">
                                                    <option value="">ไม่มีตำแหน่งวิชาการ</option>
                                                    @foreach($academics as $academic)
                                                        <option value="{{ $academic->academic_id }}"
                                                                {{ $user->u_academic_id == $academic->academic_id ||  old('u_academic_id') == $academic->academic_id ? 'selected' : ''}}
                                                        >{{ $academic->academic_name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="{{ $errors->has('u_birthdate') ? ' has-error' : '' }}">
                                                <label class="col-sm-2 control-label"
                                                       for="textinput">วันเดือนปีเกิด</label>


                                                <div class="col-sm-4">
                                                    <div class='input-group date' id=''>
                                                        <input type="text" class="form-control"
                                                               name="u_birthdate" id="birthdate-picker"
                                                               placeholder="เลือกวันเดือนปีเกิด"
                                                               value="{{ old('u_birthdate',$user->u_birthdate ) }}"
                                                               />
                                                        <input type="hidden" id="u_birthdate">
                                                        <span class="input-group-addon" data-toggle="tooltip"
                                                              title="คลิกชื่องด้านซ้ายเพื่อเลือกวันที่">
                                                                <i class="glyphicon glyphicon-calendar"></i>
                                                        </span>
                                                    </div>
                                                    @if ($errors->has('u_birthdate'))
                                                        <span class="help-block">
                                                        <strong>กรุณาระบุ วันเดือนปีเกิดของท่าน</strong>
                                                    </span>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>


                                        <!-- Text input-->
                                        <div class="form-group">
                                            <div class="{{ $errors->has('u_name_th') ? ' has-error' : '' }}">
                                                <label class="col-sm-2 control-label" for="textinput">ชื่อ (ไทย)</label>
                                                <div class="col-sm-4">
                                                    <input type="text" placeholder="ชื่อของท่าน"
                                                           class="form-control" name="u_name_th"
                                                           value="{{  old('u_name_th',$user->u_name_th ) }}">
                                                    @if ($errors->has('u_name_th'))
                                                        <span class="help-block">
                                                        <strong>กรุณาระบุ ชื่อ</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="{{ $errors->has('u_surname_th') ? ' has-error' : '' }}">
                                                <label class="col-sm-2 control-label"
                                                       for="textinput">นามสกุล (ไทย)</label>
                                                <div class="col-sm-4">
                                                    <input type="text" placeholder="นามสกุลของท่าน"
                                                           class="form-control" name="u_surname_th"
                                                           value="{{ old('u_surname_th',$user->u_surname_th) }}">
                                                    @if ($errors->has('u_surname_th'))
                                                        <span class="help-block">
                                                        <strong>กรุณาระบุ นามสกุล</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <div class="{{ $errors->has('u_name_en') ? ' has-error' : '' }}">
                                                <label class="col-sm-2 control-label" for="textinput">ชื่อ
                                                    (อังกฤษ)</label>
                                                <div class="col-sm-4">
                                                    <input type="text" placeholder="ํYour name .."
                                                           class="form-control" name="u_name_en"
                                                           value="{{  old('u_name_en',$user->u_name_en ) }}">
                                                    @if ($errors->has('u_name_en'))
                                                        <span class="help-block">
                                                        <strong></strong>
                                                    </span>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="{{ $errors->has('u_surname_en') ? ' has-error' : '' }}">
                                                <label class="col-sm-2 control-label"
                                                       for="textinput">นามสกุล (อังกฤษ)</label>
                                                <div class="col-sm-4">
                                                    <input type="text" placeholder="Your Surname.."
                                                           class="form-control" name="u_surname_en"
                                                           value="{{ old('u_surname_en',$user->u_surname_en) }}">
                                                    @if ($errors->has('u_surname_en'))
                                                        <span class="help-block">
                                                        <strong></strong>
                                                    </span>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <div class="{{ $errors->has('u_major_id') ? ' has-error' : '' }}">
                                                <label class="col-sm-2 control-label" for="textinput">สาขา</label>
                                                <div class="col-sm-4">
                                                    <select name="u_major_id" id="" class="form-control">

                                                        <option value="">ไม่ได้ระบุสาขา</option>
                                                        @foreach($majors as $major)

                                                            <option value="{{ $major->major_id }}"
                                                                    {{ $user->u_major_id == $major->major_id || old('u_major_id') == $major->major_id ? 'selected' : '' }}
                                                            >{{ $major->major_name }}</option>

                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('u_major_id'))
                                                        <span class="help-block">
                                                        <strong>กรุณาระบุ สาขาวิชาของท่าน</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                            </div>
                                            <div>
                                                <label class="col-sm-2 control-label"
                                                       for="textinput">เบอร์โทรศัพท์</label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="u_phone" maxlength="10"
                                                           oninput="this.value=this.value.replace(/[^0-9]/g,''); "
                                                           placeholder="เบอร์โทรศัพท์ของท่าน" class="form-control"
                                                           value="{{  old('u_phone',$user->u_phone) }}"
                                                    >
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"
                                                   for="textinput">Facebook URL</label>
                                            <div class="col-sm-10">
                                                <div class="input-group ">
                                                            <span class="input-group-addon transparent"
                                                                  style="background-color: #3b5998"><i
                                                                        class="fa fa-facebook" style="color:white"></i></span>
                                                    <input class="form-control left-border-none"
                                                           placeholder="url เฟสบุ้คของท่าน เช่น https://www.facebook.com/yourfacebookid type="text"
                                                           name="u_facebook"
                                                           value="{{  old('u_facebook',$user->u_facebook )}}">
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"
                                                   for="textinput">Line ID</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                            <span class="input-group-addon transparent"
                                                                  style="background-color: #00c300"><i
                                                                        class="fa fa-line" style="color:white">Line</i></span>
                                                    <input class="form-control left-border-none"
                                                           placeholder="Id Line ของท่าน" type="text"
                                                           name="u_line"
                                                           value="{{  old('u_line',$user->u_line )}}">
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"
                                                   for="textinput">Instagram</label>
                                            <div class="col-sm-10">
                                                <div class="input-group ">
                                                            <span class="input-group-addon transparent"
                                                                  style="background-color: #fd1d1d"><i
                                                                        class="fa fa-instagram" style="color:white"></i></span>
                                                    <input class="form-control left-border-none"
                                                           placeholder="ระบุชื่อ instagram ของท่าน" type="text"
                                                           name="u_instragram"
                                                           value="{{  old('u_instragram',$user->u_instragram )}}">
                                                </div>
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"
                                                   for="textinput">ข้อมูลเกี่ยวกับตัวคุณ</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="u_description" id="u_description"
                                                          placeholder="ข้อความที่อธิบาย ข้อมูลเกี่ยวกับตัวคุณหรือความสามารถพิเศษ ความเชี่ยวชาญ สิ่งที่สนใจ ฯลฯ"
                                                          cols="30"
                                                          rows="5">{{  old('u_description',$user->u_description) }}</textarea>
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="pull-right">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>


                                        {{--</form>--}}
                                        {{ FORM::close() }}
                                    </div><!-- /.row -->

                                </div>

                            </div>
                        </div>

                        <!-- Research -->
                        <div role="tabpanel" class="tab-pane fade" id="tab-item-2">
                            <hr>
                            <div class="i form-group">

                                @if(Auth::id() == $user->u_id)
                                    <div class="btn-group form-group">

                                        <a href="{{ route('research.create',['type' => 'journal']) }}"
                                           class="btn btn-default">
                                            <i class="fa fa-plus-circle"></i>
                                            เพิ่มวารสาร ( Journal )
                                        </a>

                                        <a href="{{ route('research.create',['type' => 'conference']) }}"
                                           class="btn btn-default">
                                            <i class="fa fa-plus-circle"></i>
                                            เพิ่มบทความ ( Conference )
                                        </a>

                                        <a href="{{ route('research.create',['type' => 'patent']) }}"
                                           class="btn btn-default">
                                            <i class="fa fa-plus-circle"></i>
                                            เพิ่มสิทธิบัตร
                                        </a>

                                    </div>
                                @endif

                                <br>
                                <div class="well">
                                    <h2 class="boxHeadline"><i class="fa fa-file" aria-hidden="true"></i>
                                        ด้านวารสารวิชาการ ( Journal ) </h2>

                                    @includeIf('research.journal.journal-profile-list',['journals' => $journals,'task' => 'edit'])
                                </div>
                                <br>
                                <div class="well">
                                    <h2 class="boxHeadline"><i class="fa fa-building-o" aria-hidden="true"></i>
                                        สิทธิบัตร ( Patent ) </h2>
                                    @includeIf('research.patent.patent-profile-list',['patents' => $patents,'task' => 'edit'])

                                </div>
                                    <br>
                                <div class="well">
                                    <h2 class="boxHeadline"><i class="fa fa-building-o" aria-hidden="true"></i>
                                        ด้านบทความประชุมวิชาการ ( Conference ) </h2>

                                    @includeIf('research.conference.conference-profile-list',['conferences' => $conferences,'task' => 'edit'])

                                </div>


                            </div>
                        </div>

                        <!-- Project  -->
                        <div role="tabpanel" class="tab-pane fade" id="tab-item-3">
                            <hr>
                            <div class="i form-group">

                                @if(Auth::id() == $user->u_id)
                                    <div class="btn-group form-group">

                                        <a href="{{ route('research.create',['type' => 'project']) }}"
                                           class="btn btn-default">
                                            <i class="fa fa-plus-circle"></i>
                                            เพิ่มโครงการวิจัย
                                        </a>

                                    </div>
                                @endif

                                <br>


                                <h2 class="boxHeadline"><i class="fa fa-building-o" aria-hidden="true"></i>
                                    โครงการวิจัย </h2>

                                @include('research.project.project-profile-list',['projects' => $projects,'task' => 'edit'])

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .i {
            margin-top: 35px;
        }

        #facebook, #line, #instagram {
            padding: 13px;
            font-size: 30px;
            width: 60px;
            text-align: center;
            text-decoration: none;
            border-radius: 50%;
        }

        #facebook {
            background: #3B5998;
            color: white;
        }

        #instagram {

            background: #125688;
            color: white;
        }

        #line {

            background: #00b489;
            color: white;
        }

        @media screen and  ( min-width: 1040px) {
            /*#user_image {*/
            /*width: 250px;*/
            /*height: 300px;*/
            /*}*/
        }

        .social-buttons {
            height: 80px;
            padding: 10px 30px;
            text-align: center;
        }

        .social-buttons .button-facebook, .button-instagram, .button-line {
            float: left;

            border-radius: 50%;
            width: 45px;
            height: 45px;
            margin-right: 30px;

        }

        .button-facebook {
            border: 2px solid #3b5998;
            background-color: #3b5998;
            color: white;
        }

        .button-line {
            border: 2px solid #00c300;
            background-color: #00c300;
            color: white;
        }

        .button-line i {

            font-size: 22px;
            line-height: 40px;
        }

        .button-instagram {
            border: 2px solid #fd1d1d;
            background-color: #fd1d1d;
            color: white;
        }

        .social-buttons .button-facebook i, .button-instagram i {
            font-size: 22px;
            line-height: 50px;
        }

        .userProfileInfo .image {
            position: relative
        }

        .userProfileInfo .image .editImage {
            position: absolute;
            bottom: -27px;
            right: 20px;
            background: #fe5621;
            color: #fff;
            text-align: center;
            font-size: 18px;
            font-size: 1.8rem;
            width: 54px;
            height: 54px;
            line-height: 54px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            -moz-background-clip: padding;
            -webkit-background-clip: padding-box;
            background-clip: padding-box
        }

        .userProfileInfo .image .editImage:hover {
            background: #fe693a
        }

        .userProfileInfo .box {
            font-size: 1.1em;
            padding: 0;
        }

        .userProfileInfo .box .info,
        .userProfileInfo .box .name,
        .userProfileInfo .box .socialIcons {
            padding: 15px 20px;
            border-bottom: 1px solid #e6e7ed
        }

        .userProfileInfo .box .socialIcons {
            border: 0
        }

        .userProfileInfo .box .info > span {
            margin: 10px 0;
            display: block;
            padding: 0 0 0 35px;
            position: relative
        }

        .userProfileInfo .box .info > span .fa {
            position: absolute;
            left: 5px;
            top: 4px;
            color: #9da2a6
        }

        .boxHeadline {
            margin: 0 0 25px 0;
            font-size: 18px;
            font-size: 1.8rem
        }

        .boxHeadline + .boxHeadlineSub {
            margin: -18px 0 30px 0
        }

        .boxHeader .boxTitle {
            margin: 22px 0 20px 30px
        }

        .boxHeader .boxHeaderOptions {
            margin: 9px 12px 0 0
        }

        .boxHeader .boxHeaderOptions .btn {
            color: #9da2a6;
            padding: 0;
            width: 40px;
            height: 40px;
            line-height: 42px;
            text-align: center;
            font-size: 24px;
            font-size: 2.4rem
        }

        .boxHeader .boxHeaderOptions .btn:active,
        .boxHeader .boxHeaderOptions .btn:focus,
        .boxHeader .boxHeaderOptions .btn:hover {
            background: #f2f9ff;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none
        }

        .boxHeader.pageBoxHeader .boxHeaderOptions {
            margin: 20px 12px 0 0
        }

        .boxHeader.boxHeaderBorders {
            border-bottom: 1px solid #e6e7ed
        }

        .boxHeader.box {
            padding: 30px
        }

        .boxHeader.box .pageTitle {
            margin: 0 0 6px 0
        }

        .boxHeader.box .pageTitle + .breadcrumb {
            margin: 0
        }

        .boxTitle {
            font-size: 26px;
            /*font-size: 2rem;*/
            font-weight: 700;
            text-transform: uppercase;
            margin: 0 0 25px 0
        }

        .boxHeadlineSub {
            font-size: 14px;
            font-size: 1.4rem;
            font-weight: 400;
            font-style: italic;
            color: #919599;
            margin: 0 0 25px 0;
            line-height: 18px
        }

        .boxHeadlineSub a {
            color: #fe5621
        }

        .bgTitle {
            background: url(../../img/bg-sharpen.jpg) no-repeat;
            background-size: 100% 100%
        }

        .bgTitle .boxTitle {
            margin: 0;
            padding: 22px 30px;
            color: #fff
        }

        .box {
            background: #fff;
            padding: 30px;
            margin: 0 0 24px 0
        }

        .box.box-without-padding {
            padding: 0
        }

        .box.box-without-sidepadding {
            padding: 8px 0
        }

        .box.box-without-sidepadding .boxTitle {
            margin-left: 30px
        }

        .box.box-without-bottom-padding {
            padding-bottom: 0
        }

        .box .tableWrap {
            margin: 0 -30px
        }

        .box .table-responsive {
            width: auto
        }

        .box .panel-group:last-of-type {
            margin-bottom: 0
        }

        .simpleListings {
            padding: 0;
            margin: 0
        }

        .simpleListings li {
            list-style-type: none;
            padding: 0 0 20px 0;
            margin: 20px 0 0 0;
            border-bottom: 1px solid #e6e7ed;
            position: relative
        }

        .simpleListings li:first-child {
            margin-top: 0
        }

        .simpleListings li:only-child {
            border-bottom: 0
        }

        .simpleListings li .title {
            font-size: 14px;
            font-size: 1.4rem;
            font-weight: 700;
            text-transform: uppercase;
            margin: 0 0 2px 0
        }

        .simpleListings li .title span {
            font-weight: 400;
            text-transform: none
        }

        .simpleListings li .title a:hover {
            color: #fe5621
        }

        .simpleListings li .info {
            color: #919599;
            font-style: italic
        }

        .simpleListings li p {
            margin: 7px 0 0 0
        }

        .simpleListings li img {
            margin: 20px 0
        }

        .userActivities {
            margin-bottom: 25px
        }

        .userActivities + .showMore {
            margin: 0 0 0 70px
        }

        .userActivities .i {
            margin-top: 25px;
            position: relative
        }

        .userActivities .i:first-child {
            margin-top: 0
        }

        .userActivities .i .image {
            position: absolute;
            top: 20px;
            left: 0
        }

        .userActivities .i .activityContent {
            margin: 0 0 0 70px;
            border: 1px solid #e6e7ed;
            min-height: 70px
        }

        .userActivities .i .activityContent:after,
        .userActivities .i .activityContent:before {
            content: '';
            left: 48px;
            top: 40px;
            border: solid transparent;
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none
        }

        .userActivities .i .activityContent:after {
            border-right-color: #fff;
            border-width: 12px;
            margin-top: -12px
        }

        .userActivities .i .activityContent:before {
            border-right-color: #dcdcdc;
            border-width: 11px;
            margin-top: -11px
        }

        .userActivities ul {
            padding: 20px 25px
        }

        .userActivities ul li .title {
            font-size: 16px;
            font-size: 1.6rem;
            text-transform: none
        }

        .userActivities .status li {
            padding-bottom: 0
        }

        .userActivities .status li .share {
            margin: 20px 0 0 0
        }

        .userActivities .status li .share a {
            color: #fe5621;
            display: inline-block;
            margin: 0 0 0 20px
        }

        .userActivities .status li .share a:first-child {
            margin: 0
        }

        .userActivities .status li .share a .fa {
            color: #9da2a6;
            margin: 0 3px 0 0;
            -webkit-transition: color .3s ease;
            -moz-transition: color .3s ease;
            -ms-transition: color .3s ease;
            -o-transition: color .3s ease
        }

        .userActivities .status li .share a:hover .fa {
            color: #fe5621
        }

        .userActivities .comments {
            background: #f5f6fa;
            border-top: 1px solid #e6e7ed
        }

        .userActivities .comments li:last-child {
            border-bottom: 0;
            padding-bottom: 0
        }

        .userActivities .comments li .image {
            position: absolute;
            left: 0;
            top: 0
        }

        .userActivities .comments li .image img {
            margin: 0
        }

        .userActivities .comments li .c {
            margin: 0 0 0 70px
        }

        .userActivities .comments li .c .form-control {
            border-left: 1px solid #e6e7ed;
            padding: 10px 18px;
            margin: 0 0 10px 0
        }

        .userActivities .comments li .c .form-control:focus {
            border-color: #e6e7ed
        }

        .userActivities .comments li.showComments {
            border-bottom: 0;
            padding: 0;
            margin: 0 0 15px 0
        }

        .userActivities .comments li.showComments .fa {
            color: #9da2a6;
            margin: 0 3px 0 0
        }

        .userActivities .comments li.showComments a:hover {
            color: #fe5621
        }

        @media (min-width: 992px) {
            .userProfileInfo .image img {
                width: 100%;
            }
        }
    </style>

    <script>
        $(function () {
            $('#birthdate-picker').pickadate({
                today: '',
                labelMonthNext: 'กดเพื่อไปยังเดือนถัดไป',
                labelMonthPrev: 'กดเพื่อย้อนไปยังเดือนก่อนหน้านี้',
                labelMonthSelect: 'กดเพื่อเลือกเดือน',
                labelYearSelect: 'กดเพื่อเลือกปี',
                selectMonths: true,
                selectYears: 120,
                format: ' dddd, dd mmm, yyyy',
                formatSubmit: 'yyyy-mm-dd',
                hiddenPrefix: 'date_',
            })

            $('[data-toggle="tooltip"]').tooltip();
        })
    </script>
@endsection