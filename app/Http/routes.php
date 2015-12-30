<?php

$app->get('/', 'HomeController@index');

/*
 * The following lines could be as simple as
 * just `Route::resource('employee', 'EmployeeController')`
 * but let's stick to nikic's router. It's fast.
 */
$app->group(['prefix' => 'employee'], function ($app) {
	$app->get('/',         ['uses' => 'EmployeeController@index',   'as' => 'index']);
	$app->get('create',    ['uses' => 'EmployeeController@create',  'as' => 'create']);
	$app->post('/',        ['uses' => 'EmployeeController@store',   'as' => 'store']);
	$app->get('{id}',      ['uses' => 'EmployeeController@show',    'as' => 'show']);
	$app->get('{id}/edit', ['uses' => 'EmployeeController@edit',    'as' => 'edit']);
	$app->put('{id}',      ['uses' => 'EmployeeController@update',  'as' => 'update']);
	$app->delete('{id}',   ['uses' => 'EmployeeController@destroy', 'as' => 'destroy']);
});


