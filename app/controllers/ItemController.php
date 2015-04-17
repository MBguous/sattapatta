<?php

class ItemController extends BaseController {

	public function browse() {

		$items = Item::where('status', 'available')->orderBy('created_at', 'desc')->get();
		return View::make('browse', compact('items'));
	}

	/**
	 * Show all the details of the particular item
	 * @param  [string] $username [description]
	 * @param  [string] $itemname [description]
	 * @param  [integer] $itemid   [description]
	 * @return [type]           [description]
	 */
	public function showItem($username, $itemname, $itemid) {
		
		$swapItem = Item::where('id', $itemid)->first();
		$id       = User::where('username', $username)->pluck('id');
		$items    = Item::where('user_id', $id)->where('id', '!=', $swapItem->id)->get();

		if(Auth::check())
			$itemList = Item::where('user_id', Auth::user()->id)->lists('name', 'id');	
		else
			$itemList = null;
		
		$user            = User::where('username', $username)->first();
		$comments        = Comment::where('item_id', $itemid)->orderBy('created_at', 'desc')->get();
		// $requestCount = DB::table('offers')->where('item_id', '=', $itemid)->count();
		$offers          = Offer::where('item_id', $itemid)->where('status', 'pending')->get();
		// dd(Offer::find(3)->offerItems->first()->name);

		return View::make('items.show', compact('swapItem', 'items', 'itemList', 'user', 'comments', 'offers'));
	}

	public function editItem($username, $itemname, $itemid) {

		
		// $item = Item::where('id',$itemid)
  //          ->leftJoin('item_tag', 'items.id', '=', 'item_tag.item_id')
  //          ->first();
    
    // $item = Item::find($itemid);

// Event::listen('laravel.query', function($query)
// {
//   dd($query);
// });

// Item::where('name', $itemid);
// var_dump(Item::all()->toArray());
    // $item = Item::where('items.id', '=', $itemid)
    // 				->join('item_tag', 'items.id', '=', 'item_tag.item_id')
    // 				->join('tags', 'item_tag.tag_id', '=', 'tags.id')
    // 				->get(['tags.name']);
    // echo '<pre>';
    // dd($item);
    // exit;
    
    $item = Item::find($itemid);
		return View::make('items.edit', compact('item'));
	}


	public function showListing($username) {

		$items = Item::where('user_id', Auth::user()->id)->get();
		return View::make('users.listing', compact('items'));
	}

	public function showPostItem($username) {
		return View::make('items.post');
	}

	public function postItem() {
		
		
		// dd(count($tagsarray));

		$rules = [
		'name'        => 'required|max:60',
		'description' => 'required',
		'price'       => 'required|numeric',
		// 
		// 'tag'					=> 'unique:tags'
		];

		$messages = array(
			'price.required'    => 'If you don\'t remember the price, enter the approximate value.' ,
			// 'photoURL.required' => 'Please upload an image of the item.',
			// 'photoURL.image'    => 'You need to upload an image of filetypes: jpeg, jpg, bmp, gif or png.'
		);

		$validator = Validator::make(Input::all(), $rules, $messages);
		
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}


		$item              = new Item;
		$item->name        = Input::get('name');
		$item->description = Input::get('description');
		$item->price       = Input::get('price');
		// $item->photoURL    = 'images/items/'.$filename;
		$item->date        = date('Y-m-d');
		$item->time        = date('H:i:s');
		$item->user_id     = Auth::user()->id;
		$item->save();
		$itemId = $item->id;


		// add images
		$photos    = Input::file('images');
		foreach($photos as $photo)
		{
			$imageRules = ['imageUrl' => 'required|image|mimes:jpeg,jpg,bmp,gif,png'];
			$message = array(
				'images.required' => 'Please upload an image of the item.',
				'images.image'    => 'You need to upload an image of filetypes: jpeg, jpg, bmp, gif or png.'
			);
			$imageValidator = Validator::make(['imageUrl'=>$photo], $imageRules, $message);

			if($imageValidator->fails())
			{
				return Redirect::back()->withErrors($imageValidator)->withInput();
			}

			$filename = date('Y-m-d-His').'-'.$photo->getClientOriginalName();

			$path = public_path().'/images/items/';
			$photo->move($path, $filename);

			$image = new Image();
			$image->imageUrl = 'images/items/'.$filename;
			$image->item_id = $itemId;
			$image->save();
		}


