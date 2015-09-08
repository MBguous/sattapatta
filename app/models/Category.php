<?php

class Category extends \Eloquent {
	protected $fillable = ['name', 'description'];

	public function items()
	{
		return $this->belongsToMany('Item');
	}
}