<?php

/*************** Custom helper functions *****************/

/*
|--------------------------------------------------------------------------
| Detect Active Route
|--------------------------------------------------------------------------
|
| Compare given route with current route and return output if they match.
| Very useful for navigation, marking if the link is active.
|
*/
function isActiveRoute($route, $output = "btn-orange")
{
    if (Route::currentRouteName() == $route) 
    	return $output;
}

/*
|--------------------------------------------------------------------------
| Detect Active Routes
|--------------------------------------------------------------------------
|
| Compare given routes with current route and return output if they match.
| Very useful for navigation, marking if the link is active.
|
*/
function areActiveRoutes(Array $routes, $output = "active")
{
    foreach ($routes as $route)
    {
        if (Route::currentRouteName() == $route) return $output;
    }

}

/* Get chatroom id if any */
function getChatroomId($user1_id, $user2_id)
{
	// $user1 = User::find($user1_id);
	// $user2 = User::find($user2_id);

	// find the chatroom
	$chatroom = Chatroom::where([
						'user1_id' => $user1_id, 
						'user2_id' => $user2_id
					])
					->orWhere([
						'user1_id' => $user2_id, 
						'user2_id' => $user1_id
					])
					->first();

	// create the chatroom if none
	if ($chatroom == NULL) {
		$chatroom = Chatroom::create([
							'user1_id' => $user1_id,
							'user2_id' => $user2_id
						]);
	}

	// if($chatroom)
	// {
		$chatroomId = $chatroom->id;
	// }
	// else
	// 	$chatroomId = 0;

	return $chatroomId;
}