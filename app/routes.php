<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/flights/search', array('as' => 'search.flights', 'uses' => 'SearchController@search'));
Route::get('/flights/seats', array('as' => 'search.seats', 'uses' => 'SearchController@searchSeats'));
Route::post('/airports/search', array('as' => 'list.airports', 'uses' => 'AirportController@search'));
Route::post('/schedules/new', array('as' => 'schedules.store', 'uses' => 'ScheduleController@create'));

Route::get('/test', function(){
	$input = Input::all();

	$airport =  new Airport;

	$airport->id = 3;
	$airport->name = 'airport name';
	
	{"airport":{'id': 3, 'name': 'airport name'}}


	$object = new Object;

	$object->id = 3;
	$object->name = 'airport name';

	var_dump(json_decode($input['test_field']));

});
Route::post('/flights/passengers', array('as' => 'passengers.flights', 'uses' => 'PassengerController@register'));

