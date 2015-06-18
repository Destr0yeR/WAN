<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function index() {
		return View::make('layout.base');
	}

	public function home() {
		return View::make('search.bus01');
	}

	public function results() {
		
	}

	public function details() {
		return View::make('search.bus03');
	}

	public function seats() {
		return View::make('search.bus04');
	}
}
