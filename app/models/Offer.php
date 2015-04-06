<?php

class Offer extends Eloquent {

	protected $table = 'offers';

	protected $fillable = ['date', 'time', 'status', 'user_id', 'item_id'];

	public function user() {
		return $this->belongsTo('User');
	}

	public function item() {
		return $this->belongsTo('Item');
	}

	public function offerItems() {
		return $this->belongsToMany('Item', 'offer_items');
	}

}