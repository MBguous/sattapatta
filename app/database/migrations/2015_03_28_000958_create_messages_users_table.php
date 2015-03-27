<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages_users', function(Blueprint $table){
			$table->unsignedInteger('message_id');
			$table->unsignedInteger('receiver_id');
			$table->foreign('message_id')->references('id')->on('messages');
			$table->foreign('receiver_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('messages_users');
	}

}
