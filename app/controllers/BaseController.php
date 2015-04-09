<?php

class BaseController extends Controller {

	protected $loggedUser, $notifications;
	public function __construct(){
		if(Auth::check()){
			$this->loggedUser = Auth::user();
			$this->notifications = Notification::where('user_id', Auth::user()->id)->where('read', false)->get();
		}
		View::share(array('loggedUser'=>$this->loggedUser, 'notifications'=>$this->notifications));
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
