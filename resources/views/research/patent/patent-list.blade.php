<div class="table-responsive" >
    <table class="table table-bordered" id="patent-table">
        <thead>
        <tr class="warning">
            <th>ลำดับ</th>
            <th>ชื่อผลงาน</th>
            <th>เจ้าของผลงาน</th>
            <th>เลขที่สิทธิบัตร</th>
            <th>ระดับ</th>
            <th></th>

        </tr>
        </thead>
        <tbody>
        @foreach($patents as $key => $patent)
            <tr>
                <td style="text-align: center">{{ $loop->iteration }}</td>
                <td>{{ $patent->patent->pt_name }}</td>
                <td>{{ $patent->patent->user->user->academic->academic_name or ''}} {{ $patent->patent->user->user->u_name_th }} {{ $patent->patent->user->user->u_surname_th }}</td>
                <td>{{ $patent->patent->pt_number }}</td> }} )
                <td>{{ $patent->patent->publishlevel->rl_name }} </td>
                <td style="text-align: center"><a href="{{ route('patent.show',$patent->patent->pt_id) }}"><i
                                class="fa fa-search fa-2x" title="ดูรายละเอียด"></i></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<style>
    #patent-table th {
        text-align: center;
    }

    #patent-table tr td:nth-child(1) {
        width: 5%;
    }

    #patent-table tr td:nth-child(2) {
        width: 55%;
    }

    #patent-table tr td:nth-child(3) {
        width: 10%;
    }

    #patent-table tr td:nth-child(4) {
        width: 10%;
    }

    #patent-table tr td:nth-child(5) {
        width: 10%;
    }

    #patent-table tr td:nth-child(6) {
        width: 5%;
    }
</style>

<script type="text/javascript">
    $(function () {
        $('#patent-table').DataTable({});
    });
</script>
