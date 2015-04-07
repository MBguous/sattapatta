<?php

class SearchController extends BaseController {

	public function search(){
		
		if (Request::ajax()){
			
			// $users = User::all()->lists('username');
			$items = Item::all()->lists('name');
			
			return Response::json(array('items'=>$items));
		}
	}

	public function showSearchResults() {

		$keywords = Input::get('search');
		$itemsAll = Item::all();
		$items = new \Illuminate\Database\Eloquent\Collection();

		foreach($itemsAll as $item) {
			if(Str::contains(Str::lower($item->name), Str::lower($keywords))){
				$items->add($item);
			}
		}
		// var_dump($items);
		return View::make('search')->withItems($items);
	}

	public function quickSearch() {

		$keywords = Input::get('keywords');
		$itemsAll = Item::all();
		$items = new \Illuminate\Database\Eloquent\Collection();

		foreach($itemsAll as $item) {
			if(Str::contains(Str::lower($item->name), Str::lower($keywords))){
				$items->add($item);
			}
		}
		// var_dump($items);
		return View::make('partials.showItems')->withItems($items);
	}

}