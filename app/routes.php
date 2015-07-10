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
	
	Route::get('/', array('as' => 'index.api', 'uses' => null));

	Route::get('/flights/search', array('as' => 'search.flights', 'uses' => 'SearchController@search'));
	Route::get('/flights/seats', array('as' => 'search.seats', 'uses' => 'SearchController@searchSeats'));
	Route::get('/airports/search', array('as' => 'list.airports', 'uses' => 'AirportController@search'));
	Route::post('/schedules/new', array('as' => 'schedules.store', 'uses' => 'ScheduleController@create'));

	Route::get('/country/{id}/cities', array('as' => 'country.cities', 'uses' => 'FormController@getCitiesByCountry'));
	Route::get('/city/{id}/airports', array('as' => 'country.cities', 'uses' => 'FormController@getAirportsByCity'));

	Route::post('/flights/passengers', array('as' => 'passengers.flights', 'uses' => 'PassengerController@register'));
});

	//Admin

Route::group(array('prefix' => 'back', 'before' => 'auth'), function(){

	Route::group(array('prefix' => 'schedules'), function(){
		Route::get('/', array('as' => 'schedules.index', 'uses' => 'ScheduleController@index'));
		Route::get('/create', array('as' => 'schedules.create', 'uses' => 'ScheduleController@newSchedule'));
		Route::post('/create', array('as' => 'schedules.store', 'uses' => 'ScheduleController@newStore'));
	});

	Route::group(array('prefix' => 'airports'), function(){
		Route::get('/', array('as' => 'airports.index', 'uses' => 'AirportController@index'));
		Route::get('/create', array('as' => 'airports.create', 'uses' => 'AirportController@newAirport'));
		Route::post('/create', array('as' => 'airports.store', 'uses' => 'AirportController@newStore'));
		
	});

});


Route::get('/login', array('uses' => 'AuthController@login', 'as' => 'auth.login'));
Route::post('/login', array('uses' => 'AuthController@loginPost', 'as' => 'auth.login.post'));
Route::get('/logout', array('uses' => 'AuthController@logout', 'as' => 'auth.login.logout'));



//front
Route::group(array(), function(){
	Route::get('/', array('as' => 'index', 'uses' => 'HomeController@index'));
	Route::get('/results', array('as' => 'results', 'uses' => 'HomeController@results'));
	Route::get('/home', array('as' => 'index', 'uses' => 'HomeController@home'));
	Route::get('/details', array('as' => 'details', 'uses' => 'HomeController@details'));
	Route::get('/seats', array('as' => 'seats', 'uses' => 'HomeController@seats'));
	Route::get('/passengers', array('as' => 'passengers', 'uses' => 'HomeController@passengers'));
	Route::get('/purchase', array('as' => 'purchase', 'uses' => 'HomeController@purchase'));
});


Route::post('/purchase', array('as' => 'purchase.submit' , 'uses' => 'BraintreeController@purchase'));
