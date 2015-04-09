$(document).ready(function(){
	username = $('#username').html();

	// pullData();
	// getNotifications();

});

// function pullData() {

// 	getNotifications();
// 	setTimeout(pullData, 3000);
// }

function getNotifications() {

	$.post('/', {username: username}, function(data) {
		// console.log(data.notifications);
		$('#notif-badge').empty().append(data.count);
		// $('#notif-menu').css('display', 'block');
		// $('#notif-menu').append('<li><a>'+data.notification+'</a></li>');
		
		$('.container').append('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>'+data.notification+'</div>');

	// 	if (data.length > 0)
	// 		$('#chat-window').append('<br><div>'+data+'</div><br>');
	});
}