<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class EmployeeController extends Controller {
	
	public function index()
	{
		$employees = [];

		for ($i = 0; $i < 300; $i++) {
			$employees[] = factory(Employee::class)->make();
		}

		return $employees;
	}

}
