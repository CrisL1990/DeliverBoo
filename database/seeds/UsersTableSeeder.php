<?php

use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run(Faker $faker)
        { 
            for ($i=0; $i<10; $i++) {

                $user = new User();
                $user->name = $faker->firstName($gender = null|'male'|'female');;
                $user->lastname = $faker->lastName();
                $user->vat = $faker->vat();
                $user->email = $faker->email();
                $user->telephone_number = $faker->phoneNumber();
                $user->restaurant_name = $user->name . 'restaurant';
                $user->restaurant_address = $faker->streetAddress();
                $user->opening_times = $faker->randomElement(['8:00am', '8:30am', '9:00am']);
                $user->city = 'Roma';
                $user->save();
            }
        }
}