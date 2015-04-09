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

	public function editProfileInfo($username) {

		// dd('wtf');

	if (Request::ajax()) {
		// dd('wtf');
		$inputData = Input::get('formData');
		parse_str($inputData, $formFields);
		// dd($formFields['gender']);
		$userData = array(
			'username'   => $formFields['username'],
			// 'email'   => $formFields['email'],
			'firstName'  => $formFields['firstName'],
			'lastName'   => $formFields['lastName'],
			// 'gender'  => $formFields['gender'],
			'birthDay'   => $formFields['birthDay'],
			'birthMonth' => $formFields['birthMonth'],
			'birthYear'  => $formFields['birthYear'],
			'phone'      => $formFields['phone'],
			'address'    => $formFields['address'],
			'country'    => $formFields['country'],
		);
		// dd($userData);
		// var_dump(Input::all());
		// var_dump($inputData);

		$id = Auth::user()->id;

		$rules = [
		'username'	=> 'required|max:20|min:3|unique:users,username, '.$id,
		'email'			=> 'email|max:50|unique:users',
		'firstName'	=> 'required|string',
		'lastName'	=> 'required|string',
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
		else {
			// dd('validator passed');
	 		if(Auth::user()->update($userData)) {
	 			return Response::json(array(
						'success'  => true,
						'username' => Auth::user()->username
	 				));
	 		}

			// return Redirect::back()->withMessage('Profile info updated');
		}
		// return 'ajax post request';
		// return Response::json(Input::all());
    
	}


	}

}