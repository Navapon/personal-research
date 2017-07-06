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
            <tr>
                <th>เคมี</th>
                <td>700000</td>
                <td>1</td>
            </tr>
            <tr>
                <th>วิทยาการคอมพิวเเตอร์</th>
                <td>850000</td>
                <td>3</td>
            </tr>
            <tr>
                <th>เทคโนโลยีและการจัดการความปลอดภัยของอาหาร</th>
                <td>100000</td>
                <td>5</td>
            </tr>
            <tr>
                <th>ออกแบบผลิตภัณฑ์อุตสาหกรรม</th>
                <td>200000</td>
                <td>6</td>
            </tr>
            <tr>
                <th>เทคโนโลยีการถ่ายภาพและภาพยนตร์</th>
                <td>300000</td>
                <td>5</td>
            </tr>
            <tr>
                <th>เทคโนโลยีการพิมพ์</th>
                <td>600000</td>
                <td>1</td>
            </tr>
            <tr>
                <th>เทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง</th>
                <td>400000</td>
                <td>1</td>
            </tr>
            <tr>
                <th>เทคโนโลยีเครื่องเรือนและการออกแบบ</th>
                <td>200000</td>
                <td>1</td>
            </tr>
            <tr>
                <th>ชีววิทยา</th>
                <td>300000</td>
                <td>1</td>
            </tr>
            <tr>
                <th>ฟิสิกส์</th>
                <td>450000</td>
                <td>1</td>
            </tr>
            <tr>
                <th>คณิตศาสตร์</th>
                <td>600000</td>
                <td>1</td>
            </tr>
            </tbody>
        </table>

        <div id="compare-chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <table id="compare-table" class="table table-border">
            <thead>
            <tr>
                <th>ปีงบประมาณ</th>
                <th>จำนวนเงิน</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>2558</td>
                <td>3000000</td>
            </tr>
            <tr>
                <td>2559</td>
                <td>4000000</td>
            </tr>
            <tr>
                <td>2560</td>
                <td>3600000</td>
            </tr>
            <tr>
                <td>2561</td>
                <td>6000000</td>
            </tr>
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
