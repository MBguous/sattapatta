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
		Schema::create('offers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('date');
			$table->time('time');
			$table->string('status')->default('pending');
			$table->unsignedInteger('user_id');
			$table->unsignedInteger('item_id');
			
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('item_id')->references('id')->on('items');

			$table->timestamps();
		});

		Schema::create('offer_items', function(Blueprint $table)
		{
			$table->unsignedInteger('offer_id');
			$table->unsignedInteger('item_id');

			$table->foreign('offer_id')->references('id')->on('offers');
			$table->foreign('item_id')->references('id')->on('items');

			$table->primary(array('offer_id', 'item_id'));
			$table->timestamps();
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
		Schema::drop('item_offer');
	}

}
