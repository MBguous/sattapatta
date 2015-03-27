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
		Schema::create('messages', function(Blueprint $table){
			$table->increments('id');
			$table->string('title');
			$table->text('content');
			$table->date('date');
			$table->time('time');
			$table->unsignedInteger('sender_id');
			$table->timestamps();
			$table->foreign('sender_id')->references('id')->on('users');
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
	}

}
