@extends('template.landing-template')

@section('meta_tag')

    <meta name="description" content="">

@endsection

@section('page-header')

    @include('components.page-header', [
            'header' => 'ประกาศข่าว',
            'sub_header' => ''
            ] )

@endsection

@section('content')

    {{--@foreach($blogs as $blog)--}}

    @include('sweet::alert')

    <div class="row">
        <div class="col-lg-12">
            @if( !empty(Auth::id()) )
                @if( Auth::user()->u_role_id == 1 )
                    <div class="btn-group form-group">

                        <a href="{{ route('blog.create') }}"
                           class="btn btn-primary">
                            <i class="fa fa-plus-circle"></i>
                            เพิ่มข่าว
                        </a>

                    </div>
                @endif
            @endif
        </div>
    </div>
    <hr>


    @include('blog.blog-list',$blogs)


@endsection