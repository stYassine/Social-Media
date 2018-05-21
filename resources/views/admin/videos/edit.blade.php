@extends('admin.dashboard')


@section('content')

@include('admin.includes.errors')

<div class="card">
    <div class="card-header">
        <h5>Edit User</h5>
    </div>
    <div class="card-body">
        
        <form action="{{ route('dashboard.users.edit', ['id' => $user->id]) }}" method="post">
            {{ csrf_field }}
            
            <div class="form-group">
                <label for="">Role</label>
                <select name="role_id" class="form-control">
                    <option value="">Choose</option>
                    @foreach($roles->all() as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="">Status</label>
                <select name="is_active" class="form-control">
                    <option value="">Choose</option>
                    <option value="1">Active</option>
                    <option value="0">disActive</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            

            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-info">Edit</button>
            </div>
            
        </form>
        
    </div>
</div>

@endsection