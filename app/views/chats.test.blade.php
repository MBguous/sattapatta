@extends ('layouts.master')

@section ('content')

	<div class="container">
		<div class="row">
			
			<div class="col-md-offset-4 col-md-4">
				
				<!-- <h1 id="greeting">Hello, <span id="username">{{ $loggedUser->username }}</span></h1>

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
				</div> -->
<div class="messenger bg-white">
    <div class="chat-header text-white bg-gray-dark">
        实时聊天
        <a href="#" id="chat-toggle" class="pull-right chat-toggle">
            <span class="glyphicon glyphicon-chevron-up"></span>
        </a>
    </div>
    <div class="messenger-body">
        <ul class="chat-messages" id="chat-log">

        </ul>
        <div class="chat-footer">
            <div class="p-lr-10">
                <input type="text" id="chat-message"
                    class="input-light input-large brad chat-search" autocomplete="off" placeholder="输入消息内容...">
            </div>
        </div>
    </div>
</div>


 


			</div>

		</div>
	</div>

@stop

@section ('script')
<script>

    $(document).ready(function(){

        var fake_user_id = {{ Auth::user()->id }};
        // make sure to update the port number if your ws server is running on a different one.
        window.app = {};

        app.BrainSocket = new BrainSocket(
                new WebSocket('ws://104.236.113.145:8080'),
                new BrainSocketPubSub()
        );

        app.BrainSocket.Event.listen('generic.event',function(msg){
            console.log(msg);
            if(msg.client.data.user_id == fake_user_id){
                var new_entry = '<li><img src="{{ Auth::user()->portrait_small }}" class="img-circle" width="26"><div class="message" style="min-height: 29px;">'+msg.client.data.message+'</div></li>';
                $("#chat-log").append(new_entry);
                $("#chat-log").animate({ scrollTop: 50000 }, "slow");
            }else{
                var str_test = '<li class="right"><img src="'+msg.client.data.user_portrait+'" class="img-circle" width="26"><div class="message" style="min-height: 29px;">'+msg.client.data.message+'</div></li>';
                $('#chat-log').append(str_test);
                $("#chat-log").animate({ scrollTop: 50000 }, "slow");
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

                if($('#chat-message').val() == ""){
                    event.preventDefault();
                } else {
                    app.BrainSocket.message('generic.event',
                            {
                                'message':$(this).val(),
                                'user_id':fake_user_id,
                                'user_portrait':'{{ Auth::user()->portrait_small}}'
                            }
                    );
                    $(this).val('');
                }

            }
            return event.keyCode != 13;
        });
    });
</script>

@stop