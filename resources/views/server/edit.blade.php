@extends('dashboard.app')

@section("title") Test Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[

    ]])
        @slot("last") Edit @endslot

    @endcomponent

    <div class="row">
        <div class="col-md-12">
            @component("component.card")
                @slot("title")
                    Edit Server
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
                    <form action="{{ route ("server.update",$server->id) }}" method="post" enctype="multipart/form-data" class="p-1 mr-2">
                        @csrf
                        @method("put")
                        <div class="form-inline">
                            <img src="{{asset('storage/server_icon/'.$server->icon)}}" class="server_icon" alt="">
                            <input type="file" class="form-control mr-2" name="icon" >
                            <input type="text" class="form-control mr-2" name="name" value="{{$server->name}}" placeholder="New Server">
                            <input type="text" class="form-control mr-2" name="url" value="{{$server->url}}"placeholder="New Url">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </form>

                    <br>
                    @include("server.list")

                @endslot
            @endcomponent
        </div>
    </div>
@endsection

