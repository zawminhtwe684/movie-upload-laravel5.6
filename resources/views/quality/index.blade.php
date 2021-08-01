@extends('dashboard.app')

@section("title") Quality Add Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
          //"Test List" => route("test"),
         //   "Test List 2" => route("test"),
         // "Test List 3" => route("test"),
        //"Test List 4" => route("test"),
    ]])
        @slot("last") Quality @endslot

    @endcomponent

    <div class="row">
        <div class="col-md-6">
            @component("component.card")
                @slot("title")
                    Add Quality
                @endslot
                @slot("button")

                @endslot

                @slot("body")
                        <form action="{{ route ("quality.store") }}" method="post">
                            @csrf
                            <div class="form-inline">
                                <label for="" class="mr-2">Quality</label>
                                <input type="text" class="form-control mr-2" name="title" placeholder="New Quality">
                                <button class="btn btn-primary">Add</button>
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
