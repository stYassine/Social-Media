@extends('front.frontend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-4">
           @include('partials.public_sidebar')
       </div>
       
        <div class="col-md-8">
          <!-- Categories Navbar -->
          @include('partials.categories_navbar')
          
           
           
           
           @if(count($posts) > 0)
               @foreach($posts as $key => $post)
               
               @if($post->type == 1)
                   <!-- Article -->
                    <div class="card">
                        <div class="card-header">{{ $post->title }}
                            <span class="pull-right"><a href="{{ route('profile', ['id' => $post->user->id]) }}">{{ $post->user->name }}</a></span>
                        </div>

                        <div class="card-body">
                            {{ substr($post->body, 0, 108).'...' }}
                        </div>
                        <div class="card-footer"><a href="{{ route('single', ['type' => $post->type, 'id' => $post->id]) }}">View</a></div>
                    </div><br>
                <!-- END Article -->
               @elseif($post->type == 2)
               <!-- Article -->
                <div class="card">
                    <div class="card-header">{{ $post->title }}</div>

                    <div class="card-body">
                        <a href="{{ route('single', ['type' => $post->type, 'id' => $post->id]) }}"><img src="{{ asset($post->path) }}" style="width:200px;"></a>
                    </div>
                    <div class="card-footer"><a href="{{ route('single', ['type' => $post->type, 'id' => $post->id]) }}">View</a></div>
                </div><br>
                <!-- END Article -->
               @endif
               
                @endforeach
            @else
            <div class="card">
                <div class="card-header">Whoops</div>

                <div class="card-body">
                    There Are No Posts
                </div>
            </div>
            @endif
            
            
        </div>
        
    </div>
</div>
@endsection
