<?php

class OfferController extends BaseController {

	/**
	 * Send request
	 * @return [type] [description]
	 */
	public function postOffer() {

		DB::beginTransaction();

		$offer = array(
			'date'		=> date('Y-m-d'),
			'time'		=> date('H:i:s'),
			'user_id' => Auth::user()->id,
			'item_id'	=> Input::get('itemid')
			);

		$offerId = DB::table('offers')->insertGetId($offer);
		$itemId = Input::get('item');

		$offerItem = array(
			'offer_id'	=> $offerId,
			'item_id'			=> $itemId
			);		

		$insertOffer = 	DB::table('offer_items')->insert($offerItem);

		if(!$offerId and !$insertOffer) {
			DB::rollback();
			return Redirect::back()->withMessage('Offer failed. Please try again.');
		}
		else {
			DB::commit();
			return Redirect::back()->withMessage('Offer successfully sent.');
		}

		return Redirect::back()->withMessage('Offer successfully sent');
	}


	public function getResponse($userId, $itemId, $response) {

		if ($response == 'accepted') {

			DB::beginTransaction();
			$offer = Offer::where('user_id', $userId)->where('item_id', $itemId)->first();
			$offer->status = 'accepted';
			// $offer->save();

			$item = Item::where('id', $itemId)->first();
			$item->status = 'unavailable';
			// $item->save();

			$offeredItem = $offer->offerItems->first();
			$offeredItem->status = 'unavailable';
			// $offeredItem->save();

			if ($offer->save() and $item->save() and $offeredItem->save()) {
				DB::commit();
				return Redirect::back()->withMessage('Response sent.');
			}
			else {
				DB::rollback();
				return Redirect::back()->withMessage('Response sending failed.');
			}
		}

		elseif ($response == 'rejected') {

			$offer = Offer::where('user_id', $userId)->where('item_id', $itemId)->first();
			$offer->status = 'rejected';
			$offer->save();
			return Redirect::back()->withMessage('Response sent.');
		}
	}

}