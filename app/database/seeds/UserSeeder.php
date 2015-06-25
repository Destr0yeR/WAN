<?php


class UserSeeder extends Seeder {

	public function run() {
		User::create(array('username' => '@dmin' , 'password' => Hash::make('wan@dmin123'), 'type_id' => Config::get('constants.general_admin')));
	}
}