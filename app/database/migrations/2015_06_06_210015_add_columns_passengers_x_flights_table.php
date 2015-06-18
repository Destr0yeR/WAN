<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsPassengersXFlightsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('passengers_flights',function($table){
			$table -> double ('price');
			$table -> string ('column');
			$table -> string ('row');
			$table -> timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('passengers_flights',function($table){
			$table -> dropColumn ('price');
			$table -> dropColumn ('column');
			$table -> dropColumn ('row');
			$table -> dropColumn ('created_at');
			$table -> dropColumn ('updated_at');
		});
	}

}
