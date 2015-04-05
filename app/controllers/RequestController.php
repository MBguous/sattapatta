<?php

class RequestController extends BaseController {

	public function postRequest() {

		DB::beginTransaction();

		$request = array(
			'date'		=> date('Y-m-d'),
			'time'		=> date('H:i:s'),
			'user_id' => Auth::user()->id,
			'item_id'	=> Input::get('itemid')
			);

		$requestId = DB::table('requests')->insertGetId($request);
		$itemId = Input::get('item');

		$requestItem = array(
			'request_id'	=> $requestId,
			'item_id'			=> $itemId
			);		

		$insertRequest = 	DB::table('request_items')->insert($requestItem);

		if(!$requestId and !$insertRequest) {
			DB::rollback();
			return Redirect::back()->withMessage('Request failed. Please try again.');
		}
		else {
			DB::commit();
			return Redirect::back()->withMessage('Request successfully sent.');
		}

		return Redirect::back()->withMessage('Request successfully sent');
	}

}