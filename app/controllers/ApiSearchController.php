<?php

/**
 * Api/SearchController is used for the "smart" search throughout the site.
 * it returns and array of items (with type and icon specified) so that the selectize.js plugin 
 * can render the search results properly
 **/

class ApiSearchController extends BaseController {

	public function appendValue($data, $type, $element)
	{
		// operate on the item passed by reference, adding the element and type
		foreach ($data as $key => & $item) {
			$item[$element] = $type;
		}
		return $data;		
	}

	public function appendURL($data, $prefix)
	{
		// operate on the item passed by reference, adding the url based on slug
		foreach ($data as $key => & $item) {
			$item['url'] = url($prefix.'/'.$item['name']);
		}
		return $data;		
	}

	public function index()
	{
		// Retrieve the user's input and escape it
		$query = e(Input::get('q',''));
		// $query = 'm';

		// If the input is empty, return an error response
		if(!$query && $query == '') return Response::json(array(), 400);

		// $products = Product::where('published', true)
		// 	->where('name','like','%'.$query.'%')
		// 	->orderBy('name','asc')
		// 	->take(5)
		// 	->get(array('slug','name','icon'))->toArray();

		$items = Item::where('status', 'available')
			->where('name','like','%'.$query.'%')
			->orderBy('name','asc')
			->take(5)
			->get(array('name'))->toArray();

		$users = User::where('username','like','%'.$query.'%')
			->take(5)
			->get(array('username'))
			->toArray();

		// Data normalization
		// $users = $this->appendValue($users, url('images/avatar.png'),'icon');

		// $items 	= $this->appendURL($items, 'items');
		// $users  = $this->appendURL($users, 'users');

		// Add type of data to each item of each set of results
		$items = $this->appendValue($items, 'item', 'class');
		$users = $this->appendValue($users, 'user', 'class');

		// Merge all data into one array
		// $data = array_merge($items, $users);
		$data = $items;
// dd($data);
		return Response::json(array(
			'data'=>$data
		));
	}

}