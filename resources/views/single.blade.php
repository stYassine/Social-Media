@extends('front.frontend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-4">
           @include('partials.public_sidebar')
       </div>
       
        <div class="col-md-8">
           <h4 style="opacity:0;">bla</h4>
           
           @if(isset($post))
               @if($post->type == 1)
                   <div class="card">
                        <div class="card-header">{{ $post->title }}</div>

                        <div class="card-body">
                           {{ $post->body }}
                        </div>
                        <div class="card-footer">    
                            
                        @if($liked_by_auth)
                         <!-- unlike -->
                            <form action="{{ route('likes.remove') }}" method="post" style="display:inline-block;">
                               {{ csrf_field() }}
                               <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                               <input type="hidden" name="post_id" value="{{ $post->id }}">
                               <input type="hidden" name="post_type_id" value="{{ $post->type }}">
                               <button class="btn btn-warning btn-sm"><i class="fa fa-thumbs-up"></i> Unlike </button>
                           </form>
                           <!-- END unlike -->
                         @else
                          <!-- like -->
                           <form action="{{ route('likes.create') }}" method="post" style="display:inline-block;">
                               {{ csrf_field() }}
                               <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                               <input type="hidden" name="post_id" value="{{ $post->id }}">
                               <input type="hidden" name="post_type_id" value="{{ $post->type }}">
                               <button class="btn btn-info btn-sm"><i class="fa fa-thumbs-up"></i> Like <span class="badge">{{ $post_likes->count() }}</span></button>
                           </form>
                           <!-- END like -->
                           @endif
                           
                        </div>
                    </div>
               @elseif($post->type == 2)
                <div class="card">
                    <div class="card-header">{{ $post->title }}</div>

                    <div class="card-body">
                        <img src="{{ asset($post->path) }}" style="width:400px; margin:0 auto;">
                    </div>
                    <div class="card-footer">
                        
                         @if($liked_by_auth)
                         <!-- unlike -->
                            <form action="{{ route('likes.remove') }}" method="post" style="display:inline-block;">
                               {{ csrf_field() }}
                               <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                               <input type="hidden" name="post_id" value="{{ $post->id }}">
                               <input type="hidden" name="post_type_id" value="{{ $post->type }}">
                               <button class="btn btn-warning btn-sm"><i class="fa fa-thumbs-up"></i> Unlike </button>
                           </form>
                           <!-- END unlike -->
                         @else
                          <!-- like -->
                           <form action="{{ route('likes.create') }}" method="post" style="display:inline-block;">
                               {{ csrf_field() }}
                               <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                               <input type="hidden" name="post_id" value="{{ $post->id }}">
                               <input type="hidden" name="post_type_id" value="{{ $post->type }}">
                               <button class="btn btn-info btn-sm"><i class="fa fa-thumbs-up"></i> Like <span class="badge">{{ $post_likes->count() }}</span></button>
                           </form>
                           <!-- END like -->
                           @endif
                           
                        </div>
                    </div>
                
               @endif
           
            
            @else
                <h1>No Posts</h1>
            @endif
            
            
            <!-- Add New Comment -->
            <br><br>
            <div class="card">
                <div class="card-header">
                    <h5>Add Comment</h5>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('dashboard.comments.create') }}" method="post">
                        {{ csrf_field() }}
                        
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="post_type_id" value="{{ $post->type }}">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        
                        <div class="form-group">
                            <label for="">Comment</label>
                            <textarea name="body" rows="5" class="form-control"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Comment</button>
                        </div>
                        
                    </form>
                    
                </div>
            </div>
            <!-- END Add New Comment -->
            
            
            <!-- Comments -->
            <br><br>
            <h5>Comments</h5>
            @if(isset($comments))
                @foreach($comments->all() as $comment)
                    <div class="card">
                        <div class="card-header">
                            <h5><a href="{{ route('profile', ['id' => $comment->user->id ]) }}">{{ $comment->user->name }}</a></h5>
                        </div>
                        <div class="card-body">
                            <p>{{ $comment->body }}</p>
                        </div>
                    </div>
                    <br>
                @endforeach
            @endif
            <!-- END Comments -->
            
        </div>
        
        
    </div>
</div>
@endsection
