<?php

class AdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.home');
	}

	public function getUsers()
	{
		$users = User::paginate(5);
		return View::make('admin.users', compact('users'));
	}

	public function showUser()
	{
		$id = Input::get('id');
		$user = User::find($id);
		return View::make('admin.showUser', compact('user'));
	}

	public function changeStatus()
	{
		$id = Input::get('id');
		$user = User::find($id);
		if ($user->active == true)
			$user->active = false;
		else
			$user->active = true;
		$user->save();
		return $this->getUsers();
	}

	public function getCategories()
	{
		$categories = Category::all();
		return View::make('admin.getCategories', compact('categories'));
	}

	public function saveCategories()
	{
		$catName = Input::get('catName');
		$catDesc = Input::get('catDesc');

		$category = new Category(array('name'=>$catName, 'description'=>$catDesc));
		$category->save();

		return $this->getCategories();
	}

	// public function editUser()
	// {
	// 	$id = Input::get('id');
	// 	$user = User::find($id);
	// 	return View::make('admin.editUser', compact('user'));
	// }

	// public function paginateUsers()
	// {
	// 	$users = User::paginage(5);
	// 	return View::make('admin.users', compact('users'))->render();
	// }

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /admin/{id}
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
	 * GET /admin/{id}/edit
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
	 * PUT /admin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /admin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}