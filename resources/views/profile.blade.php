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
           
           <div class="jumbotron">
               <h4>{{ $user->name }}</h4>
               <p>{{ $user->email }}</p>
               <p>{{ $user->role->name }}</p>
               <p>
                   Followers : <span>{{ $user->followers->count() }}</span>
                @if($user->id != Auth::id())
                   
                   @if($is_auth_following)
                       <a href="{{ route('unfollow', ['id' => $user->id]) }}" class="btn btn-danger btn-sm" style="margin-left:30px; color:#FFF;">Unfollow</a>
                   @else
                       <a href="{{ route('follow', ['id' => $user->id]) }}" class="btn btn-info btn-sm" style="margin-left:30px; color:#FFF;">Follow</a>
                   @endif
                   
                @endif
               </p>
               <a href="" class="pull-right">Send Messsage</a>
               
               
           </div>
           
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                   
                   <div class="row">
                       
                       <!-- Articles Card -->
                       <div class="col-md-4">
                           <div class="card">
                               <div class="card-header">
                                   <h4>Articles</h4>
                               </div>
                               <div class="card-body">
                                   <p>{{ $articles->count() }} Articles</p>
                               </div>
                               <div class="card-footer">
                                   <a href="{{ route('profile.articles', ['id' => $user->id]) }}">View All</a>
                               </div>
                           </div>
                       </div>
                       <!-- END Articles Card -->
                       

                       <!-- Images Card -->
                       <div class="col-md-4">
                           <div class="card">
                               <div class="card-header">
                                   <h4>Images</h4>
                               </div>
                               <div class="card-body">
                                   <p>{{ $photos->count() }} Images</p>
                               </div>
                               <div class="card-footer">
                                   <a href="{{ route('profile.photos', ['id' => $user->id]) }}">View All</a>
                               </div>
                           </div>
                       </div>
                       <!-- END Images Card -->
                       

                       <!-- Videos Card -->
                       <div class="col-md-4">
                           <div class="card">
                               <div class="card-header">
                                   <h4>Videos</h4>
                               </div>
                               <div class="card-body">
                                   <p>10 Videos</p>
                               </div>
                               <div class="card-footer">
                                   <a href="">View All</a>
                               </div>
                           </div>
                       </div>
                       <!-- END Videos Card -->
                       
                       
                   </div>
                   
                   <!-- Content HERE -->
                   @include('profile_messages')
                   <!-- END Content HERE -->
                   
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
