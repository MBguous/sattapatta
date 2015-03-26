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

Route::group(array('before'=>'csrf'), function(){
	Route::post('login', array('as' => 'login.post', 'uses' => 'AuthController@postLogin'));
	Route::post('accounts/create', array('as' => 'accounts.create.post', 'uses' => 'AccountController@postRegister'));
});
Route::get('login', array('as' => 'login','uses' => 'AuthController@getLogin'));


Route::get('hybridauth/{auth?}', array('as' =>'hybridauth', 'uses' => 'AuthController@getSocialLogin'));

Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

Route::get('accounts/create', array('as' => 'accounts.create', 'uses' => 'AccountController@create'));
Route::get('accounts/activate/{code}', array('as' => 'accounts.activate', 'uses' => 'AccountController@activate'));
Route::get('mail/{email}', array('as'=>'mail', 'uses'=>'AccountController@sendMail'));

Route::group(array('before'=>'auth'), function() {
	Route::get('users/dashboard', array('as'=>'users.dashboard', 'uses'=>'UserController@showDashboard'));
	Route::get('users/profile', array('as'=>'users.profile', 'uses'=>'UserController@showProfile'));
	Route::post('users/profile/image', array('as'=>'post.users.profile', 'uses'=>'UserController@editProfileImage'));
	Route::post('users/profile/info', array('as'=>'post.users.profile.info', 'uses'=>'UserController@editProfileInfo'));
	Route::get('users/post', array('as'=>'users.post', 'uses'=>'ItemController@showPostItem'));
	Route::post('users/post', array('as'=>'post.users.post', 'uses'=>'ItemController@postItem'));
	Route::get('users/listing', array('as'=>'users.listing', 'uses'=>'ItemController@showListing'));
});

Route::get('items/browse', array('as'=>'items.browse', 'uses'=>'ItemController@browse'));

Route::get('jpt', function() {
	return View::make('jpt');
});
Route::get('jpt/get', function(){
	if (Request::ajax()){
		return 'ajax get request';
	}
});
Route::post('jpt/get', function(){
	if (Request::ajax()) {
		var_dump(Input::all());
		return 'ajax post request';
		// return Response::json(Input::all());
	}
});
Route::post('users/profile/info-inactive', function(){
	if (Request::ajax()) {
		$inputData = Input::get('formData');
		parse_str($inputData, $formFields);
		// dd($formFields['gender']);
		$userData = array(
			'username' => $formFields['username'],
			// 'email' => $formFields['email'],
			'firstName' => $formFields['firstName'],
			'lastName' => $formFields['lastName'],
			// 'gender' => $formFields['gender'],
			'birthDay' => $formFields['birthDay'],
			'birthMonth' => $formFields['birthMonth'],
			'birthYear' => $formFields['birthYear'],
			'phone' => $formFields['phone'],
			'address' => $formFields['address'],
			'country' => $formFields['country'],
		);
		// dd($userData);
		// var_dump(Input::all());
		// var_dump($inputData);

		$rules = [
		'username'	=> 'max:20|min:3|unique:users',
		'email'			=> 'email|max:50|unique:users',
		'firstName'	=> 'string',
		'lastName'	=> 'string',
		'gender'		=> 'string',
		'birthDay'	=> 'integer',
		'birthMonth'=> 'integer',
		'birthYear'	=> 'integer',
		'phone'			=> 'string',
		'address'		=> 'string',
		'country'		=> 'string'
		];

		$validator = Validator::make($userData,$rules);
    if($validator->fails()) {
        return Response::json(array(
            'fail' => true,
            'errors' => $validator->getMessageBag()->toArray()
        ));
     }
		return 'ajax post request';
		// return Response::json(Input::all());
	}
});