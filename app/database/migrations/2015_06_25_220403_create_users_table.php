<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('users', function($table){
			$table->increments('id');

			$table->string('email');
			$table->string('username');

			$table->string('first_name');
			$table->string('last_name');

			$table->string('password');
			$table->rememberToken();

			$table->integer('type_id')->unsigned();

			$table->timestamps();
		});

		Schema::table('users', function($table){
			$table 	->foreign('type_id')->references('id')
					->on('user_types')->onDelete('cascade');
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
		Schema::table('users', function($table){
			$table->dropForeign('users_type_id_foreign');
		});
		
		Schema::drop('users');
	}

}
