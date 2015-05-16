<?php

class SearchController extends BaseController {
	
	public function search (){
		$input = Input::all();
		var_dump($input);
	}
}
