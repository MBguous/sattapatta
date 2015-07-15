<?php

class AccountController extends BaseController {

	public function create(){
		return View::make('accounts.create');
	}

	public function postRegister() {
		$data = Input::all();

		$validator = Validator::make($data, User::$rules);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else {
			$code     = str_random(60);
			
			$username = Input::get('username');
			$password = Input::get('password');
			$email    = Input::get('email');
			
			$user     = User::create(array(
													'username' => $username,
													'password' => Hash::make($password),
													'email'    => $email,
													'code'     => $code,
													'active'   => 0
												));
			if ($user) {
				//send email
				Mail::send('emails.auth.activate', array(
							'link'=>URL::route('accounts.activate', $code), 
							'username'=>$username), 
							function($message) use($user) 
							{
								$message->to($user->email, $user->username)
												->subject('Activate your account');
							});

				return Redirect::intended('home')
					->withMessage('Your account has been created.
						 An activation link has been sent to your email.');
			}
		}
	}

	public function activate($code) {
		$user = User::where('code', '=', $code)->where('active', '=', 0);

		if($user->count()) {
			$user         = $user->first();
			
			$user->active = 1;
			$user->code   = '';

			if ($user->save()) {
				return Redirect::intended('home')
					->withMessage('Account activated! You can now sign in.');
			}
		}
		
		return Redirect::intended('home')
			->withMessage('Account activation failed. Please try again later.');
	}
	
}