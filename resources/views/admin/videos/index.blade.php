@extends('admin.dashboard')


@section('content')

<div class="card">
    <div class="card-header" data-background-color="purple">
        <h5>Users</h5>
    </div>
    <div class="card-body">
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
                
            </tbody>
        </table>
    </div>
</div>

@endsection