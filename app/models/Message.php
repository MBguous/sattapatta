<?php

class Message extends Eloquent {

	protected $fillable = ['title', 'content', 'date', 'time', 'read_status', 'sender_id'];

	public function users() {
		return $this->belongsToMany('User');
	}

}