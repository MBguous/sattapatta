<?php

class MessageController extends BaseController {

	public function composeMessage($username) {
		return View::make('users.composeMessage')->withUsername($username);
	}

	public function sendMessage($username)
	{

		DB::beginTransaction();
			
		$message = array(
			'title'			=> Input::get('title'),
			'content'		=> Input::get('content'),
			'date'			=> date('Y-m-d'),
			'time'			=> date('H:i:s'),
			'sender_id'	=> Auth::user()->id
		);

		$id = DB::table('messages')->insertGetId($message);
		$receiver= User::where('username', $username)->first();

		$messageUser = array(
			'message_id'		=> $id,
			'receiver_id'		=> $receiver->id
		);

		$insertMessage = DB::table('messages_users')->insert($messageUser);

		if (!$id and !$insertMessage) {
			DB::rollback();
			return Redirect::back()->withUsername($username)->withMessage('Message to '.$username.' failed');
		}
		else {
			DB::commit();
			return Redirect::back()->withUsername($username)->withMessage('Message sent to '.$username);
		}
	
	}

}