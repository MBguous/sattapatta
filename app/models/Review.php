<?php

class Review extends \Eloquent
{
	// protected $table = 'chatrooms';

	protected $fillable = ['comment', 'rating', 'reviewer_id', 'reviewee_id'];

	// public $timestamps = false;

	public function user()
	{
		return $this->belongsTo('User', 'reviewer_id', 'id');
	}
}