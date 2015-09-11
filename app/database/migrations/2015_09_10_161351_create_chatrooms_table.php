<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatroomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chatrooms', function(Blueprint $table) {

			$table->increments('id');
			$table->unsignedInteger('user1_id');
			$table->unsignedInteger('user2_id');

			$table->unique(['user1_id', 'user2_id']);

			$table->foreign('user1_id')->references('id')->on('users');
			$table->foreign('user2_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('chatrooms');
	}

}
