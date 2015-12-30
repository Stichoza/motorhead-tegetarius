<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use DB;

class HomeController extends Controller {
	
	public function index()
	{
		return redirect()->route('employee.index');
	}

	public function statistics()
	{

		$data['sex'] = Employee::sexStats();

		$data['salary'] = Employee::salaryRanges();

		$data['dates'] = Employee::registerDates();

		dd($data);

		return view('statistics')->withStats($data);
	}

}
