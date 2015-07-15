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

		// create offer
		$offerId = DB::table('offers')->insertGetId($offer);
		$itemId  = Input::get('item');

		$offerItem = array(
			'offer_id' => $offerId,
			'item_id'  => $itemId
			);		

		$insertOffer = 	DB::table('offer_items')->insert($offerItem);

		//  item for which the offer is made
		$item = Item::where('id', Input::get('itemid'))->first();

		// create notifications
		$notification                    = new Notification();
		$notification->notification_type = 'itemOffer';
		$notification->content           = Auth::user()->username.' has sent you an offer';
		$notification->link              = URL::route('items.show', [$item->user->username, $item->name, $item->id]);
		$notification->user_id           = $item->user->id;
		$createNotification              = $notification->save();

		// check if all database inserts were successful
		if($offerId and $insertOffer and $createNotification) {
			DB::commit();
			return Redirect::back()->withMessage('Offer successfully sent.');
		}
		else {
			DB::rollback();
			return Redirect::back()->withMessage('Offer sending failed. Please try again.');
		}

		// return Redirect::back()->withMessage('Offer successfully sent');
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
			
			// create notifications
			$notification                    = new Notification();
			$notification->notification_type = 'offerAccept';
			$notification->content           = Auth::user()->username.' has accepted your offer';
			$notification->link              = URL::route('items.show', [$item->user->username, $item->name, $item->id]);
			$notification->user_id           = $item->user->id;
			// $createNotification              = $notification->save();

			if ($offer->save() and $item->save() and $offeredItem->save() and $notification->save()) {
				DB::commit();
				return Redirect::back()->withMessage('Response sent.');
			}
			else {
				DB::rollback();
				return Redirect::back()->withMessage('Response sending failed.');
			}
		}

		elseif ($response == 'rejected') {

			DB::beginTransaction();

			$item = Item::where('id', $itemId)->first();

			$offer = Offer::where('user_id', $userId)
										->where('item_id', $itemId)
										->where('status', 'pending')
										->first();
			$offer->status = 'rejected';
			// $offer->save();

			// create notifications
			$notification                    = new Notification();
			$notification->notification_type = 'offerReject';
			$notification->content           = Auth::user()->username.' has rejected your offer';
			$notification->link              = URL::route('items.show', [$item->user->username, $item->name, $item->id]);
			$notification->user_id           = $userId;
			// $notification->user_id           = $item->user->id;
			// $createNotification              = $notification->save();

			if ($offer->save() and $notification->save())
			{
				DB::commit();
				return Redirect::back()->withMessage('Response sent.');
			}
			else{
				DB::rollback();
				return Redirect::back()->withMessage('Response sending failed.');
			}
		}
	}

}