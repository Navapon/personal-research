<ul class="simpleListings">
    @if ( count($patents) > 0  )


        @foreach($patents as $patent)
            <li>
                <a href="{{ route('patent.show',$patent->patent->pt_id) }}">
                    <div class="title">{{ $patent->patent->pt_name or ' - '}}
                    </div>
                </a>
                <div class="info">
                    เลขที่ : {{ $patent->patent->pt_number or ' - '}}<br>
                    ประเภท :{{ $patent->patent->type->ptt_name or ' - '}} <br>
                    ระดับ :{{ $patent->patent->publishlevel->rl_name or ' - '}} <br>
                    วันที่ออก : {{ \Carbon\Carbon::createFromFormat('Y-m-d',$patent->patent->pt_accept)->addYears(543)->toFormattedDateString() or ' - '}}


                    <div class="row">
                        @if($task == 'edit')
                            <div class="pull-right ">
                                <form id="pt_delete{{$patent->patent->pt_id}}"
                                      action="{{ route('patent.destroy',$patent->patent->pt_id) }}"
                                      method="post">
                                    <a href="{{ route('patent.edit',$patent->patent->pt_id) }}"
                                       class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>

                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger pull-right"    id="del-btn" onclick="patentconfirm('{{ $patent->patent->pt_id }}')"
                                            style="margin-left: 5px" type="button"><i
                                             class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        @endif

                        <div class="pull-right " style="margin-right: 5px">
                            <a href="{{ route('patent.show',$patent->patent->pt_id) }}"
                               class="btn btn-info"><i class="fa fa-file-archive-o"></i> View </a>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    @else

        <div class="alert alert-info" role="alert">ไม่มีข้อมูลสิทธิบัตร </div>

    @endif


    <script>

        $(function(){

        })

        function patentconfirm(id) {
            
                swal({
                    title: 'ท่านแน่ใจว่าต้องการ ลบ ?' ,
                    text: "",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ใช่ ฉันแน่ใจ',
                    cancelButtonText: 'ขอฉันคิดดูอีกที'
                }).then(function () {

                    $('form#pt_delete'+id).submit()
                })
        }

    </script>
</ul>