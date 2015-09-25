<?php

class Item extends Eloquent {

	protected $fillable = ['name', 'description', 'price', 'date', 'time', 'status', 'user_id'];

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
		return $this->belongsToMany('Category');
	}

	public function getImageUrlAttribute()
	{
		return $this->images->lists('imageUrl');
	}
}