$(function(){

	// var fake_user_id = Math.floor((Math.random()*1000)+1);
	// var user_id = {{ Auth::user()->id }};

	//make sure to update the port number if your ws server is running on a different one.
	window.app = {};

	app.BrainSocket = new BrainSocket(
            // new WebSocket('ws://192.168.1.104:8080'),
      new WebSocket('ws://sattapatta.com:8080'),
      new BrainSocketPubSub()
   );

	app.BrainSocket.Event.listen('generic.event',function(msg){
		console.log(msg);

		if (msg.client.data.chatroom_id == chatroomId) {

			if(msg.client.data.user_id == user_id){
				$('#chat-body').prepend('<div class="row"><li><img src="http://sattapatta.com/'+photoUrl+'" class="img-circle" width="26"><strong>'+msg.client.data.username+'</strong><div class="message">'+msg.client.data.message+'</div></li></div>');
			}else{
				var str_test='<div class="row"><li class="pull-right"><img src="'+msg.client.data.user_portrait+'" class="img-circle" width="26"><strong>'+msg.client.data.username+'</strong><div class="message">'+msg.client.data.message+'</div></li></div>';
				$('#chat-body').prepend(str_test);
			}

			var audio = new Audio(root + '/media/alert.mp3');
			audio.play();
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

		if(event.keyCode === 13){

			app.BrainSocket.message('generic.event',
			{
				'message': $(this).val(),
				'user_id': user_id,
				'username': username,
				'user_portrait': 'http://sattapatta.com/'+photoUrl,
				'chatroom_id': chatroomId
			});
			$(this).val('');
			console.log('Mssg sent.');
			// console.log(data);
		}
		return event.keyCode != 13; 
	});

	/* select chatlist */
	// $('#chatlist').change(function () {
		// alert($('#chatlist').find(":selected").val());
		// window.location = '{{ URL::to("home") }}';
		// window.location = route;

		// $.post(root+'/'+user_id+'/'+'chat/'+user2_id, 
		//     {user1_id: user_id, user2_id: user2_id, function});
	// });
});