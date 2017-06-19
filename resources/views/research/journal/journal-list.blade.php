<table class="table table-bordered" id="users-table">
    <thead>
    <tr>
        <th>ลำดับ</th>
        <th>ชื่อบทความ</th>
        <th></th>

    </tr>
    </thead>
    <tbody>
    @foreach($journals as $key => $journal)
        <tr>
            <td style="text-align: center">{{ $loop->iteration }}</td>
            <td>{{ $journal->rj_article_name }}</td>
            <td style="text-align: center"><a href="{{ route('journal.show',$journal->rj_id) }}"><i class="fa fa-search fa-2x"></i></a> </td>
        </tr>
    @endforeach
    </tbody>
</table>


<script type="text/javascript">
    $(function () {
        $('#users-table').DataTable({});
    });
</script>
