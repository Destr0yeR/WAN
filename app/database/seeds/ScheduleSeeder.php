<?php

class ScheduleSeeder extends Seeder {

	private $times = [
		['departure' => '08:15', 'arrival' => '09:45'],
		['departure' => '10:20', 'arrival' => '12:00'],
		['departure' => '12:45', 'arrival' => '13:45'],
		['departure' => '14:00', 'arrival' => '15:10'],
		['departure' => '15:25', 'arrival' => '16:35'],
		['departure' => '17:00', 'arrival' => '17:50'],
		['departure' => '18:10', 'arrival' => '19:10'],
		['departure' => '20:15', 'arrival' => '22:00'],
		['departure' => '23:00', 'arrival' => '00:00'],
		['departure' => '01:00', 'arrival' => '02:00'],
		['departure' => '02:30', 'arrival' => '03:45']
	];

	private $prices = [
		50.0, 60.0, 70.0, 80.0, 90.0, 
		100.0, 120.0, 150.0 , 180.0, 200.0, 
		225.0, 250.0, 280.0, 300.0, 350.0, 
		375.0, 400.0, 450.0, 475.0, 500.0];

	public function run() {
		/*Schedule::create([
			'departure_time' 	=> ,
			'arrival_time'		=> ,
			'departure_airport' => ,
			'arrival_airport'	=> ,
			'price'				=> ,
			'porcentage'		=> ,
			'max_days'			=> ,
			'airplane_id'		=> ,
		] );*/
		

		for($i = 1 ; $i <= 50 ; ++$i) {
			for($j = $i+1 ; $j <= 50 ; ++$j) {

				$first = rand (0 , 9);
				$second = rand (0 , 9);
				$price_first = rand(0, 19);
				$price_second = rand(0, 19);
				$create = rand(0,10);

				if($create >= 2 || $i == 38 || $j == 38){
					Schedule::create([
						'departure_time' 	=> $this->times[$first]['departure'],
						'arrival_time'		=> $this->times[$first]['arrival'],
						'departure_airport' => $i,
						'arrival_airport'	=> $j,
						'price'				=> $this->prices[$price_first],
						'porcentage'		=> ($first + $price_second + 2)*0.001,
						'max_days'			=> rand (15 , 45),
						'airplane_id'		=> rand (1 , 9),
					] );

					Schedule::create([
						'departure_time' 	=> $this->times[$second]['departure'],
						'arrival_time'		=> $this->times[$second]['arrival'],
						'departure_airport' => $j,
						'arrival_airport'	=> $i,
						'price'				=> $this->prices[$price_second],
						'porcentage'		=> ($second + $price_first + 2)*0.001,
						'max_days'			=> rand (15 , 45),
						'airplane_id'		=> rand (1 , 9),
					] );
				}
			}
		}
	}
}