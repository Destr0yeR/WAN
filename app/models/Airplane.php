<?php

class Airplane extends Eloquent {
	public function schedules(){
		return $this->hasMany('Schedule');
	}
	
}