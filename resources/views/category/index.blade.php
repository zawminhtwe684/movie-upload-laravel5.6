@extends('dashboard.app')

@section("title") Category Add Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
          //"Test List" => route("test"),
         //   "Test List 2" => route("test"),
         // "Test List 3" => route("test"),
        //"Test List 4" => route("test"),
    ]])
        @slot("last") Category @endslot

    @endcomponent

    <div class="row">
        <div class="col-md-6">
            @component("component.card")
                @slot("title")
                    Add Category
                @endslot
                @slot("button")

                @endslot

                @slot("body")
                        <form action="{{ route ("category.store") }}" method="post">
                            @csrf
                            <div class="form-inline">
                                <label for="" class="mr-2">Category</label>
                                <input type="text" class="form-control mr-2" name="title" placeholder="New Category">
                                <button class="btn btn-primary">Add</button>
                            </div>
                        </form>

                        <br>
                    @include("category.list")

                    @endslot
            @endcomponent
        </div>
    </div>
@endsection
