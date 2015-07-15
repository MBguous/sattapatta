<?php

class Item extends Eloquent {

	protected $fillable = ['name', 'description', 'price', 'photoURL', 'date', 'time', 'status', 'user_id', 'category_id'];

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function comments()
	{
		return $this->hasMany('Comment');
	}
	
	public function offers()
	{
		return $this->hasMany('Offer');
	}

	public function tags()
	{
		return $this->belongsToMany('Tag');
	}

	public function images()
	{
		return $this->hasMany('Image');
	}

	public function category()
	{
		return $this->belongsTo('Category');
	}
}