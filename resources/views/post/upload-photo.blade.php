@extends('dashboard.app')

@section("title")
    Upload Photo Page
@endsection
@section("head")
{{--    https://www.codehim.com/bootstrap/bootstrap-navbar-with-login-and-signup/ <<<<<<<<<<အထူးပြန်ကြည့်ရန််--}}
    <link rel="stylesheet" href="{{asset("dashboard/vendor/jquery-image-uploader-preview-and-delete/dist/image-uploader.min.css")}}">
@endsection


@section('content')

    @component("component.breadcrumb",["data"=>[



    ]])
        @slot("last") Upload Photo @endslot
    @endcomponent



    <div class="row">

        <div class="col-12 ">
{{--            https://www.codehim.com/text-input/jquery-multiple-image-upload-with-preview-and-delete            --}}
            @component("component.card")
                @slot('title') <b>Upload Photo for {{ $post->name }}</b> @endslot
                @slot('button')
{{--                    <a href="" class="btn btn-sm btn-outline-danger ">--}}
{{--                        <i class="fas fa-trash fa-fw"></i>--}}
{{--                    </a>--}}
                @endslot
                @slot('body')
                     <h5>Uploaded Photo [["{{$post->moviePhoto->count()}}"]]</h5>
                    <div class="mb-2" style="overflow: scroll;width: 100%;display: flex">

                        @forelse($post->moviePhoto as $mp)

                           <div class="position-relative d-inline-block">
                               <img src="{{asset("storage/movie_multiple_photo/".$mp->location)}}" class="rounded" style="height: 200px" alt="">
                               <form action="{{route("photo.destroy",$mp->id)}}" method="post" class="position-absolute" style="bottom: 5px;right: 5px;z-index:1">
                                   @csrf
                                   @method("delete")
                                   <button class="btn btn-danger btn-sm">
                                       <i class="feather-trash-2"></i>
                                   </button>
                               </form>
                           </div>
                        @empty
                            <p>Not Upload Yet</p>
                        @endforelse
                    </div>

                        <form action="{{ route("photo.store") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="form-group">
                                <div class="input-images mb-3"></div>

                                @error("images")
                                <small class="text-danger font-weight-bold">{{$message}}</small>
                                @enderror

                                @error("images.*")
                                <small class="text-danger font-weight-bold">{{$message}}</small>
                                @enderror

                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{route("post.edit",$post->id)}}" class="btn btn-primary btn-lg">Back Edit Post</a>
                                <button class="btn btn-primary btn-lg">Upload And Next</button>
                            </div>

                        </form>

                @endslot
            @endcomponent

        </div>

    </div>
@endsection
@section("foot")
    {{--    https://www.codehim.com/bootstrap/bootstrap-navbar-with-login-and-signup/ <<<<<<<<<<အထူးပြန်ကြည့်ရန််--}}
    <script src="{{asset("dashboard/vendor/jquery-image-uploader-preview-and-delete/dist/image-uploader.min.js")}}"></script>
    <script>
        $('.input-images').imageUploader();
    </script>
@endsection
