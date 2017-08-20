<ul class="simpleListings">
    @if ( count($conferences) > 0  )


        @foreach($conferences as $conference)
            <li>
                <a href="{{ route('conference.show',$conference->rc_id) }}">
                    <div class="title">{{ $conference->conference->rc_article_name }}
                        <span>
                            ปีที่ {{ $conference->conference->rc_volume }}
                            ฉบับที่ {{ $conference->conference->rc_issue or '-' }}
                        </span>
                    </div>
                </a>
                <div class="info">
                    ชื่อการประชุม : {{ $conference->conference->rc_meeting_name }} <br>
                    ผู้จัด : {{ $conference->conference->rc_meeting_name }} <br>
                    วันที่ : {{ \Carbon\Carbon::createFromFormat('Y-m-d',$conference->conference->rc_meeting_start)->addYears(543)->toFormattedDateString() }}
                    ถึง {{ \Carbon\Carbon::createFromFormat('Y-m-d',$conference->conference->rc_meeting_end)->addYears(543)->toFormattedDateString() }}<br>
                    <i class="fa fa-eye"> {{ Counter::show('conference',$conference->conference->rc_id) }}</i>
                    <div class="row">
                        @if($task == 'edit')
                            <div class="pull-right ">
                                <form id="rc_delete{{$conference->conference->rc_id}}"
                                      action="{{ route('conference.destroy',$conference->conference->rc_id) }}"
                                      method="post">
                                    <a href="{{ route('conference.edit',$conference->conference->rc_id) }}"
                                       class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>

                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger pull-right"    id="del-btn" onclick="conferenceconfirm({{ $conference->conference->rc_id }})"
                                            style="margin-left: 5px" type="button"><i
                                             class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        @endif

                        <div class="pull-right " style="margin-right: 5px">
                            <a href="{{ route('conference.show',$conference->conference->rc_id) }}"
                               class="btn btn-info"><i class="fa fa-file-archive-o"></i> View </a>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    @else

        <div class="alert alert-info" role="alert">ไม่มีข้อมูลการประชุมบทความวิชาการ</div>

    @endif


    <script>

        $(function(){

        })

        function conferenceconfirm(id) {

                swal({
                    title: 'ท่านแน่ใจว่าต้องการ ลบ ?',
                    text: "",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ใช่ ฉันแน่ใจ',
                    cancelButtonText: 'ขอฉันคิดดูอีกที'
                }).then(function () {

                    $('form#rc_delete'+id).submit()
                })


        }

    </script>
</ul>