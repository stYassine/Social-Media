<h1>Messages</h1>
<div class="card">
    <div class="card-header">
        
    </div>
    <div class="card-body">
        @if(isset($messages))
               <ul class="list-group">
            @foreach($messages as $message)
                <li class="list-group-item {{ $message->user_id == Auth::id() ? 'pull-right' : ''  }}">{{ $message->body }}</li>
            @endforeach
                </ul>
        @endif
    </div>
    <div class="card-footer">
        <form action="{{ route('message') }}" method="post">
            {{ csrf_field() }}
            
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <input type="hidden" name="sender_id" value="{{ Auth::id() }}">

            <div class="form-group">
                <textarea name="body" id="" rows="5" class="form-control"></textarea>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-info">Send</button>
            </div>
            
        </form>
    </div>
</div>