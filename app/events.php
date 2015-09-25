<?php

// Event::listen('generic.event', function($client_data) {
// 	return BrainSocket::message('generic.event', array('message'=>'A message from a generic event fired in Laravel!'));
// });

Event::listen('app.success', function($client_data) {
	return BrainSocket::success(array('There was a Laravel App Success Event!'));
});

Event::listen('app.error', function($client_data) {
	return BrainSocket::error(array('There was a Laravel App Error!'));
});

// Event::listen('items.view', function(Item $item) {
// 	$item->increment('view_count');
// 	$item->view_count += 1;
// });

Event::listen('generic.event', function($client_data) {
	
	Chat::create([
		'content'=>$client_data->data->message,
		'chatroom_id'=>$client_data->data->chatroom_id,
		'user_id'=>$client_data->data->user_id
	]);
	return BrainSocket::message('generic.event', array('message'=>'Chat message persisted.'));
});

Event::listen('item.view', 'Sattapatta\Events\ViewItemHandler');

