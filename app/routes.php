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

//backend

Route::group(array('prefix' => 'api'), function(){
	
	Route::get('/flights/search', array('as' => 'search.flights', 'uses' => 'SearchController@search'));
	Route::get('/flights/seats', array('as' => 'search.seats', 'uses' => 'SearchController@searchSeats'));
	Route::get('/airports/search', array('as' => 'list.airports', 'uses' => 'AirportController@search'));
	Route::post('/schedules/new', array('as' => 'schedules.store', 'uses' => 'ScheduleController@create'));

	Route::post('/flights/passengers', array('as' => 'passengers.flights', 'uses' => 'PassengerController@register'));
});




//front
Route::group(array(), function(){
	Route::get('/', array('as' => 'index', 'uses' => 'HomeController@index'));
	Route::get('/results', array('as' => 'results', 'uses' => 'HomeController@results'));
	Route::get('/home', array('as' => 'index', 'uses' => 'HomeController@home'));
	Route::get('/details', array('as' => 'details', 'uses' => 'HomeController@details'));
	Route::get('/seats', array('as' => 'seats', 'uses' => 'HomeController@seats'));
	Route::get('/passengers', array('as' => 'passengers', 'uses' => 'HomeController@passengers'));
});

