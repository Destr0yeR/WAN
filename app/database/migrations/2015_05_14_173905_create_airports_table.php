<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('airports', function($table){
			$table->increments('id');
			$table->integer('city_id')->unsigned();
			$table->string('name');

			$table->timestamps();
		});

		Schema::table('airports', function($table){
			$table->foreign('city_id')->references('id')
					->on('cities')->onDelete('cascade');
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
		Schema::table('airports', function($table){
			$table->dropForeign('airports_city_id_foreign');
		});	

		Schema::drop('airports');
	}

}
