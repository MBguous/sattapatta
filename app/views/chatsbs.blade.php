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

                        {{-- @if() --}}
                        <div class="row">
                            <li class="{{ $chat->user_id == Auth::user()->id ? '' : 'pull-right'}}">
                                {{ HTML::image($chat->user->photoURL, 'profile-pic', ['width'=>'26px', 'class'=>'img-circle']) }}
                                <strong>{{ $chat->user->username }}</strong>
                                <div class="message">{{ $chat->content }}</div>
                            </li>
                        </div>
                       {{--  @else
                            <li class="pull-right">
                                <img src="'+msg.client.data.user_portrait+'" class="img-circle" width="26">
                                <strong>'+msg.client.data.username+'</strong>
                                <div class="message">'+msg.client.data.message+'</div>
                             </li> --}}
            
                        {{-- @endif --}}
                        {{-- <li>
                            {{ HTML::image($chat->user->photoURL, 'profile-pic', ['width'=>'26px', 'class'=>'img-circle']) }}
                            <strong>{{ $chat->user->username }}</strong>
                            <div class="message">
                                {{ $chat->content }}
                            </div>
                        </li> --}}
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

<script>
    
    var user_id = {{ Auth::user()->id }};
    var username = "{{ Auth::user()->username}}";
    var photoUrl = "{{ Auth::user()->photoURL}}";

</script>

{{ HTML::script('js/chatsbs.js') }}

@stop