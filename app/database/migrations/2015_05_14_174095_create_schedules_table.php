<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('schedules', function($table){
			$table->increments('id');
			$table->timestamp('departure_time');
			$table->timestamp('arrival_time');
			$table->integer('departure_airport')->unsigned();
			$table->integer('arrival_airport')->unsigned();
			$table->double('price');
			$table->double('porcentage')->default(1.0);
			$table->integer('max_days')->default(30);
			$table->integer('airplane_id')->unsigned();

			$table->timestamps();
		});

		Schema::table('schedules', function($table){
			$table->foreign('departure_airport')->references('id')
					->on('airports')->onDelete('cascade');

			$table->foreign('arrival_airport')->references('id')
					->on('airports')->onDelete('cascade');

			$table->foreign('airplane_id')->references('id')
					->on('airplanes')->onDelete('cascade');
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
		Schema::table('schedules', function($table){
			$table->dropForeign('schedules_departure_airport_foreign');

			$table->dropForeign('schedules_arrival_airport_foreign');

			$table->dropForeign('schedules_airplane_id_foreign');
		});

		Schema::drop('schedules');
	}

}
