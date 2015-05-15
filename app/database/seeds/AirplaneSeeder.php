<?php

class AirplaneSeeder extends Seeder {

	public function run(){
		//Airplane::create(array('model' => '', 'capacity' => , 'length' => , 'max_weight' => , 'wingspan' => , 'emergency_exits' => , 'toilets' => ));
		Airplane::create(array('model' => 'Airbus 319', 'capacity' => 144, 'length' => 33.84, 'max_weight' => 70000, 'wingspan' => 34.10, 'emergency_exits' => 8, 'toilets' => 3));
		Airplane::create(array('model' => 'Airbus 320-200', 'capacity' => 174, 'length' => 37.56, 'max_weight' => 77000, 'wingspan' => 34.10, 'emergency_exits' => 8, 'toilets' => 3));
		Airplane::create(array('model' => 'Airbus 321', 'capacity' => 220, 'length' => 44.51, 'max_weight' => 89000, 'wingspan' => 35.8, 'emergency_exits' => 8, 'toilets' => 3));
		Airplane::create(array('model' => 'Airbus A330', 'capacity' => 223, 'length' => 58.5, 'max_weight' => 23000, 'wingspan' => 57.0, 'emergency_exits' => 8, 'toilets' => 7));
		Airplane::create(array('model' => 'Boeing 767-300', 'capacity' => 238, 'length' => 54.2, 'max_weight' => 184611, 'wingspan' => 47.6, 'emergency_exits' => 8, 'toilets' => 7));
		Airplane::create(array('model' => 'Boeing 777-300', 'capacity' => 363, 'length' => 63.7, 'max_weight' => 347800, 'wingspan' =>60.00 , 'emergency_exits' => 10, 'toilets' => 12));
		Airplane::create(array('model' => 'Boeing 787-8', 'capacity' => 247, 'length' => 56.72, 'max_weight' => 227930, 'wingspan' => 60.13, 'emergency_exits' => 8, 'toilets' => 6));
		Airplane::create(array('model' => 'Boeing 787-9', 'capacity' => 313, 'length' => 63.00, 'max_weight' => 251360, 'wingspan' => 60.00, 'emergency_exits' => 8, 'toilets' => 8));
		Airplane::create(array('model' => 'Dash8-Q200', 'capacity' => 37, 'length' => 22.25, 'max_weight' => 16465, 'wingspan' => 25.9, 'emergency_exits' => 1, 'toilets' => 1));

		//Airplane::create(array('model' => '', 'capacity' => , 'length' => , 'max_weight' => , 'wingspan' => , 'emergency_exits' => , 'toilets' => ));
	}
}