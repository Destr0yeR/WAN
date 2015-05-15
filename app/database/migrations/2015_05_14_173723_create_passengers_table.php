<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassengersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('passengers', function($table){
			$table->increments('id');
			$table->string('firs_name');
			$table->string('last_name');
			$table->integer('document_id')->unsigned();
			$table->string('document_number');

			$table->timestamps();
		});

		Schema::table('passengers', function($table){
			$table->foreign('document_id')->references('id')
					->on('documents')->onDelete('cascade');
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
		Schema::table('passengers', function($table){
			$table->dropForeign('passengers_document_id_foreign');
		});

		Schema::drop('passengers');
	}

}
