@extends('admin.dashboard')


@section('content')

<div class="card">
    <div class="card-header" data-background-color="purple">
        <h5>Likes</h5>
    </div>
    <div class="card-body" style="padding:0px 15px;">
        <table class="table">
            <thead>
                <th>Id</th>
                <th>User Id</th>
                <th>Post Type</th>
                <th>Post Id</th>
                <th>Edit</th>
                <th>Remove</th>
            </thead>
            <tbody>
                @if(isset($likes))
                    @foreach($likes->all() as $like)
                        <tr>
                            <td>{{ $like->id }}</td>
                            <td>{{ $like->user_id }}</td>
                            <td>{{ $like->post_type_id }}</td>
                            <td>{{ $like->post_id }}</td>
                            <td><a href="{{ route('dashboard.likes.edit', ['id' => $like->id]) }}" class="btn btn-info">Edit</a></td>
                            <td>
                                <form action="{{ route('likes.remove', ['id' => $like->id]) }}" method="post">
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