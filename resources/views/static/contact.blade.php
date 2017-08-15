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
        <!-- Map Column -->
        <div class="col-md-8">
            <!-- Embedded Google Map -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.067904631977!2d100.5365270142619!3d13.714337090371723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29f35d9bdff0d%3A0x8ec79fdd80befa7a!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4LmA4LiX4LiE4LmC4LiZ4LmC4Lil4Lii4Li14Lij4Liy4LiK4Lih4LiH4LiE4Lil4LiB4Lij4Li44LiH4LmA4LiX4Lie!5e0!3m2!1sen!2sth!4v1502818723150" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>

        </div>
        <!-- Contact Details Column -->
        <div class="col-md-4">
            <h3>รายละเอียดการติดต่อ</h3>
            <p>
                เลขที่ 2 ถนนนางลิ้นจี่ <br>ทุ่งมหาเมฆ สาทร, กรุงเทพฯ 10120<br>
            </p>
            <p><i class="fa fa-phone"></i>
                <abbr title="Phone">P</abbr>: +66 0 2287 9600</p>
            <p><i class="fa fa-envelope-o"></i>
                <abbr title="Email">E</abbr>: <a href="mailto:kanchi@example.com">-</a>
            </p>
            <p><i class="fa fa-clock-o"></i>
                <abbr title="Hours">H</abbr>: วันจันทร์ - วันศุกร์ : 8:30 ถึง 16:30 </p>
            <ul class="list-unstyled list-inline list-social-icons">
                <li>
                    <a href="https://www.facebook.com/SciTech1"><i class="fa fa-facebook-square fa-2x"></i></a>
                </li>

            </ul>
        </div>
    </div>


@endsection
