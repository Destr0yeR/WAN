<?php

class ScheduleController extends BaseController {

	public function create() {
		$input = Input::all();
		var_dump($input){

		}
		$schedule = new Schedule;

		$schedule->departure_time 		= $input['departure_time'];
		$schedule->arrival_time 		= $input['arrival_time'];
		$schedule->departure_airport 	= $input['departure_airport'];
		$schedule->arrival_airport 		= $input['arrival_airport'];
		$schedule->departure_airport 	= $input['departure_airport'];
		$schedule->price 				= $input['price'];
		$schedule->porcentage		 	= $input['porcentage'];
		$schedule->max_days			 	= $input['max_days'];
		$schedule->airplane_id 			= $input['airplane_id'];
		$schedule->save();

		$response['status'] = array();
		$response['status']['message'] = 'OK';
		$response['status']['description'] = 'Operation successful';

		return Response::json($response, $response['status']['code']);
	}
}