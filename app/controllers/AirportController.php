<?php

class AirportController extends BaseController {

	public function search(){
		$input = Input::all();

		$results = Airport::whereHas('city.country', function($q)use($input){
			$q 	->where('countries.name', 'LIKE','%'.$input['search_text'].'%')
				->orWhere('cities.name', 'LIKE', '%'.$input['search_text'].'%');
		})->orWhere('name', 'LIKE', '%'.$input['search_text'].'%')->get();

		$airports = array();

		foreach ($results as $result) {
			$airports[] = $this->format_aiport($result);
		}
		$response['airports'] = $airports;
		$response['status'] = array();
		$response['status']['code'] = 200;
		$response['status']['message'] = 'OK';
		$response['status']['description'] = 'Operation successful';
		return Response::json($response,$response['status']['code']);
	}

	public function format_aiport($airport) {
		$new = [
			'id' 		=> $airport->id,
			'name' 		=> $airport->name,
			'city'		=> $airport->city->name,
			'country'	=> $airport->city->country->name
		];

		return $new;
	}
}