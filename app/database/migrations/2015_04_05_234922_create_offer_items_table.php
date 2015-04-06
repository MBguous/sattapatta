<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offer_items', function(Blueprint $table){
			$table->unsignedInteger('offer_id');
			$table->unsignedInteger('item_id');
			$table->foreign('offer_id')->references('id')->on('offers');
			$table->foreign('item_id')->references('id')->on('items');
			$table->primary(array('offer_id', 'item_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('offer_items');
	}

}
