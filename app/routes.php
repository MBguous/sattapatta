<?php
// Route::get('clockwork', function() {
// 	Clockwork::startEvent('query', 'Simple Query');
// 	$user = User::first();
// 	Clockwork::info($user);
// 	Clockwork::endEvent('query');

// 	return $user;
// });

Route::get('home', array('as'=>'home', 'uses'=>'HomeController@home'));
Route::get('/', function()
{
	// dd(Session::token());
	return Redirect::route('home');
});

Route::group(array('before'=>'csrf'), function()
{
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

/* Search routes */
// Route::post('/test', array('as'=>'search', 'uses'=>'SearchController@search'));
// Route::get('/search/results', array('as'=>'search.results', 'uses'=>'SearchController@showSearchResults'));
// Route::get('/items/browse', array('as'=>'navbar.search', 'uses'=>'SearchController@showSearchResults'));
Route::post('items/browse/search', array('uses'=>'SearchController@quickSearch'));

/* Search api routes */
// Route::get('items/browse/api/search', 'ApiSearchController@index');

/* Ajax-poll based chat */
// Route::get('/chat', ['as'=>'chat', 'uses'=>'ChatController@index']);
// Route::post('chat', 'ChatController@message');



Route::group(array('before'=>'auth|session'), function()
{
	Route::get('users/{username}/dashboard', array('as'=>'users.dashboard', 'uses'=>'UserController@showDashboard'));
	
	Route::post('users/profile/image', array('as'=>'post.users.profile', 'uses'=>'UserController@editProfileImage'));

	Route::post('users/{username}/profile/info', array('as'=>'post.users.profile.info', 'uses'=>'UserController@editProfileInfo'));
	Route::post('users/{username}/profile/edit', array('as'=>'userProfile.edit', 'uses'=>'UserController@editProfile'));
	Route::post('admin/user/edit', array('uses'=>'UserController@editProfile'));

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
	Route::post('/updateNotif	', array('uses'=>'NotificationController@updateNotification'));

	// Watchlist
	Route::post('items/browse', array('as'=>'items.browse', 'uses'=>'ItemController@addToWatchlist'));
	Route::delete('items/browse/{itemId}', ['as'=>'watchlist.destroy', 'uses'=>'ItemController@removeFromWatchlist']);
	// Route::post('show', array('as'=>'show.message', 'uses'=>'MessageController@showMessage'));

	/* Brainsocket chat */
	Route::get('chat', ['as' => 'chats.index', 'uses' => 'ChatController@index']);
	Route::get('{user1_id}/chat/{user2_id}', ['as'=>'chats.show', 'uses'=>'ChatController@show']);
	Route::get('chat/showChats', ['as'=>'chat.showChats', 'uses'=>'ChatController@showChats']);
});


// Route::group(array('before'=>'session'), function() {

	Route::get('users/{username}/profile', array('as'=>'users.profile', 'uses'=>'UserController@showProfile'));
	Route::get('items/browse', array('as'=>'items.browse', 'uses'=>'ItemController@browse'));
	Route::get('{username}/{itemname}/{itemid}', array('as'=>'items.show', 'uses'=>'ItemController@showItem'));
	

	// chat routes
	// Route::get('chats/request/{username}', array('as'=>'chat.request', 'uses'=>'ChatController@chatRequest'));
	// Route::get('chats/{username}', array('as'=>'chats', 'uses'=>'ChatController@chats'));
	// Route::post('chats/sendMessage', array('uses'=>'ChatController@sendMessage'));
	// Route::post('chats/isTyping', array('uses'=>'ChatController@isTyping'));
	// Route::post('chats/notTyping', array('uses'=>'ChatController@notTyping'));
	// Route::post('chats/retrieveChatMessages', array('uses'=>'ChatController@retrieveChatMessages'));
	// Route::post('chats/retrieveTypingStatus', array('uses'=>'ChatController@retrieveTypingStatus'));

// admin routes
Route::get('admin/home', array('as'=>'admin.home', 'uses'=>'AdminController@index'));
Route::get('admin/users', array('uses'=>'AdminController@getUsers'));
Route::get('admin/view-user', array('uses'=>'AdminController@showUser'));
// Route::get('admin/edit-user', array('uses'=>'AdminController@editUser'));
Route::post('admin/change-status', array('uses'=>'AdminController@changeStatus'));
// Route::get('admin/test?page=2', array('uses'=>'AdminController@paginateUsers'));
Route::get('admin/get-categories', array('uses'=>'AdminController@getCategories'));
Route::post('admin/save-categories', array('uses'=>'AdminController@saveCategories'));



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

Route::controller('notifications', 'PusherNotificationController');
Route::get('test', function(){

	dd(User::all()->items);

	// $message = "Pusher test";
	// Pusherer::trigger('my-channel', 'my-event', ['message'=>$message]);

	// return View::make('test');

	// Chat::create([
	// 	'content'=>'asdfasdf',
	// 	'chatroom_id'=>1,
	// 	'user_id'=>2
	// ]);
	// return 'chat created';
	
	// return Hash::make('admin');
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
	
		// $username = 'Dawson.Glover';
		// $id = User::where('username', $username)->first()->id;
		// $notifications = Notification::where('user_id', $id)->where('read', false)->first();
		// dd($notifications->notification);
		// return $test;
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