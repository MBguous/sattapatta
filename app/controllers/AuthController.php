<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
class AuthController extends \BaseController implements UserInterface
{

  public function getAuthIdentifier()
  {
      return $this->getKey();
  }
  public function getAuthPassword()
  {
      return $this->password;
  }
  public function getRememberToken(){}
  public function setRememberToken($value){}
  public function getRememberTokenName(){}

	public function getLogin(){
		//dd(Hash::make('123456'));
		return View::make('login');
	}

	public function postLogin(){
		$data = Input::all();
		//$password = Hash::make($data['password']);
		//dd($password);
    // $user = User::find(1);
    // $password = $user->password;
    // if (Hash::check('123456', $data['password']))
    // {
    //   dd('match');
    // }
    // else{
    //   dd('no match');
    // }

		$validator = Validator::make($data, User::$auth_rules);
		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}

		if (Auth::attempt(array('username' => $data['username'], 'password' => $data['password'], 'active'=>1))){
      $username = Auth::user()->username;
      return Redirect::route('users.profile', array($username))->withMessage('Login success!!');
    }
    // else{
    //   echo "<pre>";
    //   print_r($data);
    // }

    // if($data['username'] == 'ramesh' and $data['password'] == '123456'){
    // 	return Redirect::intended('home')->withMessage('Login success!!');
    // }
    
    else {
      $password_error = !NULL;
      return Redirect::route('login')->with('password_error', $password_error)->withInput();
    }
    return Redirect::back()->withMessage('Error signing in!!');
  }

  // if (isset($_REQUEST["provider"])) {

  // }
  public function getSocialLogin($auth=NULL) {

    // dd($_REQUEST["provider"]);
    if (isset($_REQUEST["provider"])){
      $provider = $_REQUEST["provider"];
      // dd($provider);
    }
      if ($auth == 'auth') {
        Hybrid_Endpoint::process();
        return;
      }
      try{
        $hybridauth = new Hybrid_Auth(app_path(). '/config/oauth.php');
        $adapter = $hybridauth->authenticate($provider);
        $profile = $adapter->getUserProfile();
      }
      catch(Exception $e){
        return $e->getMessage();
      }
      // echo '<pre>';
      // var_dump($profile);
      // exit();


      $oauthUser = User::where('provider', '=', $provider)
                          ->where('identifier', '=', $profile->identifier)->first();
      // dd($oauthUser);
      if(is_null($oauthUser)) {
        // dd('no user');
        $user = new User;
        $user->provider = $provider;
        $user->identifier = $profile->identifier;
        $user->photoURL = $profile->photoURL;
        $user->username = $profile->displayName;
        $user->firstName = $profile->firstName;
        $user->lastName = $profile->lastName;
        $user->gender = $profile->gender;
        $user->birthDay = $profile->birthDay;
        $user->birthMonth = $profile->birthMonth;
        $user->birthYear = $profile->birthYear;
        $user->email = $profile->email;
        $user->phone = $profile->phone;
        $user->address = $profile->address;
        $user->country = $profile->country;
        $user->save();
        // dd($user);
        Auth::login($user);
        // $user1 = User::where('identifier', $profile->identifier)->get();
        // Auth::loginUsingId($user->getAuthIdentifier());
        return Redirect::route('users.profile', array($user->username))
          ->withMessage('Welcome '.$user->username. '. You have successfully signed in with '.$provider)
          ->withUsername($user->username); 
      }
      else {
        // dd('user');
        Auth::login($oauthUser);
        return Redirect::route('users.profile', array($oauthUser->username))
          ->withMessage('Welcome '.$oauthUser->username. '. You have successfully signed in with '.$provider)
          ->withUsername($oauthUser->username);
      }

      //return Redirect::intended('home')->withMessage('Welcome '.$profile->firstName);

    // if (isset($_REQUEST["provider"])) {
    
    // }
    // else {
    //   dd($_REQUEST);
    // }
  }

  public function getTwitterLogin($auth=NULL){
    if ($auth == 'auth'){
      Hybrid_Endpoint::process();
      return;
    }
    try{
      $oauth = new Hybrid_Auth(app_path(). '/config/twitterAuth.php');
      $provider = $oauth->authenticate('Twitter');
      $profile = $provider->getUserProfile();
    }
    catch(Exception $e){
      return $e->getMessage();
    }
    //echo '<pre>';
    //var_dump($profile);
    //exit();
    return Redirect::intended('home')->withMessage('Welcome '.$profile->firstName);
  }

  public function getGoogleLogin($auth=NULL){
    if ($auth == 'auth'){
      Hybrid_Endpoint::process();
      return;
    }
    try{
      $oauth = new Hybrid_Auth(app_path(). '/config/googleAuth.php');
      $provider = $oauth->authenticate('Google');
      $profile = $provider->getUserProfile();
    }
    catch(Exception $e){
      return $e->getMessage();
    }
    //return var_dump($profile);
    //return View::make('home')->with('profile', $profile);
    return Redirect::intended('home')->withMessage('Welcome '.$profile->displayName)->with('profile', $profile);
  }

  public function getFacebookLogin($auth=NULL){
    if ($auth == 'auth'){
      Hybrid_Endpoint::process();
      return;
    }
    try{
      $oauth = new Hybrid_Auth(app_path(). '/config/facebookAuth.php');
      $provider = $oauth->authenticate('Facebook');
      $profile = $provider->getUserProfile();
    }
    catch(Exception $e){
      return $e->getMessage();
    }
    //$profile[] = $profile->toArray();
    //convert $profile object to array
    // foreach($profile as $object)
    // {
    //   $fb_profile[] =  (array) $object;
    // }
    //dd($fb_profile);
    
    $user = new User;
    $user->identifier = $profile->identifier;
    $user->photoURL = $profile->photoURL;
    $user->displayName = $profile->displayName;
    $user->firstName = $profile->firstName;
    $user->lastName = $profile->lastName;
    $user->gender = $profile->gender;
    $user->birthDay = $profile->birthDay;
    $user->birthMonth = $profile->birthMonth;
    $user->birthYear = $profile->birthYear;
    $user->email = $profile->email;
    $user->phone = $profile->phone;
    $user->address = $profile->address;
    $user->country = $profile->country;
    $user->save();
        
    // echo '<pre>';
    // var_dump($profile);
    // exit();
    //return View::make('home')->with('profile', $profile);
    return Redirect::intended('home')->withMessage('Welcome '.$user->displayName);
  }

  public function getLogout(){
    Auth::logout();
    $hybridauth = new Hybrid_Auth(app_path(). '/config/oauth.php');
    $hybridauth->logoutAllProviders();
    // $tauth = new Hybrid_Auth(app_path(). '/config/twitterAuth.php');
    // $tauth->logoutAllProviders();
    // $gauth = new Hybrid_Auth(app_path(). '/config/googleAuth.php');
    // // $adapter->logout();
    // $gauth->logoutAllProviders();
    // //Hybrid_Provider_Adapter::logout();
    // $fbauth = new Hybrid_Auth(app_path(). '/config/facebookAuth.php');
    // $fbauth->logoutAllProviders();
    return Redirect::intended('home')->withMessage('You\'re logged out. Make sure you also log out from the site with which you logged in.');

  }
}