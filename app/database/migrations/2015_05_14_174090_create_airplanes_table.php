<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirplanesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('airplanes', function($table){
			$table->increments('id');
			$table->integer('capacity');
			$table->string('model');
			$table->double('length');
			$table->double('max_weight');
			$table->double('wingspan');
			$table->integer('emergency_exits');
			$table->integer('toilets');

			$table->timestamps();
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
		Schema::drop('airplanes');
	}

}
