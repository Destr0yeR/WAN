<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('flights', function($table){
			$table->increments('id');
			$table->integer('schedule_id')->unsigned();
			$table->date('date');
			$table->string('code');
		});

		Schema::table('flights', function($table){
			$table->foreign('schedule_id')->references('id')
					->on('schedules')->onDelete('cascade');
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
		Schema::table('flights', function($table){
			$table->dropForeign('flights_schedule_id_foreign');
		});

		Schema::drop('flights');
	}

}
