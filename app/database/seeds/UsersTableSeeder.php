<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 5) as $index)
		{
			User::create([
				'username'=>$faker->userName(),
				'password'=>Hash::make('123456'),
				'email'=>$faker->email(),
				'active'=>'1',
				'firstName'=>$faker->firstName($gender=null|'male'|'female'),
				'lastName'=>$faker->lastName(),
				'gender'=>'male'|'female'
			]);
		}
	}
}