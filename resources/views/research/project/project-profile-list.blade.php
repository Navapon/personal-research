<div class="table-responsive">
    <div class="col-md-12 col-lg-12 col-xs-12">
        <table class="table table-border table-responsive" id="project-list" width="100%">
            <thead>
            <tr class="success">
                <th>ลำดับ</th>
                <th>ชื่อโครงการ</th>
                <th>ผู้เขียน</th>
                <th>สถานะ</th>
                <th>แหล่งทุน</th>
                <th>ปี</th>
                <th></th>
                @if($task == 'edit')
                    <th></th>
                    <th></th>
                @endif
            </tr>
            </thead>
            <tbody>

            @if(!empty($projects))
                @foreach($projects as $project)

                    <tr>
                        <td>{{ $loop->iteration  }}</td>
                        <td>{{ $project->project->rp_name }}</td>

                        <td>{{ $project->project->user->user->academic->academic_name }} {{ $project->project->user->user->u_name_th }} {{ $project->project->user->user->u_surname_th }}</td>
                        <td>{{ $project->project->status->rst_name }}</td>
                        <td>{{ $project->project->fund->fund_name}}</td>
                        <td>{{ $project->project->rp_year}}</td>
                        <td><a href="{{ route('project.show',$project->project->rp_id) }}" title="ดูข้อมูลโครงการ"><i
                                        class="fa fa-search fa-2x "></i></a></td>
                        @if($task == 'edit')
                            <td><a href="{{ route('project.edit',$project->project->rp_id) }}"
                                   title="แก้ไขข้อมูลโครงการ"><i
                                            class="fa fa-edit fa-2x  "></i></a></td>
                            <td>
                                <form id="rp_delete{{$project->project->rp_id}}"
                                      action="{{ route('project.destroy',$project->project->rp_id) }}"
                                      method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}

                                    <i id="del-btn" onclick="formconfirm({{ $project->project->rp_id }})"
                                       class="fa fa-trash fa-2x bin" title="แก้ไขข้อมูลโครงการ"></i>

                                </form>
                            </td>
                        @endif


                    </tr>

                @endforeach
            @endif
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
</div>

<style>
    .bin {
        color: red;
        cursor: pointer;
    }

    #project-list th {
        text-align: center;
    }

    #project-list tr td:nth-child(1) {
        width: 5%;
        text-align: center;
    }

    #project-list tr td:nth-child(2) {
        width: 45%;
        text-align: left;
    }

    #project-list tr td:nth-child(3) {
        width: 15%;
        text-align: left;
    }

    #project-list tr td:nth-child(4) {
        width: 10%;
        text-align: left;
    }

    #project-list tr td:nth-child(5) {
        width: 10%;
        text-align: center;
    }

    #project-list tr td:nth-child(6) {
        width: 5%;
        text-align: center;
    }

    #project-list tr td:nth-child(7) {
        width: 5%;
        text-align: center;
    }

    #project-list tr td:nth-child(8) {
        width: 5%;
        text-align: center;
    }
</style>

<script>

    $(function () {
        $('#project-list').DataTable({
            responsive: true
        });
    })

    function formconfirm(id) {


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

            $('form#rp_delete' + id).submit()
        })


    }

</script>
