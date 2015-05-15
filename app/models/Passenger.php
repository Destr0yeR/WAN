<?php

class Passenger extends Eloquent {
	
	public function document(){
		return $this->belongsTo('Document');
	}

	public function flights(){
		return $this->belongsToMany('Flight', 'passengers_flights')
	}
}