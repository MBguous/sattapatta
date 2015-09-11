<?php

class Chat extends \Eloquent {

	// protected $table = 'chats';
	protected $fillable = ['content', 'user_id', 'chatroom_id'];

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function chatroom()
	{
		return $this->belongsTo('Chatroom');
	}
}