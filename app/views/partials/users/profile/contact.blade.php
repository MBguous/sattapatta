@if (Auth::check())
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<span class="modal-title" id="myModalLabel">To: {{ $user->username }}</span>
			</div>
			<div class="modal-body">

				{{ Form::open(array('route'=>array('send.message', $user->username), 'class'=>'form-horizontal')) }}
				<div class="row">
					<div class="form-group">
						<div class="col-md-offset-1 col-md-10">
							{{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title']) }}
							<!-- <div class="text-danger" id="title_error">{{ $errors->first('title', ':message') }}</div> -->
							{{ $errors->first('title', '<div class="text-danger" id="title_error">:message</div>') }}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-md-offset-1 col-md-10">
							{{ Form::textarea('content', null, ['class'=>'form-control', 'placeholder'=>'Write your message']) }}
							{{ $errors->first('content', '<div class="text-danger" id="content_error">:message</div>') }}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-offset-1 col-md-10">
							{{ Form::submit('Send message', array('class'=>'btn btn-sm btn-primary')) }}
							{{ HTML::link('#', 'Close', array('class'=>'btn btn-sm btn-default', 'data-dismiss'=>'modal')) }}
						</div>
					</div>
				</div>
				{{ Form::close() }}

			</div>

		</div>
	</div>
</div>
<!-- /.modal -->
@else
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<span class="modal-title" id="myModalLabel">
					Please {{ HTML::linkRoute('login', 'log in') }}
				</span>
			</div>
			<div class="modal-body">
				<p>You must logged in to be able to send messages.</p>
			</div>
		</div>
	</div>
</div>
@endif