<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create('ne_NP');

		foreach(range(1, 5) as $index)
		{
			User::create([
				'username'	=> $faker->userName(),
				'password'	=> Hash::make('123456'),
				'email'		=> $faker->email(),
				'active'	=> '1',
				'firstName'	=> $faker->firstName($gender=null|'male'|'female'),
				'lastName'	=> $faker->lastName(),
				'gender'	=> 'male'|'female'|'other',
				'birthday'	=> $faker->dayOfMonth(),
				'birthMonth'=> $faker->monthName(),
				'birthYear'	=> $faker->year(),
				'phone'		=> $faker->phoneNumber(),
				'address'	=> $faker->address(),
				'country'	=> 'Nepal'
			]);
		}
	}
}