@extends('admin.dashboard')


@section('content')

@include('admin.includes.errors')

<div class="card">
    <div class="card-header">
        <h5>Edit Comment</h5>
    </div>
    <div class="card-body" style="padding:0px 15px;">
        
        <form action="{{ route('dashboard.comments.edit', ['id' => $comment->id]) }}" method="post">
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="">User</label>
                <select name="user_id" class="form-control">
                    <option value="">Choose</option>
                    @if(isset($users))
                        @foreach($users->all() as $user)
                            <option value="{{ $user->id }}" {{ $comment->user_id == $user->id ? 'selected' : '' }}>{{ $user->email }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

           <div class="form-group">
                <label for="">Post</label>
                <select name="user_id" class="form-control">
                    <option value="">Choose</option>
                    @if(isset($posts))
                        @foreach($posts->all() as $post)
                            <option value="{{ $post->id }}">{{ $post->title }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        
            <div class="form-group">
                <label for="">Status</label>
                <select name="is_active" class="form-control">
                    <option value="">Choose</option>
                    <option value="1" {{ $comment->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$comment->is_active ? 'selected' : '' }}>disActive</option>
                </select>
            </div>
            

            <div class="form-group">
                <label for="">Body</label>
                <textarea type="body" name="email" class="form-control">{{ $comment->body }}</textarea>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-info">Edit</button>
            </div>
            
        </form>
        
    </div>
</div>

@endsection