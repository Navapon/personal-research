<div class="table-responsive">
    <table class="table table-bordered " id="journal-table">
        <thead>
        <tr class="info">
            <th>ลำดับ</th>
            <th>ชื่อบทความ</th>
            <th>ผู้เขียน</th>
            <th>ผลงานระดับ</th>
            <th>เอกสาร</th>
            <th></th>


        </tr>
        </thead>
        <tbody>
        @foreach($journals as $key => $journal)
            <tr>
                <td style="text-align: center">{{ $loop->iteration }}</td>
                <td>{{ $journal->journal->rj_article_name }}</td>
                <td>{{ $journal->journal->user->user->academic->academic_name or ''}} {{ $journal->journal->user->user->u_name_th }} {{ $journal->journal->user->user->u_surname_th }}</td>
                <td>{{ $journal->journal->publishlevel->rl_name }}</td>
                <td style="text-align: center"><a
                            href="{{ asset('files').'/users/'. $journal->journal->user->user->u_id . '/journal/'.$journal->journal->rj_file}}"
                            target="_blank"><i class="fa fa-file-archive-o fa-2x" title="เอกสารวิชาการ"></i></a></td>
                <td style="text-align: center"><a href="{{ route('journal.show',$journal->journal->rj_id) }}"><i
                                class="fa fa-search fa-2x"></i></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<style>
    #journal-table th {
        text-align: center;
    }

    #journal-table tr td:nth-child(1) {
        width: 5%;
    }

    #journal-table tr td:nth-child(2) {
        width: 45%;
    }

    #journal-table tr td:nth-child(3) {
        width: 15%;
    }

    #journal-table tr td:nth-child(4) {
        width: 10%;
    }

    #journal-table tr td:nth-child(5) {
        width: 5%;
    }

    #journal-table tr td:nth-child(6) {
        width: 5%;
    }

</style>

<script type="text/javascript">
    $(function () {
        $('#journal-table').DataTable({});
    });
</script>

