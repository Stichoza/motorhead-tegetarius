<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class EmployeeController extends Controller {

	/**
	 * Main page for employees
	 *
	 * @return \Illuminate\View\View
     */
	public function index()
	{
		return view('index');
	}

	/**
	 * Employee JSON
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
	public function json()
	{
		return Employee::all()->map(function($item, $key) {
			$item->sex = [
				'female' => '<i class="fa fa-fw fa-female"></i> მდედრ.',
				'male'   => '<i class="fa fa-fw fa-male"></i> მამრ.'
			][$item->sex];

			$item->actions = view('partials.actions')->withId($item->id)->render();

			return $item;
		});
	}

	/**
	 * Employee creation route
	 *
	 * @return \Illuminate\View\View
     */
	public function create()
	{
		return view('create');
	}

	public function edit($id)
	{
		# code...
	}

}
