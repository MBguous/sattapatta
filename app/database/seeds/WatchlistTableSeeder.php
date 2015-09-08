<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class WatchlistTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		DB::table('watchlist')->truncate();

		foreach(range(1, 30) as $index)
		{
			$item = Item::orderBy(DB::raw('RAND()'))->first();

			User::orderBy(DB::raw('RAND()'))->first()->watchlist()->attach($item->id);
		}
	}

}