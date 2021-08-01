@extends('dashboard.app')

@section("title")
    Upload Photo Page
@endsection
@section("head")

@endsection


@section('content')

    @component("component.breadcrumb",["data"=>[



    ]])
        @slot("last") Add Download @endslot
    @endcomponent



    <div class="row">

        <div class="col-12 ">
            {{--            https://www.codehim.com/text-input/jquery-multiple-image-upload-with-preview-and-delete            --}}
            @component("component.card")
                @slot('title') <b>Add Download {{ $post->name }}</b> @endslot
                @slot('button')
                    {{--                    <a href="" class="btn btn-sm btn-outline-danger ">--}}
                    {{--                        <i class="fas fa-trash fa-fw"></i>--}}
                    {{--                    </a>--}}
                @endslot
                @slot('body')

                        <form method="post" action="{{ route('download.store') }}">
                            <div class="form-inline">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <input type="text" name="link" class="form-control mr-2" placeholder="Download Link">
                                <input type="text" name="file_size" class="form-control mr-2" placeholder="file_size">
                                @if($post->category_id == 2)
                                    <select name="episode_id" id="" class="form-control mr-2">
                                        @foreach(\App\Episode::where("post_id",$post->id)->latest()->get() as $e)
                                            <option value="{{$e->id}}">Episode-{{$e->number}}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                <select name="server_id" id="" class="form-control custom-select mr-2">
                                    @foreach(\App\server::latest()->get() as $s)
                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                        @endforeach
                                </select>
                                <button class="btn btn-primary">Add Movies</button>
                            </div>
                        </form>

                        <hr>

                        @if($post->category_id == 1)
                            <table class="table mt-3 table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>Link</th>
                                    <th>File Size</th>
                                    <th>Server</th>
                                    <th>Control</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Download::where("post_id",$post->id)->latest()->get() as $d)
                                   <tr>
                                       <td>{{ $d->link }}</td>
                                       <td>{{ $d->file_size }}</td>
{{--                                       <td>{{$d->server_id}}</td> server table ထဲမှာ Download link တွေရှိလို့ အပြန််ဖြစ်တယ် Belong to လုပ်တယ် Download Model ထဲမှ **** သု့ရဲ့ထူးခြားချက်က download tabble ထဲမှ ာserver_id ပါတယ် ပြန်ပြီးတော့ယူဖို့လုပ်ရမည်။
                                                 public function server(){
                                                  return $this->belongsTo(server::class,"server_id");
    }
--}}
                                       <td>
                                           <img class="server_icon" src="{{ asset('storage/server_icon/'.$d->server->icon) }}" alt="">
                                           {{$d->server->name}}
                                       </td>
                                       <td>
                                           <form action="{{ route('download.destroy',$d->id) }}" method="post">
                                               @csrf
                                               @method("delete")
                                               <button class="btn btn-outline-danger btn-sm">
                                                   <i class="feather-trash-2"></i>
                                               </button>
                                           </form>
                                       </td>
                                       <td>{{$d->created_at}}</td>

                                   </tr>
                                @endforeach
                                </tbody>
                            </table>

                        @else
{{--                            {{$post->episode->pluck("id")}} table relationship ချိတ်ပြီးတော့ ပြန်ခေါ်သုံးတာပါ pluck  က အဲ့ခေါ်သုံးတဲ့ထဲက id ပဲလိုချင်လို့ ပြောထားတဲ့ဟာ--}}
                            <table class="table mt-3 table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>Episode Number</th>
                                    <th>Download Link</th>
                                    <th>File Size</th>
                                    <th>Server</th>
                                    <th>Control</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Download::where("post_id",$post->id)->latest()->get() as $d)
{{--                                    @foreach(\App\Download::whereIn("post_id",$post->episode->pluck("id"))->latest()->get() as $d)--}}
                                    <tr>
{{--                                    //ဒီလို နှစ်ဆင့်ရဖို့က MOdel ထဲမှာ သွားရေးထားရမည်--}}
                                        <td>{{ $d->episode->number }}</td>
                                        <td><a href="{{$d->link}}">drive</a></td>
                                        <td>{{ $d->file_size }}</td>
                                        {{--                                       <td>{{$d->server_id}}</td> server table ထဲမှာ Download link တွေရှိလို့ အပြန််ဖြစ်တယ် Belong to လုပ်တယ် Download Model ထဲမှ **** သု့ရဲ့ထူးခြားချက်က download tabble ထဲမှ ာserver_id ပါတယ် ပြန်ပြီးတော့ယူဖို့လုပ်ရမည်။
                                                                                         public function server(){
                                                                                          return $this->belongsTo(server::class,"server_id");
                                            }
                                        --}}
                                        <td>
                                            <img class="server_icon" src="{{ asset('storage/server_icon/'.$d->server->icon) }}" alt="">
                                            {{$d->server->name}}
                                        </td>
                                        <td>
                                            <form action="{{ route('download.destroy',$d->id) }}" method="post">
                                                @csrf
                                                @method("delete")
                                                <button class="btn btn-outline-danger btn-sm">
                                                    <i class="feather-trash-2"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>{{$d->created_at}}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                       <div class="d-flex justify-content-between">
                           <a href="{{ route('upload-post-photo',$post->id) }}" class="btn btn-primary btn-lg">Upload Photo</a>
                           <a href="{{ route('post.index') }}" class="btn btn-primary btn-lg">Finish Upload</a>
                       </div>

                @endslot
            @endcomponent

        </div>

    </div>
@endsection
@section("foot")

@endsection
