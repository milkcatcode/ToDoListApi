<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
});

Route::group(['prefix' => 'api'], function () {

	Route::group(['prefix' => 'list'], function () {
		
		
		Route::get('', ['uses' => 'ToDoListController@allLists']);
		
		Route::get('{id}', ['uses' => 'ToDoListController@getList']);
		
		Route::group([
			'middleware' => 'auth:api'
		], function() {
			
			Route::post('', ['uses' => 'ToDoListController@saveList']);
		
			Route::put('{id}', ['uses' => 'ToDoListController@updateList']);
		
			Route::delete('', ['uses' => 'ToDoListController@delAllLists']);
		
			Route::delete('{id}', ['uses' => 'ToDoListController@delList']);
		});
		
	});
	
});
