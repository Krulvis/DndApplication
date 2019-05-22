<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Participant::class, function (Faker $faker) {
    return [
        'user_id' => random_int(\DB::table('users')->min('id'), \DB::table('users')->max('id')),
        'campaign_id' => random_int(\DB::table('campaigns')->min('id'), \DB::table('campaigns')->max('id')),
        'role' => $faker->title,
        'money' => random_int(0, 1000)
    ];
});
