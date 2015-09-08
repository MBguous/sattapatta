<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ItemsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create('ne_NP');

		foreach(range(1, 40) as $index)
		{
			Item::create([
				'name'	=> $faker->word(),
				'description'	=> $faker->paragraph($nbSentences = 3),
				'price'		=> $faker->numberBetween($min = 500, $max = 200000),
				'date'	=> $faker->date($format = 'Y-m-d', $max = 'now'),
				'time'	=> $faker->time($format = 'H:i:s', $max = 'now'),
				'user_id' => $faker->numberBetween($min = 1, $max = 10)
			]);
		}
	}
}