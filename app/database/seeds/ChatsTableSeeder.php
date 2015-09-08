<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ChatsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create('ne_NP');

		DB::table('chats')->truncate();

		foreach(range(1, 20) as $index)
		{
			$user_id = User::orderBy(DB::raw('RAND()'))->first()->id;

			Chat::create([
				'content'	=> $faker->sentence(),
				'user_id'	=> $user_id
			]);
		}
	}
}