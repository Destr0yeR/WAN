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



	/////



	public function index() {
		$airports = Airport::paginate(Config::get('constants.pagination'));

		$data = [
			'airports'	=> $airports,
			'search' 	=> false
		];

		return View::make('backend.airport.index', $data);
	}

	public function newAirport() {

		$countries = Country::lists('name','id');

		$data = [
			'countries'	=> [0 =>'Seleccione un pais (No elegir si es nuevo)'] +$countries
		];

		return View::make('backend.airport.create', $data);
	}

	public function newStore() {
		$input = Input::all();

		$country = Country::find(isset($input['country'])?$input['country']:0);

		if(!$country) {
			$country = new Country;
			$country->name = $input['country_name'];

			$country->save();
		}

		$city = City::find(isset($input['city'])?$input['city']:0);

		if(!$city) {
			$city = new City;
			$city->name = $input['city_name'];
			$city->country_id = $country->id;

			$city->save();
		}


		$airport = new Airport;

		$airport->name = $input['airport_name'];
		$airport->city_id = $city->id;

		$airport->save();

		return Redirect::back()->with('message', 'Destino Creado');
	}
}