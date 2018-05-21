@extends('admin.dashboard')


@section('content')

<div class="card">
    <div class="card-header" data-background-color="purple">
        <h5>Users</h5>
    </div>
    <div class="card-body" style="padding: 0px 15px;">
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Title</th>
                <th>Status</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Remove</th>
            </thead>
            <tbody>
                @if(isset($photos))
                    @foreach($photos->all() as $photo)
                        <tr>
                            <td>{{ $photo->id }}</td>
                            <td>{{ $photo->title }}</td>
                            <td>{{ $photo->isActive ? 'Active' : 'Disactive' }}</td>
                            <td><img src="{{ asset($photo->path) }}" style="width: 80px;"></td>
                            <td><a href="{{ route('dashboard.photos.edit', ['id' => $photo->id]) }}" class="btn btn-info">Edit</a></td>
                            <td>
                                <form action="{{ route('dashboard.photos.remove', ['id' => $photo->id]) }}" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection