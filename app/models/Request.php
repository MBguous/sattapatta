<?php

class Request extends Eloquent {

	protected $table = 'requests';

	protected $fillable = ['date', 'time', 'status', 'user_id', 'item_id'];

	public function user() {
		return $this->belongsTo('User');
	}

	public function item() {
		return $this->belongsTo('Item');
	}

}