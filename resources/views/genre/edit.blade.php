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
                    Edit Genre
                @endslot
                @slot("button")

                @endslot

                @slot("body")
                    <form action="{{ route ("genre.update",$genre->id) }}" method="post">
                        @csrf
                        @method("put")
                        <div class="form-inline">
                            <label for="" class="mr-2">Genre</label>
                            <input type="text" class="form-control mr-2" value="{{ $genre->title }}" name="title" placeholder="New Genre">
                            <button class="btn btn-primary">Update</button>
                        </div>

                    </form>

                    <br>
                    @include("genre.list")

                @endslot
            @endcomponent
        </div>
    </div>
@endsection

