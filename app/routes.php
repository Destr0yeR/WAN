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

Route::post('/flights/search', array('as' => 'search.flights', 'uses' => 'SearchController@search'));
Route::post('/airports/search', array('as' => 'list.airports', 'uses' => 'AirportController@search'));
Route::post('/schedules/new', array('as' => 'schedules.store', 'uses' => 'ScheduleController@create'));