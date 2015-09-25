<?php
class UserController extends BaseController {

	public function showDashboard($username) {
		return View::make('users.dashboard');
	}

	public function showProfile($username) {

		if(Auth::user() == $username) {
			$user = Auth::user();
			$items = Item::where('user_id', Auth::user()->id)->get();
		}
		else {
			$user = User::where('username', $username)->first();
			$items = Item::where('user_id', $user->id)->get();
		}

		// calculate profile completeness
		$pc = 0;

		if($user->username != NULL){
			$pc+=10;
		}
		if($user->email != NULL){
			$pc+=10;
		}
		if($user->firstName != NULL){
			$pc+=10;
		}
		if($user->lastName != NULL){
			$pc+=10;
		}
		if($user->gender != NULL){
			$pc+=10;
		}
		if($user->birthDay != NULL and $user->birthMonth != NULL and $user->birthYear != NULL){
			$pc+=10;
		}
		if($user->phone != NULL){
			$pc+=10;
		}
		if($user->address != NULL){
			$pc+=10;
		}
		if($user->country != NULL){
			$pc+=10;
		}
		if($user->photoURL != 'images/male.png'){
			$pc+=10;
		}

		// online status
		$beforeTime = Carbon::now()->subMinutes(5);

		$lastSeen = User::whereId($user->id)->pluck('last_seen');

		$onlineStatus = $beforeTime->lt($lastSeen);

		// watchlist items
		if(Auth::check()) {
			$watchlist_items = Auth::user()->watchlist->all();
		}
		else {
			$watchlist = 0;
		}

		// user reviews
		// if (Auth::check()) {
		// 	$reviews = Review::where('reviewee_id', Auth::user()->id)->get();
		// }
		// else {
		$reviews = Review::where('reviewee_id', $user->id)->orderBy('created_at', 'desc')->get();
		// dd($reviews->user);
		// }

		
		$avg = Review::where('reviewee_id', $user->id)->avg('rating');
		$avg = (int)$avg;
      // dd($avg);
		
		return View::make('users.profile', compact('items', 'pc', 'watchlist_items', 'reviews', 'avg', 'onlineStatus'))->withUser($user);
	}

	public function editProfileImage() {

		$validator = Validator::make(Input::all(), User::$image_rules);

		if($validator->passes()) {
			$user           = Auth::user();
			$image          = Input::file('photoURL');
			$filename       = date('Y-m-d-H-i-s').'-'.$image->getClientOriginalName();
			
			$path           = public_path().'/images/users/';
			$image->move($path, $filename);
			
			$user->photoURL = 'images/users/'.$filename;
			$user->save();

			return Redirect::back()->withMessage('Profile image changed successfully.');
		}

		return Redirect::back()->withMessage('Image upload failed. Please try again.');
	}

	public function editProfile()
	{
		$inputs = Input::all();
		// dd($inputs);
		$user = User::find($inputs['pk']);

		$data = array(
			$inputs['name'] => $inputs['value']
			);

		$edit_rules = [
			'username'		=> 'max:20|min:3|unique:users',
			'email'			=> 'email|max:50|unique:users,email,'.$user->id,
			'firstName'		=> 'string|max:50',
			'lastName'		=> 'string|max:50',
			'gender'			=> 'string',
			'birthDay'		=> 'integer',
			'birthMonth'	=> 'integer',
			'birthYear'		=> 'integer',
			'phone'			=> 'string',
			'address'		=> 'string',
			'country'		=> 'string'
		];
		
		$validator = Validator::make($data, $edit_rules);
		if ($validator->passes())
		{
			$user->$inputs['name'] = $inputs['value'];

			if ($user->save())
				return Response::make('', 200);
		}
		return Response::make($validator->messages()->first($inputs['name']), 400);
		
	}

	public function editProfileInfo($username) {


		if (Request::ajax()) {
		// $inputData = Input::get('formData');
		// parse_str($inputData, $formFields);
			$username = Input::get('username');
		// $userData = array(
		// 	'username'   => $formFields['username'],
		// 	'firstName'  => $formFields['firstName'],
		// 	'lastName'   => $formFields['lastName'],
		// 	'birthDay'   => $formFields['birthDay'],
		// 	'birthMonth' => $formFields['birthMonth'],
		// 	'birthYear'  => $formFields['birthYear'],
		// 	'phone'      => $formFields['phone'],
		// 	'address'    => $formFields['address'],
		// 	'country'    => $formFields['country'],
		// );
			$userData = array('username' => $username);

			$id = Auth::user()->id;

			$rules = [
			'username'	=> 'required|max:20|min:3|unique:users,username, '.$id,
		// 'email'			=> 'email|max:50|unique:users',
		// 'firstName'	=> 'required|string',
		// 'lastName'	=> 'required|string',
		// 'gender'		=> 'string',
		// 'birthDay'	=> 'integer',
		// 'birthMonth'=> 'integer',
		// 'birthYear'	=> 'integer',
		// 'phone'			=> 'string',
		// 'address'		=> 'string',
		// 'country'		=> 'string'
			];

			$validator = Validator::make($userData,$rules);
			if($validator->fails()) {
				return Response::json(array(
					'fail' => true,
					'errors' => $validator->getMessageBag()->toArray()
					));
			}
			else {
				if(Auth::user()->update($userData)) {
					return Response::json(array(
						'success'  => true,
						'username' => Auth::user()->username
						));
				}

			}
			
		}

	}

	public function postReview() {

		// dd(Input::all());
		Review::create([
			'comment'	=> Input::get('comment'),
			'rating'		=> Input::get('rating'),
			'reviewer_id'	=> Auth::user()->id,
			'reviewee_id'	=> Input::get('reviewee_id')
		]);

		return Redirect::back()->withMessage('User review saved.');
	}

}