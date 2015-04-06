<?php

class SearchController extends BaseController {

	public function search(){
		
		if (Request::ajax()){
			$keywords = Input::get('keywords');
			// $users = User::all()->lists('username');
			$items = Item::all()->lists('name');
			// $searchUsers = new \Illuminate\Database\Eloquent\Collection();

			// foreach($users as $user) {
			// 	if()
			// }
			return Response::json(array('items'=>$items));
		}
	}

	public function showSearchResults() {
		return View::make('search');
	}
}