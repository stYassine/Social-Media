@extends('admin.dashboard')


@section('content')

@include('admin.includes.errors')

<div class="card">
    <div class="card-header">
        <h5>Edit Photo</h5>
    </div>
    <div class="card-body" style="padding: 0px 15px;">
        
        <form action="{{ route('dashboard.photos.create') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="">User</label>
                <select name="user_id" class="form-control">
                    <option value="">Choose</option>
                    @if(isset($users))
                        @foreach($users->all() as $user)
                            <option value="{{ $user->id }}" {{ $photo->user->id == $user->id ? 'selected' : '' }}>{{ $user->email }}</option>
                        @endforeach
                    @endif
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
                <label for="">Category</label>
                <select name="category_id" class="form-control">
                    <option value="">Choose</option>
                    @if(isset($categories))
                        @foreach($categories->all() as $category)
                            <option value="{{ $category->id }}" {{ $photo->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" value="{{ $photo->title }}" class="form-control">
            </div>
            
            
            <div class="form-group">
                <label for="">Image</label><br>
                <img src="{{ asset($photo->path) }}" style="width: 250px;">
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-info">Edit</button>
            </div>
            
        </form>
        
    </div>
</div>

@endsection