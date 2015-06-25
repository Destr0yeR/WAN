<?php

class ScheduleController extends BaseController {

	public function create() {
		$input = Input::all();

		$response = $this->__create($input);

		return Response::json($response, $response['status']['code']);
	}

	public function __create($input) {

		$response['status'] = array();
		$response['status']['code'] = 400;
		$response['status']['message'] = 'Bad Request';


		$validator = $this->verify_Input($input);


		if($validator->passes())
		{
			$time_departure_time = strtotime($input['departure_time']);
			$time_arrival_time = strtotime($input['arrival_time']);

			$schedule = new Schedule;

			$schedule->departure_time 		= $input['departure_time'];
			$schedule->arrival_time 		= $input['arrival_time'];
			$schedule->departure_airport 	= $input['departure_airport'];
			$schedule->arrival_airport 		= $input['arrival_airport'];
			$schedule->price 				= $input['price'];
			$schedule->porcentage		 	= $input['porcentage'];
			$schedule->max_days			 	= $input['max_days'];
			$schedule->airplane_id 			= $input['airplane_id'];
			$schedule->save();
			

			$response['status']['code'] = 200;
			$response['status']['message'] = 'OK';
			$response['status']['description'] = ['Operation successful'] ;
		}
		else
		{
			$response['status']['description'] = $validator->messages();
		}

		return $response;
	}

	public function verify_Input($input){
		$validator = Validator::make($input,array(
			'departure_time' 	=> 'required|date_format:H:i',
			'arrival_time' 		=> 'required|date_format:H:i',
			'airplane_id' 		=> 'required|exists:airplanes,id',
			'max_days' 			=> 'required|integer|min:'.Config::get('constants.max_days'),
			'departure_airport' => 'required|exists:airports,id' ,
			'arrival_airport' 	=> 'required|exists:airports,id|different:departure_airport',
			'porcentage' 		=> 'required|numeric|min:'.Config::get('constants.porcentage'),
			'price' 			=> 'required|numeric|min:'.Config::get('constants.price')
		));
		return $validator;
	}

	public function index() {
		$schedules = Schedule::paginate(Config::get('pagination'));

		$data = [
			'schedules' => $schedules,
			'search'	=> false
		];

		return View::make('backend.schedule.index', $data);
	}

	public function newSchedule() {

		$countries = Country::lists('name', 'id');
		$airplanes = Airplane::lists('model', 'id');


		$data = [
			'countries' => [0 => 'Seleccione un pais'] + $countries,
			'airplanes' => $airplanes
		];

		return View::make('backend.schedule.create', $data);
	}

	public function newStore() {
		$input = Input::all();
		$result = $this->__create($input);
		
		if($result['status']['code'] == 400){

			return Redirect::back()->withErrors($result['status']['description']);
		}
		else{

			return Redirect::back()->with('message', 'Se creo el nuevo horario');
		}
	}

	public function editSchedule() {

		$countries = Country::lists('name', 'id');
		$airplanes = Airplane::lists('model', 'id');


		$data = [
			'countries' => [0 => 'Seleccione un pais'] + $countries,
			'airplanes' => $airplanes
		];

		return View::make('backend.schedule.create', $data);
	}

	public function updateStore() {
		$input = Input::all();
		$result = $this->__create($input);
		
		if($result['status']['code'] == 400){

			return Redirect::back()->withErrors($result['status']['description']);
		}
		else{

			return Redirect::back()->with('message', 'Se creo el nuevo horario');
		}
	}
}