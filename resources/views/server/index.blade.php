@extends('dashboard.app')

@section("title") Server Add Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
          //"Test List" => route("test"),
         //   "Test List 2" => route("test"),
         // "Test List 3" => route("test"),
        //"Test List 4" => route("test"),
    ]])
        @slot("last") Server @endslot

    @endcomponent

    <div class="row">
        <div class="col-md-12">
            @component("component.card")
                @slot("title")
                    Add Server
                @endslot
                @slot("button")

                @endslot

                @slot("body")
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route ("server.store") }}" method="post" enctype="multipart/form-data" class="p-1">
                            @csrf
                            <div class="form-inline">
                                <label for="" class="mr-2">Server</label>
                                <input type="file" class="form-control p-1 mr-2" name="icon" >
                                <input type="text" class="form-control mr-2" name="name" placeholder="New Server">
                                <input type="text" class="form-control mr-2" name="url" placeholder="New Url">
                                <button class="btn btn-primary">Add</button>
                            </div>
                        </form>

                        <br>
                    @include("server.list")

                    @endslot
            @endcomponent
        </div>
    </div>
@endsection
