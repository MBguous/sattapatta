<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('home', array('as'=>'home', 'uses'=>'HomeController@home'));
Route::get('/', function(){
	return Redirect::route('home');
});
//{
	// $user = User::find(1);
	// $user->password = Hash::make('123456');
	// $user->save();
	//dd($user->password);
	//return View::make('home');
//});
Route::group(array('before'=>'csrf'), function(){
	Route::post('login', array('as' => 'login.post', 'uses' => 'AuthController@postLogin'));
	Route::post('accounts/create', array('as' => 'accounts.create.post', 'uses' => 'AccountController@postRegister'));
});
Route::get('login', array('as' => 'login','uses' => 'AuthController@getLogin'));

// Route::get('twitterAuth/{auth?}', array('as' =>'twitterAuth', 'uses' => 'AuthController@getTwitterLogin'));
// Route::get('googleAuth/{auth?}', array('as' =>'googleAuth', 'uses' => 'AuthController@getGoogleLogin'));
// Route::get('facebookAuth/{auth?}', array('as' =>'facebookAuth', 'uses' => 'AuthController@getFacebookLogin'));
Route::get('hybridauth/{auth?}', array('as' =>'hybridauth', 'uses' => 'AuthController@getSocialLogin'));

Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

Route::get('accounts/create', array('as' => 'accounts.create', 'uses' => 'AccountController@create'));
Route::get('accounts/activate/{code}', array('as' => 'accounts.activate', 'uses' => 'AccountController@activate'));
Route::get('mail/{email}', array('as'=>'mail', 'uses'=>'AccountController@sendMail'));

Route::get('dashboard', array('as'=>'dashboard', 'uses'=>'UserController@showDashboard'));
Route::get('browse', function() {
	return View::make('browse');
});