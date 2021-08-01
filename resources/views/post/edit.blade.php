@extends('dashboard.app')

@section("title")
    Edit Post
@endsection

@section('content')

    @component("component.breadcrumb",["data"=>[

        "Post List" => route("post.index"),



    ]])
        @slot("last") Edit Post @endslot
    @endcomponent

    <form class="row" method="post" action="{{route("post.update",$post->id)}}" enctype="multipart/form-data">
<div class="col-12">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>


        <div class="col-md-3">
            @csrf
            @method("put")
            @component("component.card")
                @slot('title') Post Information @endslot
                @slot('button')

                @endslot
                @slot('body')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $post->name }}" placeholder="Movie or Series Name">
                            @error("name")
                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" id="original_name" name="original_name" class="form-control" value="{{ $post->original_name }}" placeholder="Original Name">
                            @error("original_name")
                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="release_year">Release Year</label>
                            <input type="text" list="years" id="release_year" name="release_year" value="{{ $post->release_year }}" class="form-control">
                            <datalist id="years">
                                @for($y=date("Y");$y > 2010 ;$y--)
                                    <option value="{{ $y }}">
                                @endfor
                            </datalist>
                            @error("release_year")
                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Select Category</label>
                            <div class="">
                                <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                    @foreach($categories as $c)
                                        <label class="btn btn-outline-secondary text-nowrap table-responsive">
                                            <input type="radio" name="category" id="option1" value="{{ $c->id }}" {{ $post->category_id == $c->id ? "checked" : "" }}> {{ $c->title }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            @error("category")
                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-0">
                            <label>Select Quality</label>
                            <select name="quality" class="custom-select">
                                @foreach($qualities as $q)
                                    <option value="{{ $q->id }}" {{ $post->quality_id == $q->id ? "selected":"" }}>{{ $q->title }}</option>
                                @endforeach
                            </select>

                            @error("quality")
                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                            @enderror
                        </div>
                @endslot
            @endcomponent
                @component("component.card")
                    @slot('title') Select Genre @endslot
                    @slot('button')

                    @endslot
                    @slot('body')

{{--                        object ကနေ array ပြောင်းသုံးခြင်းဖြစ်သည်--}}
{{--                        @php--}}
{{--                         var_dump($post->genre->pluck("id")->toArray())--}}
{{--                        @endphp--}}
                            @foreach($genres as $g)

                                @if(in_array($g->id, $post->genre->pluck('id')->toArray()))
                                    @continue
                                @endif

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="genre[]" id="genre{{ $g->id }}" value="{{ $g->id }}"}}>
                                    <label class="custom-control-label" for="genre{{ $g->id }}">{{ $g->title }}</label>
                                </div>

                            @endforeach
                                @error("genre")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                                @error("genre.*")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            <br>
                            <hr>
                        <h5>You have selected file</h5>
                            @foreach($post->genre as $pg)
                                <ul class="list-group p-1">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{$pg->title}}
                                        <a href="{{route('delete.post.genre',[$post->id,$pg->id]) }}" class="btn btn-outline-danger btn-sm">
                                            <i class="feather-trash-2"></i>
                                        </a>
                                    </li>
                                </ul>
                                @endforeach
                                <hr>
                    @endslot
                @endcomponent


        </div>
        <div class="col-md-6">

            @component("component.card")
                @slot('title')
                    Additional Information
                @endslot
                @slot('button')

                @endslot
                @slot('body')
                        <div class="form-row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="director">Director</label>
                                    <input type="text" id="director" name="director" value="{{ $post->director }}" class="form-control">
                                    @error("director")
                                    <small class="text-danger font-weight-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="actors">Actors</label>
                                    <input type="text" id="actors" name="actors" value="{{ $post->actors }}" class="form-control">
                                    @error("actors")
                                    <small class="text-danger font-weight-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <label for="trailer">Trailer</label>
                        <input type="text" id="trailer" name="trailer" value="{{$post->trailer}}" class="form-control">
                        @error("trailer")
                        <small class="text-danger font-weight-bold">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex">
                        <a href="{{route("upload-post-photo",$post->id)}}" class="btn btn-primary">
                            <i class="feather-image"></i>
                            Edit Post Photo <span class="badge badge-primary">{{$post->moviePhoto->count()}}</span>
                        </a>

                        @if($post->category_id == 1)
                            <a href="{{route("upload-movie-download-link",$post->id)}}" class="btn btn-primary">
                                <i class="feather-download"></i>
                                Edit Download <span class="badge badge-primary">{{$post->download->count()}}</span>
                            </a>
                        @else
                            <a href="{{route("create-episode",$post->id)}}" class="btn btn-primary">
                                <i class="feather-layers"></i>
                                Edit Episode <span class="badge badge-primary">{{$post->episode->count()}}</span>
                            </a>

                            <a href="{{route("upload-movie-download-link",$post->id)}}" class="btn btn-primary">
                                <i class="feather-download"></i>
                                Edit Download <span class="badge badge-primary">{{$post->download->count()}}</span>
                            </a>
                        @endif

