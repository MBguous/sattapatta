@if (Auth::check())
<div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<span class="modal-title" id="myModalLabel">Chat with {{ $user->username }}</span>
			</div>
			<div class="modal-body">
				<p>Are you sure want to chat with this user?</p>
				{{ HTML::linkRoute('chats.show', 'Go ahead', ['user1'=>Auth::user()->id, 'user2'=>$user->id], ['class'=>'btn btn-sm btn-primary']) }}
				{{ HTML::link('#', 'No', array('class'=>'btn btn-sm btn-default', 'data-dismiss'=>'modal')) }}
			</div>

		</div>
	</div>
</div>
<!-- /.modal -->
@else
<div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<span class="modal-title" id="myModalLabel">
					Please {{ HTML::linkRoute('login', 'log in') }}
				</span>
			</div>
			<div class="modal-body">
				<p>You must logged in to be able to send chat requests.</p>
			</div>
		</div>
	</div>
</div>
@endif