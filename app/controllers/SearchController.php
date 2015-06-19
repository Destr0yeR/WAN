<?php

class SearchController extends BaseController {
	
	//busqueda de vuelos disponibles
	public function search (){
		$response['status'] = array();

		$input = Input::all();
		$validation=$this->validation_Input_Search_Availables($input);

		if(is_null($validation))
		{
			$departure_availables = $this->search_availability($input['departure_airport'],$input['arrival_airport'],$input['passengers'],$input['departure_date']);
			$response['avaible_departure'] = $this->getAvailables($departure_availables,$input['departure_date']);

			if($input['type']==0)
			{
				$return_availables = $this->search_availability($input['arrival_airport'],$input['departure_airport'],$input['passengers'],$input['return_date']);
				$response['available_return'] = $this->getAvailables($return_availables,$input['return_date']);	
			}
			$response['status']['code'] = 200;
		}else{
			$response['status']['code'] = 400;
			$response['status']['description'] = $validation;
		}
		
		return Response::json($response,$response['status']['code']);
	}

	 
	protected function search_availability($origin,$destination,$passengers,$date)
	{
		$schedules = Schedule::Where('departure_airport','=',$origin)->Where('arrival_airport','=',$destination)->lists('id','id');

		$flights = Flight::whereHas('schedule',function($q)use($origin,$destination){
			$q -> where('departure_airport','=',$origin)
				-> where('arrival_airport','=',$destination);

		})->where('date','=',$date)->get();

		$availables = $schedules;

		foreach ($flights as $flight) {
			if(in_array($flight->schedule_id, $schedules))
			{
				$quantity_passengers = Passenger::whereHas('flights',function($q)use($flight){
					$q -> where('flight_id','=',$flight->id);
				})->count();

				$max_quantity = Airplane::whereHas('schedules',function($q)use($flight){
					$q -> where('schedules.id','=',$flight->schedule_id);
				})->first()->capacity;

				if($passengers>($max_quantity-$quantity_passengers))
				{
					unset($availables[$flight->schedule_id]);
				}
			}
		}

		return $availables;
	}

	public function getAvailables($availables,$date)
	{
		$schedules = [];
		foreach ($availables as $available) 
		{
			$schedules[] = $this->availableFormat(Schedule::find($available),$date);
		}
		return $schedules;
	}

	public function availableFormat($available,$date)
	{
		$new = [
				'id' => $available->id,
				'departure_time' => $available->departure_time,
				'arrival_time' => $available->arrival_time,
				'price' => $this->calculatePrice($available->price,$available->max_days,$available->porcentage,$date), //CAmbiar porcentage por percentage
				'duration' =>  $available->arrival_time - $available->departure_time // Restar bien los tiempos
		];

		return $new;
	}

	public function calculatePrice($price,$max_days,$percentage,$date)
	{
	    $today = time(); 
     	$your_date = strtotime($date);
		$datediff = $your_date - $today;
		$days = ceil($datediff/(60*60*24));

		if($days>=$max_days)
		{
			$real_price = $price;
		}else
		{
			$real_price = $price*(1+$percentage*($max_days-$days));
		}

		return $real_price;
		
	}

	public function validation_Input_Search_Availables($input)
	{
		$validation = Validator::make($input, array(
			'type' => 'required|in:0,1',
			'departure_airport' => 'required|exists:airports,id',
			'arrival_airport' => 'required|exists:airports,id',
			'departure_date' => 'required|date',
			'return_date' =>	'date|after:'.$input['departure_date'],
			'passengers' =>'required|integer|max:5|min:1'
		));
		if($validation->fails())
		{
			return $validation->messages();

		}
		else
		{
			return null;
		}
		
	}

	//Busqueda de Asientos ocupados

	public function searchSeats(){
		
		$response['status'] = array();

		$input = Input::all();
		
		$validation = $this->validation_Input_Seats($input);
		if(is_null($validation)){
			$ocupied_seats = $this->searchOcupiedSeats($input['schedule'],$input['date']);
			$response['total_quantity'] = $this->getTotalQuantity($input['schedule']);
			$response['occupied_quantity'] = count($ocupied_seats);
			$response['ocupied_seats'] = $ocupied_seats;
			$response['status']['code'] = 200;
			$response['status']['description'] = 'Operation Successfull';
		}else{
			$response['status']['code'] = 400;
			$response['status']['description'] = $validation;
		} 
		return Response::json($response,$response['status']['code']);
	}

	public function searchOcupiedSeats($schedule,$date)
	{
		
		$flight = Flight::where('schedule_id','=',$schedule)->where('date','=',$date)->first();
		$ocupied_seats=array();
		if(!is_null($flight))
		{
			$columns = array();
			$rows = array();
	
			foreach ($flight->passengers as $passengers) {
				array_push($columns, $passengers->pivot->column);
				array_push($rows, $passengers->pivot->row);
			}
			$ocupied_seats = $this->createSeats($rows,$columns);			
		}
		return $ocupied_seats;	
	}

	public function getTotalQuantity($schedule)
	{
		$schedule = Schedule::where('id','=',$schedule)->with('Airplane')->first();

		return $schedule->airplane->capacity;
	}

	public function createSeats($rows,$columns)
	{
		$quantity = count($rows);
		$seats = [];
		for($i=0;$i<$quantity;$i++)
		{
			$seats[$i] = [
				'row' => $rows[$i],
				'column' => $columns[$i],
			];
		}
		return $seats;
	}
	public function validation_Input_Seats($input)
	{
		$validation = Validator::make($input,array(
			'schedule' => 'exists:schedules,id',
			'date' => 'date_format:Y-m-d'
		));

		if($validation->fails()){
			return $validation->messages();
		}
		return null;
	}

}

