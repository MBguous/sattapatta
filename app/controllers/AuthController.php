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
    return View::make('login');
  }

  public function postLogin(){
    $data = Input::all();

    $validator = Validator::make($data, User::$auth_rules);
    if($validator->fails()){
      return Redirect::back()->withErrors($validator);
    }

    if (Auth::attempt(array(
                          'username' => $data['username'], 
                          'password' => $data['password'], 
                          'active'   =>1), 
                      true))
    {
      $username = Auth::user()->username;
      return Redirect::route('users.profile', array($username))
                            ->withMessage('Login success!!');
    }

    else 
    {
      $password_error = !NULL;
      return Redirect::route('login')
                        ->with('password_error', $password_error)
                        ->withInput();
    }
  return Redirect::back()->withMessage('Error signing in!!');
}


public function getSocialLogin($auth=NULL) {

  if (isset($_REQUEST["provider"])){
    $provider = $_REQUEST["provider"];
  }

  if ($auth == 'auth') {
    Hybrid_Endpoint::process();
    return;
  }

  try{
    $hybridauth = new Hybrid_Auth(app_path(). '/config/oauth.php');
    $adapter    = $hybridauth->authenticate($provider);
    $profile    = $adapter->getUserProfile();
  }
  catch(Exception $e){
    return $e->getMessage();
  } 

  $oauthUser = User::where('provider', '=', $provider)
  ->where('identifier', '=', $profile->identifier)
  ->first();

  if(is_null($oauthUser)) {
    
    $data = array(
      'provider' => $provider,
      'identifier' => $profile->identifier,
      'photoURL' => $profile->photoURL,
      'username'   => $profile->displayName,
      'firstName'  => $profile->firstName,
      'lastName'   => $profile->lastName,
      'gender'     => $profile->gender,
      'birthDay'   => $profile->birthDay,
      'birthMonth' => $profile->birthMonth,
      'birthYear'  => $profile->birthYear,
      'email'      => $profile->email,
      'phone'      => $profile->phone,
      'address'    => $profile->address,
      'country'    => $profile->country
      );

    $oauthRules = [
    'username' => 'unique:users',
    'email' => 'unique:users'
    ];

    $validator = Validator::make($data, $oauthRules);
    if($validator->fails()){
      return Redirect::route('home')->withMessage('Sorry! Username or Email unavailable.');
    }

    $user = User::create($data);

    Auth::login($user);

    return Redirect::route('users.profile', array($user->username))
    ->withMessage('Welcome '.$user->username. 
      '. You have successfully signed in with '.$provider)
    ->withUsername($user->username); 
  }

  else {
    Auth::login($oauthUser);
    return Redirect::route('users.profile', array($oauthUser->username))
    ->withMessage('Welcome '.$oauthUser->username. 
      '. You have successfully signed in with '.$provider)
    ->withUsername($oauthUser->username);
  }
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

  return Redirect::intended('home')->withMessage('Welcome '.$user->displayName);
}

public function getLogout(){
  Auth::logout();
  $hybridauth = new Hybrid_Auth(app_path(). '/config/oauth.php');
  $hybridauth->logoutAllProviders();

  return Redirect::intended('home')
  ->withMessage('You\'re logged out. Make sure you also 
    log out from the site with which you logged in.');
}
}