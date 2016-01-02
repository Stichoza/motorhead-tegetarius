<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

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
		return Employee::all()->map(function($item) {
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

	public function store(Request $request)
	{
        $this->validate($request, EmployeeRepository::$rules);
		$employee = Employee::create($request->all());
		return redirect()->route('employee.show', ['id' => $employee->id]);
	}

	public function show($id)
	{
		$employee = Employee::findOrFail($id);
		return $employee;
	}

}
