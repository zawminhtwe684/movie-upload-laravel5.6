@extends('dashboard.app')

@section("title") Genre Add Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
          //"Test List" => route("test"),
         //   "Test List 2" => route("test"),
         // "Test List 3" => route("test"),
        //"Test List 4" => route("test"),
    ]])
        @slot("last") Genre @endslot

    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot("title")
                    Add Genre
                @endslot
                @slot("button")

                @endslot

                @slot("body")
                        <form action="{{ route ("genre.store") }}" method="post">
                            @csrf
                            <div class="form-inline">
                                <label for="" class="mr-2">Genre</label>
                                <input type="text" class="form-control mr-2" name="title" placeholder="New Genre">
                                <button class="btn btn-primary">Add</button>
                                </div>
                        </form>
                        @error("title")
                        <small class="text-danger">{{$message}}</small>
                        @enderror

                        <br>
                    @include("genre.list")

                    @endslot
            @endcomponent
        </div>
    </div>
@endsection
