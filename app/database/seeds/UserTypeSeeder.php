<?php

class UserTypeSeeder extends Seeder {

	public function run() {
		//UserTypeSeeder::create(['name' => '']);
		UserType::create(['name' => 'General Admin']);
		UserType::create(['name' => 'Content Admin']);
	}
}