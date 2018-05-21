@extends('front.frontend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       
       <div class="col-md-4">
           <div class="card">
               <div class="card-header">
                   Heading
               </div>
               <div class="card-body">
                   <ul class="list-group">
                       <li class="list-group-item"><a href="">Articles</a></li>
                       <li class="list-group-item"><a href="">Images</a></li>
                       <li class="list-group-item"><a href="">Videos</a></li>
                   </ul>
               </div>
               <div class="card-footer">
                    <ul class="list-group">
                       <li class="list-group-item"><a href="">Create Articles</a></li>
                       <li class="list-group-item"><a href="">Upload Images</a></li>
                       <li class="list-group-item"><a href="">Upload Videos</a></li>
                   </ul>
               </div>
           </div>
       </div>
       
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Index</div>

                <div class="card-body">
                   @yield('content')
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