{{--                        {{ $post->moviePhoto }}--}}
{{--                        <br>--}}
{{--                        {{$post->download}}--}}
                    </div>

                @endslot
            @endcomponent
                @component("component.card")
                    @slot('title') Post Details @endslot
                    @slot('button')

                    @endslot
                    @slot('body')
                            <textarea name="description" id="description" cols="30" rows="10">{{ $post->description }}</textarea>
                            @error("description")
                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                            @enderror


                        @endslot
                @endcomponent

        </div>
        <div class="col-md-3">

            @component("component.card")
                @slot('title') Cover Photo
                <span class="badge badge-pill badge-primary" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Photo Must be 4 ratio <br> In this Photo">Info</span>
                @endslot
                @slot('button')

                @endslot
                @slot('body')
                        <input type="file" name="photo" class="d-none real-uploder">
                        <div class="border rounded upload-iu">
                            <div class="text-center ">
                                <img src="{{asset("storage/movie_photo/".$post->photo)}}" class="w-100 mb-3" alt="">
                                <i class="feather-upload fa-1x"></i>
                            </div>
                        </div>
                        @error("photo")
                        <small class="text-danger font-weight-bold">{{ $message }}</small>
                        @enderror
                        <hr>

                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="is_publish" class="custom-control-input" id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1">Direct Publish</label>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-lg w-100">Update Post</button>

                @endslot
            @endcomponent



        </div>
    </form>

@endsection
@section("foot")
    <script src="{{ asset("dashboard/vendor/ckeditor/ckeditor.js") }}">
    </script>

    <script>

        CKEDITOR.replace( 'description' ,{
            uiColor: '#ffffff',
            extraPlugins : 'autogrow',
            toolbarGroups : [
                { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                { name: 'links', groups: [ 'links' ] },
                { name: 'insert', groups: [ 'insert' ] },
                { name: 'forms', groups: [ 'forms' ] },
                { name: 'tools', groups: [ 'tools' ] },
                { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'others', groups: [ 'others' ] },
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                { name: 'styles', groups: [ 'styles' ] },
                { name: 'colors', groups: [ 'colors' ] },
                { name: 'about', groups: [ 'about' ] }
            ],
            removeButtons : 'Underline,Subscript,Superscript,Blockquote,Styles,About,Source,Maximize,Image,Undo,Scayt,Cut,Anchor,Table,HorizontalRule,SpecialChar,PasteText,Paste,Copy,Redo,PasteFromWord',
        });

        $(".upload-iu").click(function () {
            $(".real-uploder").click();
        });
        $(".real-uploder").on("change",function () {
            let file = this.files[0];
            // console.log(file);
            let fileReader = new FileReader();
            fileReader.onload = function () {
                $(".upload-iu").empty();
                $(".upload-iu").append(`
                    <img src="${fileReader.result}" class="img-fluid">
                `);
            };
            fileReader.readAsDataURL(file);
        })
    </script>
@endsection
