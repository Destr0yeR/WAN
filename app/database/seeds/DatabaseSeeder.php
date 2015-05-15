<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('CountrySeeder');
		$this->call('CitySeeder');
		$this->call('AirplaneSeeder');
		$this->call('AirportSeeder');
	}

}
