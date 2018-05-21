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
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Remove</th>
            </thead>
            <tbody>
                @if(isset($users))
                    @foreach($users->all() as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>{{ $user->is_active ? 'Active' : 'disActive' }}</td>
                            <td><a href="{{ route('dashboard.users.edit', ['id' => $user->id]) }}" class="btn btn-info">Edit</a></td>
                            <td>
                                <form action="{{ route('dashboard.users.remove', ['id' => $user->id]) }}" method="post">
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