<div class="form-group">

    <div class="col-md-6 col-md-pull-2">
    </div>

    <div class="col-md-6 col-md-pull-1">
        <ul class="list-inline pull-right">

            <li>
                <button type="button" class="btn btn-success next-step" id="add-team">
                    <i class="fa fa-plus-circle"></i> เพิ่มผู้ร่วมวิจัย
                </button>
            </li>

        </ul>
    </div>

</div>
<!-- Text input-->


@if($type != 'edit')

    @if(!old('rt_name') )
        <div class="form-group">
            <label class="col-md-offset-1 col-md-2 control-label" for="textinput">
                ชื่อผู้ร่วมวิจัย</label>
            <div class="col-md-8">
                <input id="" name="rt_name[]" type="text"
                       value="{{ $user->u_name_th .' ' . $user->u_surname_th  }}"

                       placeholder="กรุณาระบุจำนวนผู้ร่วมวิจัย"
                       class="form-control input-md">
                <span class="help-block">หากต้องการเพิ่มจำนวนผู้ร่วมวิจัย กดปุ่ม เพิ่มผู้ร่วมวิจัย ด้านขวามือ</span>
            </div>

        </div>

    @else

        @foreach(old('rt_name') as $key => $team)
            <div class="row" id="team-list{{$key}}">
                <label class="col-md-offset-1 col-md-2 control-label" for="textinput">
                    ชื่อผู้ร่วมวิจัย </label>
                <div class="col-md-7">
                    <input type="hidden" name="rt_id[]">
                    <input id="" name="rt_name[]" type="text"
                           value="{{ $team }}"

                           placeholder="กรุณาระบุจำนวนผู้ร่วมวิจัย"
                           class="form-control input-md">
                    <span class="help-block">หากต้องการเพิ่มจำนวนผู้ร่วมวิจัย กดปุ่ม เพิ่มผู้ร่วมวิจัย ด้านขวามือ</span>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-danger" type="button" onclick="deleteRow( {{$key}} )">
                        <i class="fa fa-trash"></i>
                        Delete
                    </button>
                </div>
            </div>

        @endforeach

    @endif

    @endIf

    @if(!empty($obj->team))
        @foreach($obj->team as $key => $team)
            <div class="row" id="team-list{{$key}}">
                <label class="col-md-offset-1 col-md-2 control-label" for="textinput">
                    ชื่อผู้ร่วมวิจัย </label>
                <div class="col-md-7">
                    <input type="hidden" name="rt_id[]">
                    <input id="" name="rt_name[]" type="text"
                           value="{{ $team->rt_name }}"

                           placeholder="กรุณาระบุจำนวนผู้ร่วมวิจัย"
                           class="form-control input-md">
                    <span class="help-block">หากต้องการเพิ่มจำนวนผู้ร่วมวิจัย กดปุ่ม เพิ่มผู้ร่วมวิจัย ด้านขวามือ</span>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-danger" type="button" onclick="deleteRow( {{$key}} )">
                        <i class="fa fa-trash"></i>
                        Delete
                    </button>
                </div>
            </div>
        @endforeach
        @endIf

        <div class="team-list">

        </div>



        <script>

            $(function () {
                var number = 50;
                $('#add-team').on('click', function () {

                    var team = '';
                    team += ' <div id="team-list' + number + '">'
                    team += ' <div class="form-group" >'
                    team += '       <label class="col-md-offset-1 col-md-2 control-label" for="textinput"> ชื่อนามสกุล </label>';
                    team += '       <div class="col-md-7">';
                    team += '           <input id="" name="rt_name[]" type="text" value="" class="form-control input-md"  placeholder="กรุณากรอกชื่อนามสกุล" >';
                    team += '              <span class="help-block">ระบุ ชื่อ นามสกุล</span>';
                    team += '       </div>';
                    team += '       <div class="col-md-2">';
                    team += '           <button class="btn btn-danger" onclick="deleteRow(' + number + ')"><i class="fa fa-trash"></i> Delete</button>';
                    team += '       </div>';
                    team += ' </div>';
                    team += ' </div>';

                    number++;
                    $('.team-list').append(team);

                })


                $('[data-toggle="tooltip"]').tooltip();
            });

            function deleteRow(id) {
                $('#team-list' + id).remove()
            }


        </script>