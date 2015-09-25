// tooltip
$('[data-toggle="tooltip"]').tooltip();

// popover
$(function () {
	$('[data-toggle="popover"]').popover();
});

// });

// togglable side-menu
$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});


/* Initialize file-input-image-upload widget */
$(".input-image").fileinput({
	previewFileType: "image",
	browseClass: "btn btn-sm btn-o",
	browseLabel: " Pick Image",
	browseIcon: '<i class="glyphicon glyphicon-picture"></i>',
	removeClass: "btn btn-sm btn-o",
	removeLabel: " Remove",
	removeIcon: '<i class="glyphicon glyphicon-trash"></i>',
	uploadClass: "btn btn-sm btn-o",
	uploadLabel: " Upload",
	uploadIcon: '<i class="glyphicon glyphicon-upload"></i>',
});


/************ Start chat from user profile *************/

function startChat(user1_id, user2_id)
{
	
	var url = root+'/users/'+user2+'/profile/chat';

	$.get(url, {user1_id:user1_id, user2_id:user2_id}, function(markup)
	{

		$('#chat-body').html(markup);
		$('.chat-window').show();

		console.log('chat started');
		// console.log('user1-id: ' + markup);
		
	});
}




/***************** Waypoint **********************/

var $postItem = $('.post-item');

$postItem.waypoint(function(direction) {
	if(direction == 'down') {
		$postItem.addClass('animated fadeInLeft');
	}
	else {
		$postItem.removeClass('animated fadeInLeft');
	}
}, { offset: '70%' });

var $findMatch = $('.find-match');

$findMatch.waypoint(function(direction) {
	if(direction == 'down') {
		$findMatch.addClass('animated fadeInRight');
	}
	else {
		$findMatch.removeClass('animated fadeInRight');
	}
}, { offset: '70%' });

var $approveRequest = $('.approve-request');

$approveRequest.waypoint(function(direction) {
	if(direction == 'down') {
		$approveRequest.addClass('animated fadeInLeft');
	}
	else {
		$approveRequest.removeClass('animated fadeInLeft');
	}
}, { offset: '70%' });

var $tradeItem = $('.trade-item');

$tradeItem.waypoint(function(direction) {
	if(direction == 'down') {
		$tradeItem.addClass('animated fadeInRight');
	}
	else {
		$tradeItem.removeClass('animated fadeInRight');
	}
}, { offset: '70%' });

var $searchbox = $('#navbar-searchbox');

$searchbox.focus(function() {
	$searchbox.animate({
		width: "+=200"
	}, 500, function() {
    // var $state = 'animated';
 });
});

$searchbox.blur(function() {
	$searchbox.animate({
		width: "-=200"
	}, 500, function() {
    // console.log('animated');
 });
});


// $('#searchbox').selectize({
//     valueField: 'url',
//     labelField: 'name',
//     searchField: ['name'],
//     maxOptions: 10,
//     options: [],
//     create: false,
//     render: {
//         option: function(item, escape) {
//             // return '<div><img src="'+ item.icon +'">' +escape(item.name)+'</div>';
//             return '<div>' +escape(item.name)+'</div>';
//         }
//     },
//     optgroups: [
//         {value: 'item', label: 'Items'},
//         {value: 'user', label: 'Users'}
//     ],
//     optgroupField: 'class',
//     optgroupOrder: ['item','user'],
//     load: function(query, callback) {
//         if (!query.length) return callback();
//         $.ajax({
//             url: root+'/api/search',
//             type: 'GET',
//             dataType: 'json',
//             data: {
//                 q: query
//             },
//             error: function() {
//                 callback();
//             },
//             success: function(res) {
//                 console.log(res);
//                 callback(res.data);
//             }
//         });
//     },
//     onChange: function(){
//         window.location = this.items[0];
//     }
// });