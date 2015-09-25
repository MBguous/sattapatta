<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reviews', function(Blueprint $table) {

			$table->increments('id');
			$table->text('comment');
			$table->integer('rating');
			$table->unsignedInteger('reviewer_id');
			$table->unsignedInteger('reviewee_id');
			$table->timestamps();

			$table->foreign('reviewer_id')->references('id')->on('users');
			$table->foreign('reviewee_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reviews');
	}

}
