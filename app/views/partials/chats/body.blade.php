
{{ $chatroomId }}
{{ $user1->username }}
{{ $user2->username }}

@forelse($chats as $chat)

	<div class="row">
		<li class="{{ $chat->user->id == Auth::user()->id ? '' : 'pull-right'}}">
			{{ HTML::image($chat->user->photoURL, 'profile-pic', ['width'=>'26px', 'class'=>'img-circle']) }}
			<strong>{{ $chat->user->username }}</strong>
			<div class="message">{{ $chat->content }}</div>
		</li>
	</div>

@empty
	Start chatting now!

@endforelse

@section ('chat-scripts')
	
	<script>
		var chatroomId = {{ $chatroomId }};
	</script>

@stop