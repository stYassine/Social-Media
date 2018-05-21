@if(count($errors) > 0)
   <div class="alert alert-warning">
       <strong>Whoops Something Went Wrong</strong>
           <ul>
                @foreach($errors as $key => $error)
                    <li>{{ $key.'.'.$error }}</li>
                @endforeach
            </ul>
   </div>
@endif


<!-- User Sessions
    ================== -->
@if(Session::has('user_created'))
    <div class="alert alert-success">
        <span class="close" data-dismiss="alert"></span>
        <p>{{ Session::get('user_created') }}</p>
    </div>
@endif
@if(Session::has('user_deleted'))
    <div class="alert alert-danger">
        <span class="close" data-dismiss="alert"></span>
        <p>{{ Session::get('user_deleted') }}</p>
    </div>
@endif
@if(Session::has('user_updated'))
    <div class="alert alert-info">
        <span class="close" data-dismiss="alert"></span>
        <p>{{ Session::get('user_updated') }}</p>
    </div>
@endif







