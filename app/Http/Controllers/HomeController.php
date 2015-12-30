<?php

namespace App\Http\Controllers;

use App\Repositories\EmployeeRepository;

class HomeController extends Controller {
	
	public function index()
	{
		return redirect()->route('employee.index');
	}

	public function statistics()
	{

		$repo = new EmployeeRepository();

		$data = [
			'sex' => $repo->sexStats(),
			'salary' => $repo->salaryRanges(),
			'dates' => $repo->registerDates()
		];

		dd($data);

		return view('statistics')->withStats($data);
	}

}
