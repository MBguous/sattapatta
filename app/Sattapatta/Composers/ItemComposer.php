<?php 

namespace Sattapatta\Composers;

use DB, Auth;

class ItemComposer {

	public function compose($view)
	{
		if (Auth::check())
		{
			$watchlist = DB::table('watchlist')->whereUserId(Auth::user()->id)->lists('item_id');

			$view->with('watchlist', $watchlist);
		}
		
	}
}