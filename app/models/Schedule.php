<?php

class Schedule extends Eloquent {
	
	public function flights(){
		return $this->hasMany('Flight');
	}

	public function departure(){
		return $this->belongsTo('Airport', 'departure_airport', 'airport_id');
	}

	public function arrival(){
		return $this->belongsTo('Airport', 'arrival_airport', 'airport_id');
	}
	public function airplane(){
		return $this->belongsTo('Airplane');
	}

}