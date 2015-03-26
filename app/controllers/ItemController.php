<?php

class ItemController extends BaseController {

	public function browse() {

		$items = Item::all();
		return View::make('browse', compact('items'));
	}

	public function showListing() {

		$items = Item::where('user_id', Auth::user()->id)->get();
		return View::make('users.listing', compact('items'));
	}

	public function showPostItem() {
		return View::make('users.post');
	}

	public function postItem() {
		
		$rules = [
		'name'	=> 'required|max:60',
		'description' =>'required',
		'price' => 'required|numeric',
		'photoURL' => 'required|image|mimes:jpeg,jpg,bmp,gif,png'
		];

		$messages = array(
			'price.required' => 'If you don\'t remember the price, enter the approximate value.' ,
	    'photoURL.required' => 'Please upload an image of the item.',
	    'photoURL.image' => 'You need to upload an image of filetypes: jpeg, jpg, bmp, gif or png.'
		);

		$validator = Validator::make(Input::all(), $rules, $messages);
		
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$image = Input::file('photoURL');
		$filename = date('Y-m-d-His').'-'.$image->getClientOriginalName();

		$path = public_path().'/images/items/';
		$image->move($path, $filename);

		$item = new Item;
		$item->name = Input::get('name');
		$item->description = Input::get('description');
		$item->price = Input::get('price');
		$item->photoURL = 'images/items/'.$filename;
		$item->date = date('Y-m-d');
		$item->time = date('H:i:s');
		$item->user_id = Auth::user()->id;
		$item->save();
		return Redirect::back()->withMessage('Item posted successfully.');
	}
}