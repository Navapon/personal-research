<div class="table-responsive" >
    <table class="table table-bordered" id="conference-table">
        <thead>
        <tr class="warning">
            <th>ลำดับ</th>
            <th>ชื่อบทความ</th>
            <th>ผู้เขียนบทความ</th>
            <th>ชื่อการประชุม</th>
            <th>การนำเสนอ</th>
            <th></th>

        </tr>
        </thead>
        <tbody>
        @foreach($conferences as $key => $conference)
            <tr>
                <td style="text-align: center">{{ $loop->iteration }}</td>
                <td>{{ $conference->conference->rc_article_name }}</td>
                <td>{{ $conference->conference->user->user->academic->academic_name }} {{ $conference->conference->user->user->u_name_th }} {{ $conference->conference->user->user->u_surname_th }}</td>
                <td>{{ $conference->conference->rc_meeting_name }}</td>
                <td>{{ $conference->conference->proseedingType->rpt_name }} ( {{ $conference->conference->presentType->rsp_name }} )</td>
                <td style="text-align: center"><a href="{{ route('conference.show',$conference->conference->rc_id) }}"><i
                                class="fa fa-search fa-2x" title="ดูรายละเอียด"></i></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<style>
    #conference-table th {
        text-align: center;
    }

    #conference-table tr td:nth-child(1) {
        width: 5%;
    }

    #conference-table tr td:nth-child(2) {
        width: 45%;
    }

    #conference-table tr td:nth-child(3) {
        width: 10%;
    }

    #conference-table tr td:nth-child(4) {
        width: 20%;
    }

    #conference-table tr td:nth-child(5) {
        width: 10%;
    }

    #conference-table tr td:nth-child(6) {
        width: 5%;
    }
</style>

<script type="text/javascript">
    $(function () {
        $('#conference-table').DataTable({});
    });
</script>
