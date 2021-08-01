<table class="table table-hover table-bordered text-nowrap table-responsive">
    <thead>
        <tr>
            <th>#</th>
            <th>Category Title</th>
            <th>Control</th>
            <th>Owner</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
{{--        @foreach(Category::latest()->get() as $category)--}}
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->title}}</td>
                <td>
                    <a href="{{ route('category.edit',$category->id) }}" class="btn btn-outline-info btn-sm">
                        <i class="feather-edit fa-fw"></i>
                    </a>
                </td>
                <td>{{ $category->user->name}}</td>
                <td>{{$category->created_at}}</td>
            </tr>


        @endforeach
    </tbody>
</table>
