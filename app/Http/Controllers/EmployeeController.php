<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class EmployeeController extends Controller {
	
	public function index()
	{
		return view('index');
	}

	public function json()
	{
		return Employee::all();
	}

	public function create()
	{
		return view('create');
	}

}
