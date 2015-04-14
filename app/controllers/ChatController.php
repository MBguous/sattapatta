<?php

class ChatController extends BaseController {

	public function chatRequest($username) {

		DB::beginTransaction();

		// create notification
		$notification                    = new Notification();
		$notification->notification_type = 'chatRequest';
		$notification->content           = $loggedUser->username.' wants to chat with you';
		$notification->link              = 'sattapatta.com/chats/';
		// $user                            = User::where('username', $user2)->first()->id;
		$notification->user_id           = User::where('username', $username)->first()->id;
		// $notification->save();

		// create chat
		$chat = new Chat();
		$chat->user1 = $loggedUser->username;
		$chat->user2 = $username;
		// $chat->save();
		// $chatId = $chat->id;
		
		if ($notification->save() and $chat->save())
		{
			DB::commit();
			return Redirect::back()->withMessage('Chat request sent.');
		}
		else
		{	
			DB::rollback();
			return Redirect::back()->withMessage('Error sending chat request. Please try again.');
		}
	}

	public function chats($username) {

		return View::make('chats')->withUsername($username);
	}

	public function sendMessage() {

		$username                     = Input::get('username');
		$text                         = Input::get('text');
		$chatMessage                  = new ChatMessage();
		$chatMessage->sender_username = $username;
		$chatMessage->message         = $text;
		$chatMessage->save();
	}

	public function isTyping() {

		$username = Input::get('username');

		$chat = Chat::find(2);
		if ($chat->user1 = $username)
			$chat->user1_is_typing = true;
		else
			$chat->user2_is_typing = true;
		$chat->save();
	}

	public function notTyping() {

		$username = Input::get('username');

		$chat = Chat::find(2);
		if ($chat->user1 = $username)
			$chat->user1_is_typing = false;
		else
			$chat->user2_is_typing = false;
		$chat->save();
	}

	public function retrieveChatMessages() {

		$username = Input::get('username');

		$message = ChatMessage::where('sender_username', '!=', $username)->where('read', '=', false)->first();

		if (count($message) > 0) {

			$message->read = true;
			$message->save();
			return $message->message;
		}
	}

	public function retrieveTypingStatus() {

		$username = Input::get('username');

		$chat = Chat::find(2);
		if ($chat->user1 == $username) {

			if($chat->user2_is_typing)
				return $chat->user2;
		}
		else {

			if ($chat->user1_is_typing)
				return $chat->user1;
		}
	}

}