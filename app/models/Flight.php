<?php

class Flight extends Eloquent {
	
	public function passengers(){
		return $this->belongsToMany('Passenger', 'passengers_flights');
	}

	public function schedule(){
		return $this->belengsTo('Schedule');
	}
}