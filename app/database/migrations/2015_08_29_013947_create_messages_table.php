<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->text('content');
			$table->date('date');
			$table->time('time');
			$table->boolean('read_status')->default(0);
			$table->unsignedInteger('sender_id');
			$table->timestamps();
			$table->foreign('sender_id')->references('id')->on('users');
		});

		Schema::create('messages_users', function(Blueprint $table)
		{
			$table->unsignedInteger('message_id');
			$table->unsignedInteger('receiver_id');
			$table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade');
			$table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('messages');
		Schema::drop('messages_users');
	}

}