		// add tags
		$tags = Input::get('tag');
		$tagsarray = explode(',', $tags);

		for ($i=0; $i<sizeOf($tagsarray); $i++) {
			$tagName = $tagsarray[$i];
			$tagQuery = Tag::where('name', $tagName)->pluck('id');
			if ( $tagQuery == null) {
				$tag = new Tag(array('name'=>$tagName));
				$item->tags()->save($tag);
			}
			else {
				$item->tags()->attach($tagQuery);
			}
		}

		return Redirect::back()->withMessage('Item posted successfully.');
	}

	public function updateItem($id) {

		// $images = Input::file('images');
		DB::beginTransaction();

		$rules = [
		'name'        => 'required|max:60',
		'description' => 'required',
		'price'       => 'required|numeric',
		// 
		// 'tag'					=> 'unique:tags'
		];

		$messages = array(
			'price.required'    => 'If you don\'t remember the price, enter the approximate value.' ,
			// 'images.required' => 'Please upload an image of the item.',
			// 'images.image'    => 'You need to upload an image of filetypes: jpeg, jpg, bmp, gif or png.'
		);

		$validator = Validator::make(Input::all(), $rules, $messages);
		
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$item              = Item::find($id);
		$item->name        = Input::get('name');
		$item->description = Input::get('description');
		$item->price       = Input::get('price');
		// $item->photoURL    = 'images/items/'.$filename;
		// $item->date        = date('Y-m-d');
		// $item->time        = date('H:i:s');
		// $item->user_id     = Auth::user()->id;
		$itemSave = $item->save();

		// images
		if (Input::hasFile('imageUrl'))
		{
			$photos    = Input::file('imageUrl');

			foreach($photos as $photo)
			{
				
				$imageRules = ['imageUrl' => 'image|mimes:jpeg,jpg,bmp,gif,png'];
				$message = array(
					'imageUrl.image'    => 'You need to upload an image of filetypes: jpeg, jpg, bmp, gif or png.'
				);
				$imageValidator = Validator::make(['imageUrl'=>$photo], $imageRules, $message);

				if($imageValidator->fails())
				{
					return Redirect::back()->withErrors($imageValidator)->withInput();
				}

				$filename = date('Y-m-d-His').'-'.$photo->getClientOriginalName();

				$path = public_path().'/images/items/';
				$photo->move($path, $filename);

				$image = new Image();
				$image->imageUrl = 'images/items/'.$filename;

				$itemImageSave = $item->images()->save($image);
				if (!$itemImageSave)
				{
					DB::rollback();
					return Redirect::back()->withMessage('Image upload failed. Please try again.');
				}
			}
		}

		// if tags were edited
		if (Input::has('tag'))
		{
			$tags = Input::get('tag');
			$tagsarray = explode(',', $tags);

			for ($i = 0; $i < sizeOf($tagsarray); $i++)
			{
				$tagName = $tagsarray[$i];
				$tagQuery = Tag::where('name', $tagName)->pluck('id');
				if ( $tagQuery == null) {
					$tag = new Tag(array('name'=>$tagName));
					$itemTagSave = $item->tags()->save($tag);
				}
				else {
					$itemTagSave = $item->tags()->attach($tagQuery);
				}
				if (!$itemTagSave)
				{
					DB::rollback();
					return Redirect::back()->withMessage('Item tag update failed. Please try again.');
				}
			}
		}

		if (!$itemSave)
		{
			DB::rollback();
			return Redirect::back()->withMessage('Item update failed. Please try again.');
		}
		else
		{
			DB::commit();
			return Redirect::back()->withMessage('Item updated successfully');
		}
		
	}
}