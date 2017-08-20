@extends('template.landing-template')

@section('page-header')

    @include('components.page-header',[
        'header' =>   'รายละเอียดข่าว'
    ])

@endsection



@section('content')
    <!-- Content Row -->
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-12">

            <!-- Blog Post -->

            <hr>

            <!-- Date/Time -->
            <p>
                <i class="fa fa-clock-o"></i>
                Posted on  {{  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$blog->created_at )->addYears(543)->toFormattedDateString() }}
            <div class="div" style="float: right">
                <i class="fa fa-eye" aria-hidden="true"> {{ Counter::showAndCount('blog',$blog->blog_id) }} </i>
            </div>
                <a >
                    <i style="cursor: pointer" class="fa fa-2x fa-facebook-square" onclick="share('{{ route('blog.show',$blog->blog_id) }}')"></i>
                </a>
            </p>

            <hr>
            {{--<div style="height: 600px;width: 1280px">--}}
            {{--<!-- Preview Image -->--}}
            {{--<img class="img-responsive" src="{{ asset('files').'/blog/'.$blog->blog_id .'/'.$blog->blog_image  }}" alt=""--}}
                 {{--style='height: 100%; width: 100%; object-fit: contain'--}}
            {{-->--}}
            {{--</div>--}}
            <hr>

            <legend>{{ $blog->blog_title }}</legend>
            <!-- Post Content -->
            {!! $blog->blog_content !!}

            <hr>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        {{--<div class="col-md-4">--}}

            {{--<!-- Blog Search Well -->--}}
            {{--<div class="well">--}}
                {{--<h4>Blog Search</h4>--}}
                {{--<div class="input-group">--}}
                    {{--<input type="text" class="form-control">--}}
                    {{--<span class="input-group-btn">--}}
                            {{--<button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>--}}
                        {{--</span>--}}
                {{--</div>--}}
                {{--<!-- /.input-group -->--}}
            {{--</div>--}}

            {{--<!-- Blog Categories Well -->--}}
            {{--<div class="well">--}}
                {{--<h4>Blog Categories</h4>--}}
                {{--<div class="row">--}}
                    {{--<div class="col-lg-6">--}}
                        {{--<ul class="list-unstyled">--}}
                            {{--<li><a href="#">Category Name</a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#">Category Name</a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#">Category Name</a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#">Category Name</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-6">--}}
                        {{--<ul class="list-unstyled">--}}
                            {{--<li><a href="#">Category Name</a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#">Category Name</a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#">Category Name</a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#">Category Name</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- /.row -->--}}
            {{--</div>--}}

            {{--<!-- Side Widget Well -->--}}
            {{--<div class="well">--}}
                {{--<h4>Side Widget Well</h4>--}}
                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>--}}
            {{--</div>--}}

        {{--</div>--}}

    </div>
    <script>

        function share(url){

            var fbpopup = window.open("https://www.facebook.com/sharer/sharer.php?u="+url, "pop", "width=600, height=400, scrollbars=no");
            return false;
        }

    </script>

    <!-- /.row -->
@endsection
