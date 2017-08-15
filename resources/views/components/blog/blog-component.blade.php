<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">ประกาศข่าว</h2>

    </div>


    @if(!empty($blogs))
        @foreach($blogs as $blog)

            <div class="col-md-4 ">

                <div class="thumbnail">
                    <a href="{{ route('blog.show',$blog->blog_id) }}">
                        <img class="img-responsive" style="width: 100%;height: 300px"
                             src="{{ asset('files').'/blog/'.$blog->blog_id .'/'.$blog->blog_image  }}" alt="">
                    </a>
                    <div class="caption">
                        <a href="{{ route('blog.show',$blog->blog_id) }}">
                            <h4 class="text-center">{{ $blog->blog_title }}  </h4>
                        </a>

                        <h6>{{ $blog->blog_information }}</h6>
                        <ul class="list-inline text-center">
                            <li >
                                <a >
                                    <i style="cursor: pointer" class="fa fa-2x fa-facebook-square" onclick="share('{{ route('blog.show',$blog->blog_id) }}')"></i>
                                </a>
                            </li>
                        </ul>

                    </div>

                </div>
            </div>

        @endforeach
    @endIf
    <div class="col-md-12 text-center" style="margin-bottom: 10px">
        <a href="{{ route('blog.index') }}" class="btn btn-primary" style="">ดูข่าวทั้งหมด</a>
    </div>
</div>
<script>

    function share(url){

        var fbpopup = window.open("https://www.facebook.com/sharer/sharer.php?u="+url, "pop", "width=600, height=400, scrollbars=no");
        return false;
    }

</script>