<?php

class CountrySeeder extends Seeder {

	public function run(){
		//Country::create(array('name' => ''));
		Country::create(array('name' => 'Argentina'));
		Country::create(array('name' => 'Bolivia'));
		Country::create(array('name' => 'Brasil'));
		Country::create(array('name' => 'Chile'));
		Country::create(array('name' => 'Colombia'));
		Country::create(array('name' => 'Ecuador'));
		Country::create(array('name' => 'Estados Unidos'));
		Country::create(array('name' => 'México'));
		Country::create(array('name' => 'Perú'));
		Country::create(array('name' => 'Uruguay'));
		Country::create(array('name' => 'Venezuela'));
	}
}