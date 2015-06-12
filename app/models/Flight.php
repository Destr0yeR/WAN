<?php

class Flight extends Eloquent {
	
	public function passengers(){
		return $this->belongsToMany('Passenger', 'passengers_flights')->withPivot('price','column','row');
	}

	public function schedule(){
		return $this->belongsTo('Schedule');
	}
}