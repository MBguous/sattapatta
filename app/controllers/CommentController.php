<?php

class CommentController extends BaseController {

	public function postComment($username, $itemname, $itemid) {

		// $itemId = Input::get('itemid');
		// dd(Input::get('itemid'));
		// dd($username.' - '.$itemname.' - '.$itemid);
		$comment = new Comment();
		$comment->content = Input::get('comment');
		$comment->date = date('Y-m-d');
		$comment->time = date('H:i:s');
		$comment->user_id = Auth::user()->id;
		$comment->item_id = $itemid;
		$comment->save();

		$swapItem = Item::where('id', $itemid)->first();
		$items = Item::where('user_id', Auth::user()->id)->lists('name', 'id');
		$user = User::where('username', $username)->first();
		$comments = Comment::where('id', $itemid)->get();

		return Redirect::back()->withMessage('Comment posted');
	}

}