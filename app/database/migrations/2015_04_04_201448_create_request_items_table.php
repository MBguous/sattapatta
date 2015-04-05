<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('request_items', function(Blueprint $table){
			$table->unsignedInteger('request_id');
			$table->unsignedInteger('item_id');
			$table->foreign('request_id')->references('id')->on('requests');
			$table->foreign('item_id')->references('id')->on('items');
			$table->primary(array('request_id', 'item_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('request_items');
	}

}
