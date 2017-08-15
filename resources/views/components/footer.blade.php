<footer class="footer-distributed">

    <div class="footer-right">

        <a href="https://www.facebook.com/SciTech1" target="_blank"><i class="fa fa-facebook"></i></a>
        {{--
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-github"></i></a>
        --}}

    </div>

    <div class="footer-left">

        <p class="footer-links">
            <a href="{{ route('home') }}">หน้าแรก</a>
            ·
            <a href="{{ route('profile.index')  }}">นักวิจัย</a>
            ·
            <a href="{{ route('research.index')  }}">ผลงานวิจัย</a>
            ·
            <a href="#">เกี่ยวกับเรา</a>
            ·
            <a href="#">ติดต่อเรา</a>
        </p>

        <b><p> &copy; 2017, <i>Copy Rights สำนักวิทยบริการและเทคโนโลยีสารสนเทศ มหาวิทยาลัยราชมงคลกรุงเทพ . All Rights
                    Reserved</i></p></b>
    </div>

</footer>

<style>

    .footer-distributed .footer-left .footer-links a:hover {
        color: #00aced;
    }

    footer {
        margin-bottom: 0px !important;
    }

    .footer-distributed {
        background-color: #ffff5a;
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
        box-sizing: border-box;
        width: 100%;
        text-align: left;
        font: normal 16px sans-serif;

        padding: 45px 50px;
        margin-top: 80px;
    }

    .footer-distributed .footer-left p {
        color: #8f9296;
        font-size: 14px;

    }

    /* Footer links */

    .footer-distributed p.footer-links {
        font-size: 18px;
        font-weight: bold;
        color: black;
        margin: 0 0 10px;
        padding: 0;
    }

    .footer-distributed p.footer-links a {
        display: inline-block;
        line-height: 1.8;
        text-decoration: none;
        color: inherit;
    }

    .footer-distributed .footer-right {
        float: right;
        margin-top: 6px;
        max-width: 180px;
    }

    .footer-distributed .footer-right a .fa-facebook {

        background-color: #3b5998;
        display: inline-block;
        width: 35px;
        height: 35px;
        border-radius: 2px;

        font-size: 20px;
        color: #ffffff;
        text-align: center;
        line-height: 35px;

        margin-left: 3px;
    }

    /* If you don't want the footer to be responsive, remove these media queries */

    @media (max-width: 600px) {

        .footer-distributed .footer-left,
        .footer-distributed .footer-right {
            text-align: center;
        }

        .footer-distributed .footer-right {
            float: none;
            /*margin: 0 auto 20px;*/
        }

        .footer-distributed .footer-left p.footer-links {
            line-height: 1.8;
        }
    }

    footer {
        position: absolute;
        bottom: 0;
        width: 100%;
    }

    footer {
        position: static;
    }


</style>