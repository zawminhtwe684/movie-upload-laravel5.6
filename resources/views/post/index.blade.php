@extends('dashboard.app')

@section("title")
    Post List
@endsection

@section('content')

    @component("component.breadcrumb",["data"=>[

    ]])
        @slot("last") Post List @endslot
    @endcomponent



    <div class="row">

        <div class="col-md-12">

            @component("component.card")
                @slot('title') Post List @endslot
                @slot('button')
{{--                    <a href="" class="btn btn-sm btn-outline-danger ">--}}
{{--                        <i class="fas fa-trash fa-fw"></i>--}}
{{--                    </a>--}}
                @endslot
                @slot('body')

                    <table class="tabel table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Images</th>
                                <th>Information</th>
                                <th class="w-25">Description</th>
                                <th>Quality & Genre</th>
                                <th>Control</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($posts as $p)

                                <tr>
                                    <td>{{$p->id}}</td>
                                    <td>
                                        <img src="{{ asset('storage/movie_photo/'.$p->photo) }}" style="height: 50px" class="rounded shadow-sm" alt="">
                                    </td>
                                    <td>{{$p->name}}
                                        <br>
                                        <i class="feather-layers"></i>
                                        <small class="text-black-50">{{$p->category->title}}</small>
                                        @if($p->user->photo)
                                            <img src="{{ asset('storage/profile/'.$p->user->photo) }}" class="rounded-circle" style="width: 20px" alt="">
                                        @else
                                            <img src="{{ asset('dashboard/images/profile_default.png') }}" class="rounded-circle" style="width: 20px" alt="">
                                        @endif
                                        <small class="text-black-50">{{ $p->user->name }}</small>
                                    </td>
                                    <td>{{$p->excerpt}}</td>
                                    <td>{{$p->quality->title}}
                                    <div class="">
                                       @foreach($p->genre as $g)
                                           <span class="btn btn-outline-primary">{{$g->title}}</span>
                                        @endforeach
                                    </div>
                                    </td>
                                    <td>
                                        ‌<a href="{{route('post.edit',$p->id)}}">
                                            <i class="btn btn-outline-primary feather-edit-2"></i>
                                        </a>
                                        <form action="{{route("post.destroy",$p->id)}}" method="post" class="d-inline-block">
                                            @csrf
                                            @method("delete")
                                            <button class="btn btn-outline-danger btn-sm">
                                                <i class="feather-trash-2"></i>
                                            </button>

                                        </form>
                                    </td>
                                    <td>   <i class="feather-calendar"></i>
                                        <small class="text-black-50">{{ $p->created_at->format("d M Y") }}</small>
                                        <br>
                                        <i class="feather-clock"></i>
                                        <small class="text-black-50">{{ $p->created_at->format("h : i") }}</small></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
{{$posts->links()}}
                @endslot
            @endcomponent

        </div>

    </div>
{{--    https://laravel-news.com/eloquent-eager-loading     သွက်သွက်အလုပ်လုပု်ဖို့ဖြစ်သည်--}}
@endsection


