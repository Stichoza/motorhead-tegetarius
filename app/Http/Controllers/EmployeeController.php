<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Course;
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
	public function create(Request $request)
	{
		$form = $request->session()->get('_old_input', []);
		return view('create')->withForm($form);
	}

	public function edit(Request $request, $id)
	{
		$employee = Employee::with('addresses', 'courses')->findOrFail($id);

		$modelData = $employee->toArray();

		foreach ($modelData['addresses'] as $key => $value) {
			$modelData['address'][] = $value;
		}

		foreach ($modelData['courses'] as $key => $value) {
			$modelData['course'][] = $value;
		}

		$form = array_merge($modelData, $request->session()->get('_old_input', []));

		return $request->session()->has('pop')
			? view('create')->withForm($form)
			: redirect()->route('employee.edit', ['id' => $id])
				->withInput($form)
				->withPop(true);
	}

	public function store(Request $request)
	{
        $this->validate($request, EmployeeRepository::rules($request->all()));
        $employee = EmployeeRepository::save($request->all());
		return redirect()->route('employee.show', ['id' => $employee->id]);
	}

	public function update(Request $request, $id)
	{
        $this->validate($request, EmployeeRepository::rules($request->all()));
        EmployeeRepository::save($request->all(), $id);
		return redirect()->route('employee.edit', ['id' => $id]);
	}

	public function show($id)
	{
		return Employee::findOrFail($id);
	}

}
