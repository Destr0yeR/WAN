<?php

class AirportController extends BaseController {

	public function search(){

		$response['status'] = array();

		$input = Input::all();
		
		if(isset($input['search_text']))
		{
			$results = Airport::whereHas('city.country', function($q)use($input){
				$q 	->where('countries.name', 'LIKE','%'.$input['search_text'].'%')
					->orWhere('cities.name', 'LIKE', '%'.$input['search_text'].'%');
			})->orWhere('name', 'LIKE', '%'.$input['search_text'].'%')->get();

			$airports = array();

			foreach ($results as $result) {
				$airports[] = $this->format_aiport($result);
			}

			$response['airports'] = $airports;
			$response['status']['code'] = 200;
			$response['status']['message'] = 'OK';
			$response['status']['description'] = 'Operation successful';
		}
		else
		{
			$response['status']['code'] = 400;
			$response['status']['message'] = 'Bad request';
			$response['status']['description'] = 'Missing search_text parameter.';
		}
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