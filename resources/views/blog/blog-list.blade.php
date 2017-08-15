@if(!empty($blogs))
    @foreach($blogs as $blog)
        <div class="row">

            <div class="col-md-1 text-center">
                <p><i class="fa fa-newspaper-o fa-4x"></i>
                </p>
                <p>
                    {{  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$blog->created_at )->addYears(543)->toFormattedDateString() }}
                </p>
            </div>
            <div class="col-md-5">

                <img class="img img-responsive img-hover"
                     src="{{ asset('files').'/blog/'.$blog->blog_id .'/'.$blog->blog_image  }}" alt=""
                     style='height: 100%; width: 80%; object-fit: contain'
                >

            </div>
            <div class="col-md-6">
                <h3>
                    <a href="{{ route('blog.show',$blog->blog_id) }}">{{ $blog->blog_title }}</a>
                </h3>
                <p>ประกาศข่าวโดย <a href="#">{{ $blog->author->u_name_th }} {{ $blog->author->u_surname_th }}</a>
                </p>
                <p>{{ $blog->blog_information }}</p>
                <div style="float: right">
                    <a class="btn btn-primary" href="{{ route('blog.show',$blog->blog_id) }}">อ่านเพิ่มเติม <i
                                class="fa fa-arrow-right"></i></a>
                    @if( !empty(Auth::id()) )
                        @if( Auth::user()->u_role_id == 1 )
                            <a class="btn btn-warning" href="{{ route('blog.edit',$blog->blog_id) }}">แก้ไข <i
                                        class="fa fa-edit"></i></a>
                            {{--<a class="btn btn-danger" href="{{ route('blog.destroy',$blog->blog_id) }}">ลบ <i--}}
                                        {{--class="fa fa-trash"></i></a>--}}
                        @endif
                    @endif
                </div>

            </div>
        </div>
        <hr>
    @endforeach
@endif
<style>


</style>