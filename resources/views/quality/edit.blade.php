@extends('dashboard.app')

@section("title") Test Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[

    ]])
        @slot("last") Edit @endslot

    @endcomponent

    <div class="row">
        <div class="col-md-6">
            @component("component.card")
                @slot("title")
                    Edit Quality
                @endslot
                @slot("button")

                @endslot

                @slot("body")
                    <form action="{{ route ("quality.update",$quality->id) }}" method="post">
                        @csrf
                        @method("put")
                        <div class="form-inline">
                            <label for="" class="mr-2">Quality</label>
                            <input type="text" class="form-control mr-2" value="{{ $quality->title }}" name="title" placeholder="New Quality">
                            <button class="btn btn-primary">Update</button>
                        </div>
                        @error("title")
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </form>

                    <br>
                    @include("quality.list")

                @endslot
            @endcomponent
        </div>
    </div>
@endsection

