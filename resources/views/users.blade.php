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
          
           
           @if(count($users) > 0)
               @foreach($users as $key => $user)
               <!-- Article -->
                <div class="card">
                    <div class="card-header">{{ $user->name }}</div>

                    <div class="card-body">
                        <p>Articles {{ $user->articles->count() }}</p>
                        <p>Photos {{ $user->photos->count() }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('profile', ['id' => $user->id]) }}">View</a>
                        <a href="{{ route('follow', ['id' => $user->id]) }}" class="pull-right">Follow</a>
                    </div>
                </div><br>
                <!-- END Article -->
                @endforeach
            @endif
            
            
        </div>
        
    </div>
</div>
@endsection
