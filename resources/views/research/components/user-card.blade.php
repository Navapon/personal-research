<div class="col-lg-12 col-md-12">
    <div class="col-xs-12 col-sm-2">
        <figure>
            <img class="img-circle img-responsive" alt=""
                 src="{{ $obj->user->u_image ? asset('images').'/' .$obj->user->u_image: '/images/user-img.png' }}"
            >
        </figure>
        <div class="row">
            <div class="col-xs-12 social-btns">
                @if ( $obj->user->u_facebook)
                    <div class="col-xs-3 col-md-2 col-lg-1 social-btn-holder">
                        <a href="{{ $obj->user->u_facebook }}"
                           title="{{ $obj->user->u_facebook  }}" target="_blank"
                           class="btn btn-social btn-block btn-facebook">
                            <i class="fa fa-facebook"></i> </a>
                    </div>
                @endif

                @if($obj->user->u_line)

                    <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                        <a href="http://line.me/ti/p/~{{ $obj->user->u_line }}"
                           title="{{ $obj->user->u_line  }}"
                           target="_blank"
                           class="btn btn-social btn-block btn-line">
                            <i class="fa">L</i> </a>
                    </div>
                @endif

                @if ($obj->user->u_instragram)
                    <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                        <a href="http://instagram.com/_u/{{ $obj->user->u_line }}"
                           title="{{ $obj->user->u_line  }}"
                           target="_blank"
                           class="btn
                                                       +btn-social btn-block btn-instagram">
                            <i class="fa fa-instagram"></i> </a>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-10">
        <ul class="list-group">
            <li class="list-group-item">

                {{ $obj->user->academic->academic_name or ' ' }}
                {{ $obj->user->u_name_th . ' ' . $obj->user->u_surname_th }}

            </li>
            @if(!empty($obj->user->u_name_en))
            <li class="list-group-item">
                {{  $obj->user->u_name_en or '' }}
                {{  $obj->user->u_surname_en or ''}}
            </li>
            @endif
            <li class="list-group-item">
                สาขา {{ $obj->user->major->major_name or ' - ' }}</li>
            <li class="list-group-item">
                <a href="tel:{{$obj->user->u_phone or ''}}">
                    <i  class="fa fa-phone"></i> {{ $obj->user->u_phone or ' - '}}
                </a>
            </li>
            <li class="list-group-item">
                <a href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to={{$obj->user->u_email or '-' }}&tf=1" target="_blank" title="send email">
                <i  class="fa fa-envelope"></i> {{ $obj->user->u_email or ' - ' }}
                </a>
            </li>
        </ul>
    </div>
</div>