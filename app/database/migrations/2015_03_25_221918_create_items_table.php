<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function(Blueprint $table){
			$table->increments('id');
			$table->string('name', 50);
			$table->text('description');
			$table->double('price');
			$table->string('photoURL');
			$table->date('date');
			$table->time('time');
			$table->string('status', 20)->default('available');
			$table->unsignedInteger('user_id');
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('items');
	}

}
