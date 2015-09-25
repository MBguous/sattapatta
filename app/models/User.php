<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	protected $dates = ['last_seen'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function items()	{
		return $this->hasMany('Item');
	}

	public function messages() {
		return $this->belongsToMany('Message', 'messages_users', 'message_id', 'receiver_id');
	}

	public function comments() {
		return $this->hasMany('Comment');
	}

	public function offers() {
		return $this->hasMany('Offer');
	}

	public function notifications() {
		return $this->hasMany('Notification');
	}

	public function chats() {
		return $this->hasMany('Chat');
	}

	public function reviews() {
		return $this->hasMany('Review', 'reviewer_id');
	}

	public function watchlist() {
		return $this->belongsToMany('Item', 'watchlist')->withTimestamps();
	}

	public function online() {
		return $this->hasOne('Online');
	}

	public static $auth_rules = [
	'username' => 'required|exists:users',
	'password' => 'required'
	];

	public static $oauth_rules = [
	'email' => 'unique:users'
	];

	public static $rules = [
	'username'			=> 'required|max:20|min:3|unique:users',
	'password'			=> 'required|min:6',
	'password-again'	=> 'required|same:password',
	'email'				=> 'required|email|max:50|unique:users'
	];

	public static $image_rules = [
	'photoURL' => 'required|image|mimes:jpeg,jpg,png,gif,bmp'
	];


	protected $fillable = ['*'];


	public function getFullNameAttribute(){
		return $this->attributes['firstName'].' '.$this->attributes['lastName'];
	}

}
