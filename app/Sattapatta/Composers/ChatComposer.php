<?php

namespace Sattapatta\Composers;

use DB, Auth;

class ChatComposer 
{
	public function compose($view)
	{
		$id = Auth::user()->id;

		// get the list of id of corresponding users from chat rooms
		$chatlist = DB::table('chatrooms')->where('user1_id', $id)->lists('user2_id');

		$chatlist = array_merge($chatlist, DB::table('chatrooms')
																->where('user2_id', $id)
																->lists('user1_id'));

		// list the array of usernames for the users in chatlist
		$chatlist = DB::table('users')->whereIn('id', $chatlist)->lists('username', 'id');

		$view->with('chatlist', $chatlist);
		
	}
}