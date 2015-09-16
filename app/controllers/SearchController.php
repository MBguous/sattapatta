<?php

class SearchController extends BaseController {

	// public function search(){
		
	// 	if (Request::ajax()){
			
	// 		// $users = User::all()->lists('username');
	// 		$items = Item::all()->lists('name');
			
	// 		return Response::json(array('items'=>$items));
	// 	}
	// }

	public function showSearchResults() {

		$keywords = Input::get('search');
		dd($keywords);
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

		$keyword = Input::get('keyword');
		$items = Item::all();

		if ($keyword != null) {
			$items = Item::where('name', 'like', '%'.$keyword.'%')
								// ->orWhereHas('tags', function($q)
								// 	{
								// 		$q->where('name', 'like', '%'.$keyword.'%');

								// 	})
			->paginate(8);
			// var_dump($items);
			// $taggedItems = Item::has('tags', 'like', '%'.$keyword.'%' )->get();

		}
		else {
			$items = Item::all();
		}

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