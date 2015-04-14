<?php

class Notification extends \Eloquent {
	protected $fillable = ['notification_type', 'content', 'read', 'link', 'user_id'];

	public function user() {
		return $this->belongsTo('User');
	}
}