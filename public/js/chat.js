var chat = {}
// var user_id = {{ Auth::user()->id }};
// chat.panelbody = $('#chatbox');
// chat.panelbody.scrollTop(chat.panelbody[0].scrollHeight);
// $('#chatbox').scrollTop = $('#chatbox').scrollHeight;
// $('#chatbox').scrollIntoView(false);
// var myDiv = $("#chatbox").get(0);
// myDiv.scrollTop = myDiv.scrollHeight;

chat.fetchMessage = function() {
	
	$.post('chat', {method: 'fetch'}, function(data) {
		$('.chat .panel-body').html(data);
	});
}

chat.throwMessage = function(message) {
	if($.trim(message).length != 0) {
        $.post('chat', {method: 'throw', message:message}, function(data) {
        	chat.fetchMessage();
			chat.entry.val('');
        });
	}
}

chat.entry = $('.chat .chat-entry');
chat.entry.bind('keydown', function(e) {
    if(e.keyCode === 13){
    	chat.throwMessage($(this).val());
    	e.preventDefault();
    }
});

// chat.interval = setInterval(chat.fetchMessage, 5000);
chat.fetchMessage();

