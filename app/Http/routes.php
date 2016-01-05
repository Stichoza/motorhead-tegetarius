<?php

$app->get('/',          ['uses' => 'HomeController@index',          'as' => 'index']);
$app->get('stats',      ['uses' => 'HomeController@statistics',     'as' => 'statistics']);
$app->get('stats/json', ['uses' => 'HomeController@statisticsJson', 'as' => 'statistics.json']);

/*
 * The following lines could be as simple as
 * just `Route::resource('employee', 'EmployeeController')`
 * but let's stick to nikic's router. It's fast.
 */
$app->group(['prefix' => 'employee', 'namespace' => 'App\Http\Controllers'], function ($app) {
	$app->get('/',          ['uses' => 'EmployeeController@index',   'as' => 'employee.index']);
	$app->get('json',       ['uses' => 'EmployeeController@json',    'as' => 'employee.json']);
	$app->get('create',     ['uses' => 'EmployeeController@create',  'as' => 'employee.create']);
	$app->post('create',    ['uses' => 'EmployeeController@store',   'as' => 'employee.store']);
	$app->get('{id}',       ['uses' => 'EmployeeController@show',    'as' => 'employee.show']);
	$app->get('{id}/edit',  ['uses' => 'EmployeeController@edit',    'as' => 'employee.edit']);
	$app->post('{id}/edit', ['uses' => 'EmployeeController@update',  'as' => 'employee.update']);
	$app->get('{id}/delete',    ['uses' => 'EmployeeController@destroy', 'as' => 'employee.destroy']);
});


