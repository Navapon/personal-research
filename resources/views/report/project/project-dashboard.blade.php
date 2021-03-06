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
    <script src="https://code.highcharts.com/modules/no-data-to-display.js"></script>

    <div class="col-sm-12 col-xs-12 col-md-12">
        <div style="float: right">
            <i class="fa fa-eye"> {{ Counter::showAndCount('report-project') }}</i>
        </div>

        <form action="{{ route('report-project') }}" method="get">

            <div class="row well">
                <div class="col-md-offset-2 col-md-4">
                    <label for="">แหล่งทุน</label>
                    <select name="fund" id="fund" class="form-control">
                        <option value="" selected>แหล่งทุนทั้งหมด</option>
                        <option value="in" {{ app('request')->input('fund') == 'in' ? 'selected':'' }}>แหล่งทุนภายใน
                        </option>
                        <option value="out" {{ app('request')->input('fund') == 'out' ? 'selected':'' }}>
                            แหล่งทุนภายนอก
                        </option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="">ปี</label>
                    <select name="year" id="year" class="form-control">
                        <option value="" selected>ทุกปี</option>
                        @foreach($year as $item)
                            <option value="{{$item->rp_year }}"
                                    {{ app('request')->input('year') == $item->rp_year ? 'selected':'' }}
                            >{{ $item->rp_year }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-1 col-sm-12 col-xs-12">
                    <label for="">ค้นหา</label>
                    <button class="btn btn-primary" style="width : 100%" type="submit"><i class="fa fa-search-plus"></i>
                    </button>
                </div>
            </div>
        </form>
        <div id="project-chart" style=" margin: 0 auto"></div>
        <table id="project-table" class="table table-border">
            <thead>
            <tr class="info">
                <th>สาขา</th>
                <th>จำนวนเงิน</th>
                <th>จำนวนโครงการ</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->major_name }}</td>
                    <td style="text-align: right">{{ $project->project_amount }}</td>
                    <td style="text-align: center;">{{ $project->project_number }}</td>
                    {{--<td style="text-align: center">--}}
                        {{--<button class="btn btn-success" onclick="swal('Coming Soon ...','','info')"><i--}}
                                    {{--class="fa fa-file"></i> รายละเอียด--}}
                        {{--</button>--}}
                    {{--</td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>

        <div id="compare-chart" style="margin: 0 auto"></div>
        <table id="compare-table" class="table table-border">
            <thead>
            <tr class="info">
                <th>ปีงบประมาณ</th>
                <th>จำนวนเงิน</th>
                <th>จำนวนโครงการ</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(!empty($static))
                @foreach($static as $item)
                    <tr>
                        <td style="text-align: center">{{ $item->rp_year }}</td>
                        <td style="text-align: right">{{ $item->project_amount }}</td>
                        <td style="text-align: center">{{ $item->project_number }}</td>
                        {{--<td style="text-align: center">--}}
                            {{--<button class="btn btn-success" onclick="swal('Coming Soon ...','','info')"><i--}}
                                        {{--class="fa fa-file"></i> รายละเอียด--}}
                            {{--</button>--}}
                        {{--</td>--}}
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

    <style>
        th {
            text-align: center;
        }
    </style>
    <script>
        $(function () {
            Highcharts.chart('project-chart', {
                lang: {
                    thousandsSep: ','
                },
                data: {
                    table: 'project-table',
                    startColumn: 0,
                    endColumn: 1
                },
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'ข้อมูลจำนวนเงินทุนโครงการวิจัย'
                },
                yAxis: {
                    allowDecimals: true,
                    title: {
                        text: 'จำนวนเงิน'
                    }
                },
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.series.name + '</b><br/>' +
                            Highcharts.numberFormat(this.point.y, 2, '.', ',') + ' ' + this.point.name.toLowerCase();
                    }
                }
            });

            Highcharts.chart('compare-chart', {
                lang: {
                    thousandsSep: ','
                },
                data: {
                    table: 'compare-table',
                    startColumn: 0,
                    endColumn: 1
                },
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'เปรียบเทียบจำนวนเงินทุนแต่ละปี'
                },
                yAxis: {
                    allowDecimals: true,
                    title: {
                        text: 'จำนวนเงิน'
                    }
                },
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.series.name + '</b><br/>' +
                            Highcharts.numberFormat(this.point.y, 2, '.', ',') + ' ' + this.point.name.toLowerCase();
                    }
                }
            });


        })
    </script>

@endsection
