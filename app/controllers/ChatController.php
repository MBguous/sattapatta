<?php

class ChatController extends BaseController {

	public function chatRequest($user1, $user2) {

		$notification                    = new Notification();
		$notification->notification_type = 'chatRequest';
		$notification->notification      = $user1.' wants to chat with you';
		$notification->link              = 'sattapatta.com/chats/';
		$user                            = User::where('username', $user2)->first()->id;
		$notification->user_id           = User::where('username', $user2)->first()->id;
		$notification->save();

		$chat = new Chat();
		$chat->user1 = $user1;
		$chat->user2 = $user2;
		$chat->save();
		$chatId = $chat->id;

		return Redirect::back()->withMessage('Chat request sent.');
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