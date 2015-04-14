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
	// dd(Session::token());
	return Redirect::route('home');
});

Route::group(array('before'=>'csrf'), function(){
	Route::post('login', array('as' => 'login.post', 'uses' => 'AuthController@postLogin'));
	Route::post('accounts/create', array('as' => 'accounts.create.post', 'uses' => 'AccountController@postRegister'));
});

// Route::model('user', 'User');

Route::get('login', array('as' => 'login','uses' => 'AuthController@getLogin'));

Route::get('hybridauth/{auth?}', array('as' =>'hybridauth', 'uses' => 'AuthController@getSocialLogin'));

Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

Route::get('accounts/create', array('as' => 'accounts.create', 'uses' => 'AccountController@create'));
Route::get('accounts/activate/{code}', array('as' => 'accounts.activate', 'uses' => 'AccountController@activate'));
Route::get('mail/{email}', array('as'=>'mail', 'uses'=>'AccountController@sendMail'));

Route::post('/test', array('as'=>'search', 'uses'=>'SearchController@search'));
Route::get('/search/results', array('as'=>'search.results', 'uses'=>'SearchController@showSearchResults'));
Route::post('/search/results', array('uses'=>'SearchController@quickSearch'));

Route::group(array('before'=>'auth|session'), function() {
	Route::get('users/{username}/dashboard', array('as'=>'users.dashboard', 'uses'=>'UserController@showDashboard'));
	
	Route::post('users/profile/image', array('as'=>'post.users.profile', 'uses'=>'UserController@editProfileImage'));

	Route::post('users/{username}/profile/info', array('as'=>'post.users.profile.info', 'uses'=>'UserController@editProfileInfo'));

	// post, edit, update, show items
	Route::get('users/{username}/post', array('as'=>'items.post', 'uses'=>'ItemController@showPostItem'));
	Route::post('users/post', array('as'=>'post.users.post', 'uses'=>'ItemController@postItem'));
	Route::get('{username}/{itemname}/{itemid}/edit', array('as'=>'item.edit', 'uses'=>'ItemController@editItem'));
	Route::post('update/item/{itemid}', array('as'=>'item.update', 'uses'=>'ItemController@updateItem'));
	Route::get('users/{username}/listing', array('as'=>'users.listing', 'uses'=>'ItemController@showListing'));

	Route::get('users/messages', array('as'=>'users.messages', 'uses'=>'MessageController@message'));
	Route::get('messages/{username}', array('as'=>'compose.message', 'uses'=>'MessageController@composeMessage'));
	Route::post('messages/{username}', array('as'=>'send.message', 'uses'=>'MessageController@sendMessage'));
	Route::post('users/messages/show', array('as'=>'show.message', 'uses'=>'MessageController@showMessage'));

	Route::post('{username}/{itemname}/{itemid}', array('as'=>'post.comment', 'uses'=>'CommentController@postComment'));
	Route::post('post/offer', array('as'=>'post.offer', 'uses'=>'OfferController@postOffer'));

	Route::get('offer/{userid}/{itemid}/{response}', array('as'=>'offer.response', 'uses'=>'OfferController@getResponse'));

	Route::post('/', array('uses'=>'NotificationController@getNotification'));

	// Route::post('show', array('as'=>'show.message', 'uses'=>'MessageController@showMessage'));
});


// Route::group(array('before'=>'session'), function() {

	Route::get('users/{username}/profile', array('as'=>'users.profile', 'uses'=>'UserController@showProfile'));
	Route::get('items/browse', array('as'=>'items.browse', 'uses'=>'ItemController@browse'));
	Route::get('{username}/{itemname}/{itemid}', array('as'=>'items.show', 'uses'=>'ItemController@showItem'));
	

	// chat routes
	Route::get('chats/request/{username}', array('as'=>'chat.request', 'uses'=>'ChatController@chatRequest'));
	Route::get('chats/{username}', array('as'=>'chats', 'uses'=>'ChatController@chats'));
	Route::post('chats/sendMessage', array('uses'=>'ChatController@sendMessage'));
	Route::post('chats/isTyping', array('uses'=>'ChatController@isTyping'));
	Route::post('chats/notTyping', array('uses'=>'ChatController@notTyping'));
	Route::post('chats/retrieveChatMessages', array('uses'=>'ChatController@retrieveChatMessages'));
	Route::post('chats/retrieveTypingStatus', array('uses'=>'ChatController@retrieveTypingStatus'));

// admin routes
Route::get('admin/home', array('as'=>'admin.home', 'uses'=>'AdminController@index'));
Route::get('admin/test', array('uses'=>'AdminController@getUsers'));
// Route::get('admin/test?page=2', array('uses'=>'AdminController@paginateUsers'));
// });



Route::get('msg', function() {
	// $messageUsers = DB::table('messages_users')->where('receiver_id', Auth::user()->id)->lists('message_id');
	// $messages = DB::table('messages')->whereIn('id',$messageUsers)->get();
	// dd($messages);
	// 	foreach($messageUsers as $messageUser) {
	// 		// var_dump(DB::table('messages')->where('messages.id', $messageUser->message_id)->get());
	// 		var_dump($mid = $messageUser->message_id);
	// 	}
		// 
	return View::make('jpt');
});
Route::get('test', function(){
	// if(Session::has('_token')){
	// 	dd('true');
	// }else{
	// 	dd('false');
	// }
	// dd(User::all()->lists('username'));
	// $tag = new Tag(array('name'=>'sunglass'));
	// $tag = Tag::find(3);
	// // $item->tags()->save($tag);
	// foreach($tag->items as $item){
	// 	echo $item->name;
	
		// $tags = 'macbook,laptop';
		// $tagsarray = explode(',', $tags);
		// $item = Item::find(9);

		// for ($i=0; $i<sizeOf($tagsarray); $i++) {
		// 	$tagName = $tagsarray[$i];
		// 	$tagQuery = Tag::where('name', $tagName)->pluck('id');
		// 	// dd($tagQuery);

		// 	if ( $tagQuery == null) {
		// 		$tag = new Tag(array('name'=>$tagName));
		// 		$item->tags()->save($tag);
		// 	}
		// 	else {
		// 		$item->tags()->attach($tagQuery);
		// 	}
		
		// $chat = Chat::find(2);
		// dd($chat->username);
	
	// return $tag->items->name;
	
		$username = 'Dawson.Glover';
		$id = User::where('username', $username)->first()->id;
		$notifications = Notification::where('user_id', $id)->where('read', false)->first();
		dd($notifications->notification);
});




Route::get('users/msg/show', function(){
	if (Request::ajax()){
		return 'blah blah blah';
	}
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