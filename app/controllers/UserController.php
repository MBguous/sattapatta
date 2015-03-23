<?php
class UserController extends BaseController {

	public function showDashboard() {
		return View::make('users.dashboard');
	}

	public function showProfile() {
		return View::make('users.profile');
	}

	public function editProfileImage() {

		$validator = Validator::make(Input::all(), User::$image_rules);

		if($validator->passes()) {
			$user = Auth::user();
			$image = Input::file('photoURL');
			$filename = date('Y-m-d-H-i-s').'-'.$image->getClientOriginalName();
			
			$path = public_path().'/images/users/';
			$image->move($path, $filename);

			$user->photoURL = 'images/users/'.$filename;
			$user->save();

			return Redirect::back()->withMessage('Profile image changed successfully.');
		}

		return Redirect::back()->withMessage('Image upload failed. Please try again.');
	}

}