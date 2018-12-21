<?php

use App\Campaign;
use App\Item;
use App\Participant;
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

$factory->define(App\CampaignItem::class, function (Faker $faker) {
//    random_int(\DB::table('campaigns')->min('id'), \DB::table('campaigns')->max('id'));
    $participant = Participant::inRandomOrder()->first();

    return [
        'campaign_id' => $participant->campaign_id,
        'item_id' => Item::first()->id,
        'quantity' => random_int(1, 99),
        'carried_by' => $participant->user_id,
    ];
});
