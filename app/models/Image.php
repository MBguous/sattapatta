<?php

class Image extends \Eloquent {
	protected $fillable = ['imageUrl', 'item_id'];

	public static $rules = ['imageUrl' => 'required|image|mimes:jpeg,jpg,bmp,gif,png'];

	public function item()
	{
		return $this->belongsTo('Item');
	}
}