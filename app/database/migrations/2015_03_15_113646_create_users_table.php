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
		Schema::create('users', function(Blueprint $table){
			$table->increments('id');
			$table->string('username', 20)->unique()->nullable();
			$table->string('password', 60)->nullable();
			$table->rememberToken();
			$table->string('email')->unique()->nullable();
			$table->boolean('active')->nullable();
			$table->string('code', 60)->nullable();

			//social login data
			$table->string('provider', 10)->nullable();
			$table->string('identifier', 30)->nullable();
			$table->string('photoURL')->nullable()->default('images/male.png');
			// $table->string('displayName')->nullable();
			$table->string('firstName', 30)->nullable();
			$table->string('lastName', 30)->nullable();
			$table->string('gender', 6)->nullable();
			$table->integer('birthDay')->nullable();
			$table->integer('birthMonth')->nullable();
			$table->integer('birthYear')->nullable();
			$table->string('phone', 30)->nullable();
			$table->string('address', 100)->nullable();
			$table->string('country', 30)->nullable();

			$table->unique(array('provider', 'identifier'));
			//$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
