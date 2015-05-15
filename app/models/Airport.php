<?php

class Airport extends Eloquent {
	
	public function departure_schedules(){
		return $this->hasMany('Schedule', 'departure_airport', 'airport_id');
	}

	public function arrival_schedules(){
		return $this->hasMany('Schedule', 'arrival_airport', 'airport_id');
	}
}