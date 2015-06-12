<?php
class PassengerController extends BaseController
{
	public function register()
	{
		$input_json = Input::all();
		$passengers = $input_json['passengers'];
		foreach ($passengers as $passenger) {
			echo $passenger['first_name']."\n";
		}
		
		
		echo "registro";
	}
}