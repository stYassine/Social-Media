@extends('admin.dashboard')


@section('content')

<div class="card">
    <div class="card-header" data-background-color="purple">
        <h5>Comments</h5>
    </div>
    <div class="card-body" style="padding:0px 15px;">
        <table class="table table-hover">
            <thead>
                <th>Id</th>
                <th>User Id</th>
                <th>Post Id</th>
                <th>Post Type</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Remove</th>
            </thead>
            <tbody>
                @if(isset($comments))
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->user_id }}</td>
                            <td>{{ $comment->post_id }}</td>
                            <td>{{ $comment->post_type_id }}</td>
                            <td>{{ $comment->is_active ? 'Active' : 'disActive' }}</td>
                            <td><a href="{{ route('dashboard.comments.edit', ['id' => $comment->id]) }}" class="btn btn-info">Edit</a></td>
                            <td>
                                <form action="{{ route('dashboard.comments.remove', ['id' => $comment->id]) }}" method="post">
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