<?php

class Item extends Eloquent {

	protected $fillable = ['name', 'description', 'price', 'photoURL', 'date', 'time', 'status', 'user_id'];

	public function user() {
		return $this->belongsTo('User');
	}
	
}