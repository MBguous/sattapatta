<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	public function items()	{
		return $this->hasMany('Item');
	}

	public function messages() {
		return $this->belongsToMany('Message', 'messages_users');
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

	

	protected $fillable = ['username', 'password', 'email', 'active', 'code', 'identifier', 'photoURL', 
							'firstName', 'lastName', 'gender', 'birthday', 'birthMonth', 
							'birthYear', 'phone', 'address', 'country'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
