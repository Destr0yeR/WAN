<?php

class Schedule extends Eloquent {
	
	public function flights(){
		return $this->hasMany('Flight');
	}

	public function departure(){
		return $this->belongsTo('Airport', 'departure_airport', 'id');
	}

	public function arrival(){
		return $this->belongsTo('Airport', 'arrival_airport', 'id');
	}
	public function airplane(){
		return $this->belongsTo('Airplane');
	}

}