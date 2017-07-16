@extends('template.landing-template')

@section('page-header')

    @include('components.page-header',[
        'header' => 'รายชื่อนักวิจัย'
    ])

@endsection

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    {{--<div class="table-responsive">--}}
                    <div class="table-responsive">
                        <table class="table  user-list" id="users-list">
                            <thead>
                            <tr class="warning">
                                <th><span>User</span></th>
                                <th><span>Email</span></th>
                                <th><span>Major</span></th>
                                <th><span></span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <img src="{{ $user->u_image ? asset('images/user-image/').'/' .$user->u_image: '/images/user-img.png' }}" alt="{{ $user->u_name_th . ' ' . $user->u_surname_th }}" >
                                    <a href="{{ route('profile.show',['id'=> $user->u_id ]) }}" class="user-link">{{ $user->u_name_th . ' ' . $user->u_surname_th }}</a>
                                    <span class="user-subhead">นักวิจัย</span>
                                </td>

                                <td>
                                    <a href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to={{$user->u_email}}&tf=1" target="_blank">
                                        {{ $user->u_email or ' - '}}
                                    </a>
                                </td>

                                <td>
                                    {{ $user->major->major_name or ' - ' }}
                                </td>

                                <td style="width: 20%;">
                                    <a href="{{ route('profile.show',['id'=> $user->u_id ]) }}" class="table-link">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                            </span>
                                    </a>
                           {{--         <a href="#" class="table-link">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                                    </a>
                                    <a href="#" class="table-link danger">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                            </span>
                                    </a>--}}
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


    <script>
        $(function () {
            $('#users-list').DataTable({
                responsive: true
            });
        })
    </script>

    <style>

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
@endsection
