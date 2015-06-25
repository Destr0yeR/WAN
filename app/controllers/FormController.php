<?php

class FormController extends BaseController {

	public function getCitiesByCountry($id) {
		$country = Country::findOrFail($id);

		$select = array(0 => 'Seleccione una Ciudad');

		$cities = $select + City::where('country_id','=',$id)->lists('name','id');

		return Form::select('cities',$cities , array('class' => 'form-control'));
	}

	public function getAirportsByCity($id) {
		$city = City::findOrFail($id);

		$select = array(0 => 'Seleccione un Aeropuerto');

		$airports = $select + Airport::where('city_id','=',$id)->lists('name','id');

		return Form::select('cities',$airports , array('class' => 'form-control'));
	}
}