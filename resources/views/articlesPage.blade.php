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
          
           
           
           
           @if(count($articles) > 0)
               @foreach($articles as $key => $article)
               
                <!-- Article -->
                <div class="card">
                    <div class="card-header">{{ $article->title }}</div>

                    <div class="card-body">
                        {{ substr($article->body, 0, 108).'...' }}
                    </div>
                    <div class="card-footer"><a href="{{ route('single', ['type' => $article->type, 'id' => $article->id]) }}">View</a></div>
                </div><br>
                <!-- END Article -->
               
               
                @endforeach
            @else
            <div class="card">
                <div class="card-header">Whoops</div>

                <div class="card-body">
                    There Are No Articles
                </div>
            </div>
            @endif
            
            
        </div>
        
    </div>
</div>
@endsection
