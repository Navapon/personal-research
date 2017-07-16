@extends('template.landing-template')

@section('page-header')

    @include('components.page-header', [
    'header' => 'เครื่องมือสำหรับงานวิจัย',
    'sub_header' => 'ของคณะวิทยาศาสตร์และเทคโนโลยี'
    ] )

@endsection

@section('content')

    @include('sweet::alert')
    <div class="row">
        <div class="col-lg-12">
            @if( !empty(Auth::id()) )
                @if( Auth::user()->u_role_id == 1 )
                    <div class="btn-group form-group">

                        <a href="{{ route('equipment.create') }}"
                           class="btn btn-default">
                            <i class="fa fa-plus-circle"></i>
                            เพิ่มเครื่องมือวิจัย
                        </a>

                        {{--  <a href="{{ route('research.create',['type' => 'conference']) }}"
                             class="btn btn-default">
                              <i class="fa fa-plus-circle"></i>
                              เพิ่มบทความ ( Conference )
                          </a>--}}

                    </div>
                @endif
            @endif
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    {{--<div class="table-responsive">--}}
                    <div class="table-responsive">
                        <table class="table  user-list" id="equipment-table">
                            <thead>
                            <tr class="warning">
                                <th style="width: 5%"><span>ลำดับ</span></th>
                                <th style="width: 10%"><span></span></th>
                                <th style="width: 45%"><span>ชื่อเครื่องมือวิจัย</span></th>
                                <th style="width: 15%"><span>ผู้ดูแล</span></th>
                                <th style="width: 15%"><span>สถานะ</span></th>
                                <th style="width: 10%"><span></span></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($equipments as $equipment)
                                <tr>
                                    <td style="text-align: center">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>

                                        <img class="myImg" id="{{ $equipment->re_image}}"
                                             src="{{ $equipment->re_image ? asset('files/equipment/').'/' .$equipment->re_image :'/images/noimage.png' }}"

                                        >
                                    </td>

                                    <td>
                                        {{ $equipment->re_name or ' - '}}
                                    </td>

                                    <td>
                                        {{ $equipment->major->major_name or 'ไม่ระบุ' }}
                                    </td>
                                    <td>
                                        {{ $equipment->status->re_status_name or 'ไม่ระบุ' }}
                                    </td>

                                    <td style="">
                                        <a href="{{ route('equipment.show',['id'=> $equipment->re_id ]) }}"
                                           class="table-link" title="คลิกเพื่อดูรายละเอียด">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                        @if( !empty(Auth::id()) )
                                            @if( Auth::user()->u_role_id == 1 )

                                                <a href="{{ route('equipment.edit',['id'=> $equipment->re_id ]) }}"
                                                   class="table-link" title="คลิกเพื่อแก้ไข">
                                                    <span class="fa-stack" style="color: #00c300">
                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                        <i class="fa fa-edit fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                </a>

                                                <form id="re_delete{{$equipment->re_id}}"
                                                      action="{{ route('equipment.destroy',$equipment->re_id) }}"
                                                      method="post" class="fa-stack">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <span class="fa-stack" id="del-btn"
                                                          onclick="equipmentconfirm({{ $equipment->re_id }})"
                                                          title="คลิกเพื่อลบ" style="color: red">
                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                        <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                    </span>

                                                </form>

                                            @endif
                                        @endif
                                    </td>


                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <style>

        #del-btn{
            cursor: pointer;
        }
        .table a.table-link.danger {
            color: #e74c3c;
        }

        .label {
            border-radius: 3px;
            font-size: 0.875em;
            font-weight: 600;
        }

        .user-list tbody td .user-subhead {
            font-size: 0.875em;
            font-style: italic;
        }

        .user-list tbody td .user-link {
            display: block;
            font-size: 1.25em;
            padding-top: 3px;
            margin-left: 60px;
        }

        a {
            color: #3498db;
            outline: none !important;
        }

        .user-list tbody td > img {
            position: relative;
            max-width: 50px;
            float: left;
            margin-right: 15px;
        }

        .table thead tr th {
            text-transform: uppercase;
            font-size: 0.875em;
        }

        .table thead tr th {
            border-bottom: 2px solid #e7ebee;
        }

        .table tbody tr td:first-child {
            font-size: 1.125em;
            font-weight: 300;
        }

        .table tbody tr td {
            font-size: 0.875em;
            vertical-align: middle;
            border-top: 1px solid #e7ebee;
            padding: 12px 8px;
        }

    </style>


    <script type="text/javascript">
        $(function () {
            $('#equipment-table').DataTable({});


        });

        function equipmentconfirm(id) {


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

                $('form#re_delete' + id).submit()
            })


        }
    </script>
@endsection