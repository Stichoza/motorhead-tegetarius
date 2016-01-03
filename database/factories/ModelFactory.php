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

$factory->define(App\Models\Employee::class, function ($faker) {

	$faker = Faker\Factory::create('ka_GE');

	$sex = ['female', 'male'][🎰(0, 1)];

	return [
		'name' => sprintf('%s %s', $faker->firstName($sex), $faker->lastName),
		'sex' => $sex,
		'position' => $faker->sentence(🎰(1, 3)),
		'salary' => 🎰(1, 30) * 100,
    ];

});
