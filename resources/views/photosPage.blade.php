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
          
           
           
           
           @if(count($photos) > 0)
               @foreach($photos as $key => $photo)
               
                <!-- Article -->
                <div class="card">
                    <div class="card-header">{{ $photo->title }}</div>

                    <div class="card-body">
                        <a href="{{ route('single', ['type' => $photo->type, 'id' => $photo->id]) }}"><img src="{{ asset($photo->path) }}" style="width:200px;"></a>
                    </div>
                    <div class="card-footer"><a href="{{ route('single', ['type' => $photo->type, 'id' => $photo->id]) }}">View</a></div>
                </div><br>
                <!-- END Article -->
               
               
                @endforeach
            @else
            <div class="card">
                <div class="card-header">Whoops</div>

                <div class="card-body">
                    There Are No Photos
                </div>
            </div>
            @endif
            
            
        </div>
        
    </div>
</div>
@endsection
