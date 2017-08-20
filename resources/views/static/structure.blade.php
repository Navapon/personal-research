@extends('template.landing-template')

@section('meta_tag')

    <meta name="description" content="รายงานวิจัยคณะวิทยาศาสตร์,สถิติงานวิจัยคณะวิทยาศาสตร์">

@endsection

@section('page-header')

    @include('components.page-header',[
        'header' =>   'ติดต่อเรา'
    ])

@endsection

@section('content')

<div class="row">
    <div class="col-md-offset-4 col-md-4 col-md-offset-4 ">

        <div class="thumbnail">
            <a href="#">
                <img class="img-responsive"  style="width: 100%;height: 350px"
                     src="{{ $users1[0]->u_image ? asset('images/user-image/').'/' .$users1[0]->u_image: '/images/user-img.png' }}" alt="">
            </a>
            <div class="caption text-center">
                <a href="/profile/{{ $users1[0]->u_id }}">
                    <h4>

                        {{ $users1[0]->academic->academic_name or ' ' }}
                        {{ $users1[0]->u_name_th . ' ' . $users1[0]->u_surname_th }}
                    </h4>
                </a>

                <h4>คณบดีคณะวิทยศาสตร์และเทคโนโลยี</h4>
                <ul class="list-inline text-center">
                    <li >
                        <a href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to={{$user1[0]->u_email or '-' }}&tf=1" target="_blank" title="send email">
                            <i  class="fa fa-envelope"></i> {{ $user1[0]->u_email  or ' - ' }}
                        </a>
                    </li>
                </ul>

            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-offset-2 col-md-4">

        <div class="thumbnail">
            <a href="#">
                <img class="img-responsive"  style="width: 100%;height: 350px"
                     src="{{ $users2[0]->u_image ? asset('images/user-image/').'/' .$users2[0]->u_image: '/images/user-img.png' }}" alt="">
            </a>
            <div class="caption text-center">
                <a href="/profile/{{ $users2[0]->u_id }}">
                    <h4>
                        {{ $users2[0]->academic->academic_name or ' ' }}
                        {{ $users2[0]->u_name_th . ' ' . $users2[0]->u_surname_th }}

                    </h4>
                </a>

                <h4>รองคณบดีฝ่ายวิชาการ</h4>
                <ul class="list-inline text-center">
                    <li >
                        <a href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to={{$user2[0]->u_email or '-' }}&tf=1" target="_blank" title="send email">
                            <i  class="fa fa-envelope"></i> {{ $user2[0]->u_email  or ' - ' }}
                        </a>
                    </li>
                </ul>

            </div>

        </div>
    </div>
    <div class="col-md-4 ">

        <div class="thumbnail">
            <a href="#">
                <img class="img-responsive"  style="width: 100%;height: 350px"
                     src="{{ $users3[0]->u_image ? asset('images/user-image/').'/' .$users3[0]->u_image: '/images/user-img.png' }}" alt="">
            </a>
            <div class="caption text-center">
                <a href="/profile/{{ $users3[0]->u_id }}">
                    <h4>
                        {{ $users3[0]->academic->academic_name or ' ' }}
                        {{ $users3[0]->u_name_th . ' ' . $users3[0]->u_surname_th }}
                    </h4>
                </a>

                <h4>ผู้ช่วยคณบดีฝ่ายวิจัย</h4>
                <ul class="list-inline text-center">
                    <li >
                        <a href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to={{$user3[0]->u_email or '-' }}&tf=1" target="_blank" title="send email">
                            <i  class="fa fa-envelope"></i> {{ $user3[0]->u_email  or ' - ' }}
                        </a>
                    </li>
                </ul>

            </div>

        </div>
    </div>
</div>


<legend>พี่เลี้ยงนักวิจัย</legend>
<div class="row">

    @foreach($users4 as $row)

    <div class=" col-md-3">

        <div class="thumbnail">
            <a href="#">
                <img class="img-responsive"  style="width: 100%;height: 350px"
                     src="{{ $row->u_image ? asset('images/user-image/').'/' .$row->u_image: '/images/user-img.png' }}" alt="">
            </a>
            <div class="caption text-center">
                <a href="/profile/{{ $row->u_id }}">
                    <h4>

                        {{ $row->academic->academic_name or ' ' }}
                        {{ $row->u_name_th . ' ' . $row->u_surname_th }}
                    </h4>
                </a>

                <h4>พี่เลี้ยงนักวิจัย</h4>
                <ul class="list-inline text-center">
                    <li >
                        <a href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to={{ $row->u_email or '-' }}&tf=1" target="_blank" title="send email">
                            <i  class="fa fa-envelope"></i> {{ $row->u_email  or ' - ' }}
                        </a>
                    </li>
                </ul>

            </div>

        </div>
    </div>
        @endforeach
</div>


<legend>คณะกรรมการวิจัย</legend>
<div class="row">

    @foreach($users5 as $row)

        <div class=" col-md-3">

            <div class="thumbnail">
                <a href="#">
                    <img class="img-responsive" style="width: 100%;height: 350px"
                         src="{{ $row->u_image ? asset('images/user-image/').'/' .$row->u_image: '/images/user-img.png' }}" alt="">
                </a>
                <div class="caption text-center">
                    <a href="/profile/{{ $row->u_id }}">
                        <h4>

                            {{ $row->academic->academic_name or ' ' }}
                            {{ $row->u_name_th . ' ' . $row->u_surname_th }}
                        </h4>
                    </a>

                    <h4>คณะกรรมการวิจัย</h4>
                    <ul class="list-inline text-center">
                        <li >
                            <a href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to={{ $row->u_email or '-' }}&tf=1" target="_blank" title="send email">
                                <i  class="fa fa-envelope"></i> {{ $row->u_email  or ' - ' }}
                            </a>
                        </li>
                    </ul>

                </div>

            </div>
        </div>
    @endforeach
</div>

@endsection
