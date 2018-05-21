@extends('admin.dashboard')


@section('content')

@include('admin.includes.errors')

<div class="card">
    <div class="card-header">
        <h5>Create Like</h5>
    </div>
    <div class="card-body" style="padding:0px 15px;">
        
        <form action="{{ route('dashboard.users.create') }}" method="post">
            {{ csrf_field() }}
            
            


            
            <div class="form-group">
                <label for="">User</label>
                <select name="user_id" class="form-control">
                    <option value="">Choose</option>
                    @foreach($users->all() as $user)
                        <option value="{{ $user->id }}">{{ $user->email }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="">Post Type</label>
                <select name="post_type_id" class="form-control post_type_id">
                    <option value="">Choose</option>
                    <option value="1">Articles</option>
                    <option value="2">Photos</option>
                    <option value="3">Videos</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="">Post</label>
                <select name="post_id" class="form-control">
                </select>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            
        </form>
        
    </div>
</div>
@endsection


@section('javascript')
<script>
    $(document).ready(function(){
            
        console.log('BLA');
        
        $('.post_type_id').on('change', function(evt){
            
            /*<option value="">Choose</option>*/
            
            var selected_post_type =$('.post_type_id').val();
            
            $.ajax({
                type: 'POST',
                url: "{{ route('post.type') }}",
                data: selected_post_type,
                success: function(response){
                    console.log(response);
                },
                error: function(err){
                    console.log(err);
                }
            });
            
        });
        
    });
</script>
@endsection