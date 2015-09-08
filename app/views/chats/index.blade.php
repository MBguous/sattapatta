@extends('layouts.master')

@section('content')

{{-- <div class="chat">
	<div class="title">Chat with me</div>
	<div class="chat-box">
		<div class="messages"></div>
		<textarea class="entry" placeholder="Enter your message..."></textarea>
	</div>
</div> --}}

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default chat">
				<div class="panel-heading">
					<h6>Chat</h6>
				</div>
				<div class="panel-body" id="chatbox">
					{{-- <div class="message"></div> --}}
				</div>
				<div class="panel-footer">
				{{ Form::textarea('entry', null, ['class'=>'form-control chat-entry', 'rows'=>2, 'placeholder'=>'Enter your message...']) }}
				</div>
			</div>
		</div>
	</div>
@stop