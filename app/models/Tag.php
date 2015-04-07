<?php

class Tag extends \Eloquent {
	protected $fillable = ['name'];

	public function items() {
		return $this->belongsToMany('Item');
	}
}