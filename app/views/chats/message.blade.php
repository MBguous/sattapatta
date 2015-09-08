@forelse($chats as $chat)
	<div class="chat-body">
		{{ HTML::image($chat->user->photoURL, 'profile-pic', ['height'=>'47px', 'class'=>'img-circle']) }}
		<div class="message">
			<span>
				{{ HTML::linkRoute('users.profile', $chat->user->username, $chat->user->first()->username) }}:
				{{-- {{ $chat->user->first()->username }} --}}
			</span>
			
			<span>
				{{ $chat->content }}
			</span>
			<span class="pull-right diff">
				<i>{{ $chat->created_at->diffForHumans() }}</i>
			</span>
		</div>
	</div>
@empty
	{{ 'No messages' }}
@endforelse