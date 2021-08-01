<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Server Name</th>
        <th>Icon</th>
        <th>Server Url</th>
        <th>Control</th>
        <th>Created At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($servers as $server)

        <tr>
            <td>{{ $server->id }}</td>
            <td>{{ $server->name }}</td>
            <td>
                <img class="server_icon" src="{{ asset('storage/server_icon/'.$server->icon) }}" alt="">
            </td>
            <td>{{ $server->url }}</td>
            <td>
                <a href="{{ route('server.edit',$server->id) }}" class="btn btn-outline-info btn-sm">
                    <i class="feather-edit fa-fw"></i>
                </a>
            </td>
            <td>{{ $server->created_at }}</td>
        </tr>

    @endforeach
    </tbody>
</table>
