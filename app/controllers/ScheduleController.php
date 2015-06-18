<?php

class ScheduleController extends BaseController {

	public function create() {
		$input = Input::all();

		$response['status'] = array();
		$response['status']['code'] = 400;
		$response['status']['message'] = 'Bad Request';

		$time_departure_time = strtotime($input['departure_time']);
		$time_arrival_time = strtotime($input['arrival_time']);

		$validator = $this->verify_Input($input);

		if($validator->passes())
		{

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


		return Response::json($response, $response['status']['code']);
	}

	public function verify_Input($input){
		$validator = Validator::make($input,array(
			'departure_time' => 'date_format:H:i',
			'arrival_time' => 'date_format:H:i',
			'airplane_id' => 'exists:airplanes,id',
			'max_days' => 'integer|min:'.Config::get('constants.max_days'),
			'departure_airport' => 'exists:airports,id' ,
			'arrival_airport' => 'exists:airports,id|different:departure_airport',
			'porcentage' => 'numeric|min:'.Config::get('constants.porcentage'),
			'price' => 'numeric|min:'.Config::get('constants.price')
		));
		return $validator;
	}
}