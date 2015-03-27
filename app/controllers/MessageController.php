<?php

class MessageController extends BaseController {

	public function composeMessage($username) {
		return View::make('users.composeMessage');
	}

}