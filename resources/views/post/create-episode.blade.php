@extends('dashboard.app')

@section("title")
    Upload Photo Page
@endsection
@section("head")

@endsection


@section('content')

    @component("component.breadcrumb",["data"=>[



    ]])
        @slot("last") Add Episode @endslot
    @endcomponent



    <div class="row">

        <div class="col-12 ">
            {{--            https://www.codehim.com/text-input/jquery-multiple-image-upload-with-preview-and-delete            --}}
            @component("component.card")
                @slot('title') <b>Add Episode {{ $post->name }}</b> @endslot
                @slot('button')
                    {{--                    <a href="" class="btn btn-sm btn-outline-danger ">--}}
                    {{--                        <i class="fas fa-trash fa-fw"></i>--}}
                    {{--                    </a>--}}
                @endslot
                @slot('body')
                        <form method="post" action="{{ route('episode.store') }}">
                            <div class="form-inline">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <input type="number" name="number" class="form-control mr-2" placeholder="Number">
                                <input type="text" name="title" class="form-control mr-2" placeholder="Title">
                                <button class="btn btn-primary">Add Episode</button>
                            </div>
                        </form>
                        <hr>
                        <table class="table mt-3 table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>Episode Number</th>
                                <th>Title</th>
                                <th>Control</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Episode::where("post_id",$post->id)->latest()->get() as $e)
{{--                                //where clause စစ်ထားတာက Episode table ထဲက ပါတဲ့ Post_id column နဲ့ Post table ထဲက id နဲ့တိုက်စစ်တာပါ--}}
                                <tr>
                                    <td>{{ $e->number }}</td>
                                    <td>{{ $e->title }}</td>
                                    {{--                                       <td>{{$e->server_id}}</td> server table ထဲမှာ Download link တွေရှိလို့ အပြန််ဖြစ်တယ် Belong to လုပ်တယ် Download Model ထဲမှ **** သု့ရဲ့ထူးခြားချက်က download tabble ထဲမှ ာserver_id ပါတယ် ပြန်ပြီးတော့ယူဖို့လုပ်ရမည်။
                                                                                     public function server(){
                                                                                      return $this->belongsTo(server::class,"server_id");
                                        }
                                    --}}
                                    <td>
                                        <form action="{{ route('episode.destroy',$e->id) }}" method="post" class="d-inline-block">
                                            @csrf
                                            @method("delete")
                                            <button class="btn btn-outline-danger btn-sm">
                                                <i class="feather-trash-2"></i>
                                            </button>
                                        </form>
                                        <a href="{{route("upload-movie-download-link",$post->id)}}" class="btn btn-outline-primary btn-sm ml-2">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </td>
                                    <td>{{$e->created_at}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">
                            <a href="{{route("post.edit",$post->id)}}" class="btn btn-primary btn-lg">Back Edit Post</a>

                        </div>


                    @endslot
            @endcomponent

        </div>

    </div>
@endsection
@section("foot")

@endsection
