<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use DB;

class HomeController extends Controller {
	
	public function index()
	{
		return redirect()->route('employee.index');
	}

	public function statistics()
	{

		$repo = new EmployeeRepository(app());

		$data['sex'] = $repo->sexStats();

		$data['salary'] = $repo->salaryRanges();

		$data['dates'] = $repo->registerDates();

		dd($data);

		return view('statistics')->withStats($data);
	}

}
