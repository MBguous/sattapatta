<?php

class Chat extends \Eloquent {

	// protected $table = 'chats';
	protected $fillable = ['content', 'user_id'];

	public function user()
	{
		return $this->belongsTo('User');
	}
}