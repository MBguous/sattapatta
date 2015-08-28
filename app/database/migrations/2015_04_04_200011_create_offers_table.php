<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offers', function(Blueprint $table){
			$table->increments('id');
			$table->date('date');
			$table->time('time');
			$table->string('status')->default('pending');
			$table->unsignedInteger('user_id');
			$table->unsignedInteger('item_id');
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('item_id')->references('id')->on('items');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('offers');
	}

}
