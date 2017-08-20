<ul class="simpleListings">
    @if ( count($journals) > 0  )


        @foreach($journals as $journal)
            <li>
                <a href="{{ route('journal.show',$journal->rj_id) }}">
                    <div class="title">{{ $journal->journal->rj_article_name }}
                        <span> เผยแพร่ {{ \Carbon\Carbon::createFromFormat('Y-m-d',$journal->journal->rj_publish_date )->addYears(543)->toFormattedDateString() }}</span>
                    </div>
                </a>
                <div class="info">
                    {{ $journal->journal->rj_name }}
                    <a href="{{ $journal->journal->rj_source_url }}" title="คลิกเพื่อไปยังฐานข้อมูล Journal" target="_blank"
                       class="text-orange">{{ $journal->journal->rj_name }}</a>
                    <br>
                    <i class="fa fa-eye"> {{ Counter::show('journal',$journal->journal->rj_id) }}</i>


                    <div class="row">
                        @if($task == 'edit')
                            <div class="pull-right ">
                                <form id="rj_delete{{$journal->journal->rj_id}}"
                                      action="{{ route('journal.destroy',$journal->journal->rj_id) }}"
                                      method="post">


                                    <a href="{{ route('journal.edit',$journal->journal->rj_id) }}"
                                       class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>

                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button onclick="journalconfirm({{$journal->journal->rj_id}})"
                                            class="btn btn-danger pull-right"
                                            style="margin-left: 5px" type="button"><i
                                                id="del-btn" class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        @endif
                        <div class="pull-right " style="margin-right: 5px">
                            <a href="{{ route('journal.show',$journal->journal->rj_id) }}"
                               class="btn btn-info"><i class="fa fa-file-archive-o"></i> View </a>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    @else

        <div class="alert alert-info" role="alert">ไม่มีข้อมูลวารสารวิชาการ</div>

    @endif


    <script>

        function journalconfirm(id) {

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

                $('form#rj_delete'+id).submit();

            })
        }

    </script>
</ul>