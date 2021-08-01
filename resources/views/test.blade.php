@extends('dashboard.app')

@section("title") Test Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[

        "Test List" => route("test"),
        "Test List 2" => route("test"),
        "Test List 3" => route("test"),
        "Test List 4" => route("test"),


    ]])
        @slot("last") Test @endslot
    @endcomponent



    <div class="row">

        <div class="col-md-6">

            @component("component.card")
                @slot('title') Test Card @endslot
                @slot('button')
                    <a href="" class="btn btn-sm btn-outline-danger ">
                        <i class="fas fa-trash fa-fw"></i>
                    </a>
                @endslot
                @slot('body')

                    <form action="">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Click Me</button>
                        </div>
                    </form>

                @endslot
            @endcomponent

        </div>

    </div>
@endsection
