<?php

namespace App\Http\Controllers;

class EmployeeController extends Controller {
	
	public function index()
	{
		$employees = [];

		$faker = \Faker\Factory::create('ka_GE');

		for ($i = 0; $i < 300; $i++) {
			$sex = ['female', 'male'][rand(0, 1)];
			$employees[] = [
				'name' => sprintf('%s %s', $faker->firstName($sex), $faker->lastName),
				'sex' => [
					'female' => '<i class="fa fa-fw fa-female"></i> მდედრ.',
					'male'   => '<i class="fa fa-fw fa-male"></i> მამრ.'
				][$sex],
				'position' => $faker->sentence(rand(1, 3)),
				'salary' => rand(2, 80) * 100,
			];
		}

		return $employees;
	}

}
