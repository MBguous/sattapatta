<?php

class NotificationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /notification
	 *
	 * @return Response
	 */
	public function getNotification()

	{
		$username      = Input::get('username');
		$id            = User::where('username', $username)->first()->id;
		$notifications = Notification::where('user_id', $id)->where('read', false)->first();
		$count         = count($notifications);
		
		if ($count > 0) {
			$notification = $notifications->content;
			return Response::json(array('notification'=>$notification, 'count'=>$count));
		}
		// return Response::json(array('notifications'=>$notifications));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /notification/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /notification
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /notification/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /notification/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /notification/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updateNotification()
	{
		$id = Input::get('id');
		// return $id;
		$notification = Notification::find($id);
		if ($notification->read == false)
			$notification->read = true;
		$notification->save();
		return Response::json(array(
											'success'  => true,
											'link' =>$notification->link));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /notification/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}