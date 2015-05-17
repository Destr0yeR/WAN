<?php

class ScheduleController extends BaseController {

	public function create() {
		$input = Input::all();

		$response['status'] = array();
		$response['status']['code'] = 400;
		$response['status']['message'] = 'Bad Request';

		$time_departure_time = strtotime($input['departure_time']);
		$time_arrival_time = strtotime($input['arrival_time']);

		if($time_departure_time < $time_arrival_time)
		{
			$airplane = Airplane::find($input['airplane_id']);
			if($airplane)
			{
				if($input['max_days'] > Config::get('max_days'))
				{
					$_departure_airport = Airport::find($input['departure_airport']);
					$_arrival_airport = Airport::find($input['departure_airport']);

					if($_departure_airport)
					{
						if($_arrival_airport)
						{
							if($_arrival_airport == $_departure_airport)
							{
								if($input['porcentage'] > Config::get('porcentage'))
								{
									if($input['price'] > Config::get('price'))
									{
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

										$response['status']['code'] = 200;
										$response['status']['message'] = 'OK';
										$response['status']['description'] = 'Operation successful';
									}
									else
									{
										$response['status']['description'] = 'Price must be greater than 50';
									}
								}
								else
								{
									$response['status']['description'] = 'Porcentage must be greater than 0.1';
								}
							}
							else
							{
								$response['status']['description'] = 'Arrival Airport and Departure Airport muest be different';
							}
						}
						else
						{
							$response['status']['description'] = 'Arrival Airport doesn\'t exist';
						}
					}
					else
					{
						$response['status']['description'] = 'Departure Airport doesn\'t exist';
					}	
				}
				else
				{
					$response['status']['description'] = 'Max days must be greater than 0.';
				}
			}
			else
			{
				$response['status']['description'] = 'Airplane doesn\'t exist.';
			}
		}
		else
		{
			$response['status']['description'] = 'Departure Time must be less than Arrival Time.';
		}

		return Response::json($response, $response['status']['code']);
	}
}