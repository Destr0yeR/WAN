<?php

class AuthController extends BaseController {

	public function login() {
		return View::make('backend.auth.login');
	}

	public function loginPost() {
		$input = Input::all();
		if(Auth::attempt(array('username' => $input['username'], 'password' => $input['password']))){
			echo "bien";
			return Redirect::route('schedules.index');
		}
		return Redirect::back();
	}

	public function logout() {
		Auth::logout();
		return Redirect::route('auth.login');
	}

}