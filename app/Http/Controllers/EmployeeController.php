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
		return Employee::all();
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

}
