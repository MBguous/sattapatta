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
	<div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default chatbs messenger bg-white">
            <div class="panel-heading chat-header text-white bg-gray-dark">
                Real-time Chat
                {{-- <a href="#" id="chat-toggle" class="pull-right chat-toggle">
                    <span class="glyphicon glyphicon-chevron-down"></span>
                </a> --}}
            </div>
            <div class="panel-body messenger-body open">
                <ul class="list-unstyled chat-messages" id="chat-log">
                    @forelse($chats as $chat)
                        <li>
                            {{ HTML::image($chat->user->photoURL, 'profile-pic', ['width'=>'26px', 'class'=>'img-circle']) }}
                            <strong>{{ $chat->user->username }}</strong>
                            <div class="message">
                                {{ $chat->content }}
                            </div>
                        </li>
                    @empty
                        {{ 'No messages' }}
                    @endforelse
                </ul>
                
            </div>
            <div class="panel-footer chat-footer">
                    <div class="p-lr-10">
                        <input type="text" id="chat-message"
                            class="form-control input-light input-large brad chat-search" placeholder="Your message...">
                    </div>
                </div>
        </div>
	</div>
</div>

@stop

@section('script')
    {{-- {{ HTML::script('js/chatsbs.js') }} --}}

<script>
        $(function(){
 
        // var fake_user_id = Math.floor((Math.random()*1000)+1);
        var user_id = {{ Auth::user()->id }};

        //make sure to update the port number if your ws server is running on a different one.
        window.app = {};
 
        app.BrainSocket = new BrainSocket(
                // new WebSocket('ws://192.168.1.104:8080'),
                new WebSocket('ws://sattapatta.com:8080'),
                new BrainSocketPubSub()
        );
 
        app.BrainSocket.Event.listen('generic.event',function(msg){
            console.log(msg);
            if(msg.client.data.user_id == user_id){
                $('#chat-log').prepend('<li><img src="http://sattapatta.com/{{ Auth::user()->photoURL }}" class="img-circle" width="26"><strong>'+msg.client.data.username+'</strong><div class="message">'+msg.client.data.message+'</div></li>');
            }else{
                var str_test='<li class="pull-right"><img src="'+msg.client.data.user_portrait+'" class="img-circle" width="26"><strong>'+msg.client.data.username+'</strong><div class="message">'+msg.client.data.message+'</div></li>';
                $('#chat-log').prepend(str_test);
            }
        });
 
        app.BrainSocket.Event.listen('app.success',function(data){
            console.log('An app success message was sent from the ws server!');
            console.log(data);
        });
 
        app.BrainSocket.Event.listen('app.error',function(data){
            console.log('An app error message was sent from the ws server!');
            console.log(data);
        });
 
        $('#chat-message').keypress(function(event) {
 
            if(event.keyCode == 13){
 
                app.BrainSocket.message('generic.event',
                        {
                            'message':$(this).val(),
                            'user_id':user_id,
                            'username':'{{ Auth::user()->username}}',
                            'user_portrait':'http://sattapatta.com/{{ Auth::user()->photoURL}}'
                        }
                );
                $(this).val('');
            }
            return event.keyCode != 13; }
        );
    });
</script>

@stop