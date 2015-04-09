@extends ('layouts.master')

@section ('content')

	<div class="container">
		<div class="row">
			
			<div class="col-md-offset-4 col-md-4">
				
				<h1 id="greeting">Hello, <span id="username">{{ $loggedUser->username }}</span></h1>

				<div id="chat-window" class="col-md-12">
					
				</div>
				
				<div class="col-md-12">
		
					<div id="typingStatus" class="col-md-12" style="padding: 15px"></div>

					{{ Form::text('chat-message', null, [
						'class'       =>'form-control col-md-12', 
						'id'          =>'text', 
						'autofocus'   =>'', 
						'onblur'			=>'notTyping()',
						'placeholder' =>'Type your message']) }}
				</div>

			</div>

		</div>
	</div>

@stop