@extends('template.landing-template')

@section('page-header')

    @include('components.page-header',[
        'header' =>   'รายงานด้านโครงการวิจัย'
    ])

@endsection

@section('content')

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <div class="col-xs-12 col-md-12">
        <div id="project-chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <table id="project-table" class="table table-border">
            <thead>
            <tr>
                <th>สาขา</th>
                <th>จำนวนเงิน</th>
                <th>จำนวนโครงการ</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->major_name }}</td>
                    <td>{{ $project->project_amount }}</td>
                    <td>{{ $project->project_number }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div id="compare-chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <table id="compare-table" class="table table-border">
            <thead>
            <tr>
                <th>ปีงบประมาณ</th>
                <th>จำนวนเงิน</th>
                <th>จำนวนโครงการ</th>
            </tr>
            </thead>
            <tbody>
            @if(!empty($static))
                @foreach($static as $item)
                    <tr>
                        <td>{{ $item->rp_year }}</td>
                        <td>{{ $item->project_amount }}</td>
                        <td>{{ $item->project_number }}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

    <script>
        $(function () {
            Highcharts.chart('project-chart', {
                data: {
                    table: 'project-table'
                },
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'ข้อมูลโครงการวิจัยประจำปี 2560'
                },
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'จำนวนเงิน'
                    }
                },
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.series.name + '</b><br/>' +
                            this.point.y + ' ' + this.point.name.toLowerCase();
                    }
                }
            });

            Highcharts.chart('compare-chart', {
                data: {
                    table: 'compare-table'
                },
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'เปรียบเทียบเงินงบประมาณที่ได้รับ'
                },
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'Units'
                    }
                },
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.series.name + '</b><br/>' +
                            this.point.y + ' ' + this.point.name.toLowerCase();
                    }
                }
            });


        })
    </script>

@endsection
