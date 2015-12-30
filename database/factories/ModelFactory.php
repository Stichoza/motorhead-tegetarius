<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Employee::class, function ($faker) {
	$sex = ['female', 'male'][rand(0, 1)];
	return [
		'name' => sprintf('%s %s', $faker->firstName($sex), $faker->lastName),
		'sex' => [
			'female' => '<i class="fa fa-fw fa-female"></i> მდედრ.',
			'male'   => '<i class="fa fa-fw fa-male"></i> მამრ.'
		][$sex],
		'position' => $faker->sentence(rand(1, 3)),
		'salary' => rand(2, 80) * 100,
    ];
});
