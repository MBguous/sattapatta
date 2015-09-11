@extends ('layouts.master')

@section ('content')

@section ('home-class')
""
@endsection

@section ('browse-class')
""
@endsection

@section ('chat-class')
"active"
@endsection

<div class="row">
    
    @include('users.partials.chatSidebar')

	<div class="col-md-8">
        <div class="panel panel-default chatbs">
            <div class="panel-heading form-inline">

                {{-- {{ Form::open(['route'=>['chat.show', 'user1'=>Auth::user()->id, 'user2'=>$user2->id], 'class'=>'form-inline'] ) }} --}}

                {{ Form::open(['method'=>'get', 'route'=>['chat.showChats'], 'class'=>'form-inline'] ) }}
    

                    {{ Form::label('Username') }}

                    {{-- Chat with --}}
                    {{ Form::select('chatlist', $chatlist, $user2->id, ['class'=>'form-control', 'id'=>'chatlist']) }}

                    {{ Form::submit('Start chat', ['class'=>'btn btn-primary btn-xs']) }}

                {{ Form::close() }}

            </div>
            <div class="panel-body">
                <ul class="list-unstyled chat-messages" id="chat-log">
                    @foreach($chats as $chat)

                        <div class="row">
                            <li class="{{ $chat->user->id == Auth::user()->id ? '' : 'pull-right'}}">
                                {{ HTML::image($chat->user->photoURL, 'profile-pic', ['width'=>'26px', 'class'=>'img-circle']) }}
                                <strong>{{ $chat->user->username }}</strong>
                                <div class="message">{{ $chat->content }}</div>
                            </li>
                        </div>
                       
                    @endforeach
                </ul>
                
            </div>
            
            <div class="panel-footer chat-footer">
                    <div>
                        <input type="text" id="chat-message"
                            class="form-control chat-search" placeholder="Your message...">
                    </div>
                </div>
        </div>
	</div>
</div>

@stop

@section('script')

<script>
    
    var user_id = {{ Auth::user()->id }};
    var user2_id = {{ $user2->id }};
    var username = "{{ Auth::user()->username}}";
    var photoUrl = "{{ Auth::user()->photoURL}}";
    var chatRoomId = {{ $chatRoomId }};
    var root = '{{url("/")}}';
    // var user2_id = $('#chatlist').find(":selected").val();

/*var route = "{{URL::route('chat.show', [
                        'user1' => Auth::user()->id, 
                        'user2' => "+user2_id+"
                        ])
                    }}";
    console.log(route);*/

</script>

{{ HTML::script('js/chatsbs.js') }}

@stop