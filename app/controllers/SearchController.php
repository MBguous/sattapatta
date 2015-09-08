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

		// Clockwork::startEvent('query', 'Simple Query');
		// $user = User::first();
		// Clockwork::info($user);
		$items = Item::where('name', 'LIKE', '%'.$keywords.'%')->get();
		// Clockwork::endEvent('query');
		
		// dd($items);

		return View::make('partials.showItems')->withItems($items);

		// $items = Item::all();
		// $tags = Tag::all();
		// $matchedItems = new \Illuminate\Database\Eloquent\Collection();

		// foreach($items as $item) {
		// 	if(Str::contains(Str::lower($item->name), Str::lower($keywords))) {
		// 		$matchedItems->add($item);
		// 	}
		// }

		// foreach($tags as $tag) {
		// 	if(Str::contains(Str::lower($tag->name), Str::lower($keywords))) {

		// 		foreach($tag->items as $item) {
		// 			$matchedItems->add($item);
		// 		}
		// 	}
		// }

		// $matchedItems = $matchedItems->unique();
		// return View::make('partials.showItems')->withItems($matchedItems);
	}

}