<?php

class Comment extends Eloquent {

	protected $table = 'comments';

	protected $fillable = ['content', 'date', 'time', 'user_id', 'item_id'];

	public function user() {
		return $this->belongsTo('User');
	}

	public function item() {
		return $this->belongsTo('Item');
	}

}