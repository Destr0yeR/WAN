<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassengersXFlightsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('passengers_flights', function($table){
			$table->increments('id');
			$table->integer('passenger_id')->unsigned();
			$table->integer('flight_id')->unsigned();
		});

		Schema::table('passengers_flights', function($table){
			$table->foreign('passenger_id')->references('id')
					->on('passengers')->onDelete('cascade');

			$table->foreign('flight_id')->references('id')
					->on('flights')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::table('passengers_flights', function($table){
			$table->dropForeign('passengers_flights_flight_id_foreign');
			
			$table->dropForeign('passengers_flights_passenger_id_foreign');
		});

		Schema::drop('passengers_flights');
	}

}
