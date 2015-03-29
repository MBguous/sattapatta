<?php

class MessageController extends BaseController {

	public function message(){
		$messageUsers = DB::table('messages_users')
													->where('receiver_id', Auth::user()->id)
													->lists('message_id');
		$messages = DB::table('messages')
											->whereIn('id',$messageUsers)
											->orderBy('read_status')
											->orderBy('date', 'desc')
											->orderBy('time', 'desc')
											->get();
		return View::make('users.message')->withMessages($messages);
	}

	public function showMessage(){

		if(Request::ajax()) {
			$messageID = Input::get('data');
			// dd($messageID);
			$content = Message::where('id', $messageID)->pluck('content');
			$title = Message::where('id', $messageID)->pluck('title');
			$message = Message::where('id', $messageID)->first();
			$read_status = $message->read_status;

			if($read_status == 0) {
				$message->read_status = 1;
				$message->save();
				return Response::json(array(
					'title' => $title,
					'content' => $content,
					'update' => true
				));
			}

			// return Response::json(Input::get('data'));
			return Response::json(array(
					'title' => $title,
					'content' => $content
				));
		}
		// return View::make('users.composeMessage');
	}

	public function composeMessage($username) {

		$messageUsers = DB::table('messages_users')
													->where('receiver_id', Auth::user()->id)
													->lists('message_id');
		$messages = DB::table('messages')
											->whereIn('id',$messageUsers)
											->orderBy('read_status')
											->orderBy('date', 'desc')
											->orderBy('time', 'desc')
											->get();
		// $messageUsers = DB::table('messages_users')->where('receiver_id', Auth::user()->id)->get();
		// Message::whereIn('id',)->get();
		// foreach($messageUsers as $messageUser) {
		// 	var_dump(DB::table('messages')->where('messages.id', 'messages_users.id')->get());
		// }
		// echo '<pre>';
		// dd($messages);
		// exit;
		return View::make('users.composeMessage')->withUsername($username)->withMessages($messages);
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