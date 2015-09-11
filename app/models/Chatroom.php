<?php

class Chatroom extends \Eloquent
{
	// protected $table = 'chatrooms';

	protected $fillable = ['user1_id', 'user2_id'];

	public $timestamps = false;

	public function chats()
	{
		return $this->hasMany('Chat');
	}
}