<?php

class City extends Eloquent {
	
	public function airports() {
		return $this->hasMany('Airport');
	}

	public function country(){
		return $this->belongsTo('Country');
	}
}