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
		// dd($user);
		
		return View::make('users.profile', compact('items'))->withUser($user);
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
		$user = User::find($inputs['pk']);

		$data = array(
			$inputs['name'] => $inputs['value']
		);
    
    $validator = Validator::make($data, User::$edit_rules);
    if ($validator->passes())
    {
    	$user->$inputs['name'] = $inputs['value'];
	   	// $user->save();
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

	

}