<?php

use App\Item;
use App\User;
use Illuminate\Database\Seeder;

class CampaignItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::where('name', '=', 'Joep KT')->first();
        DB::table('campaign_items')->insert([
            'item_id' => Item::first()->id,
            'campaign_id' => $user->campaigns()->first()->id,
            'carried_by' => $user->id
        ]);
        factory(App\CampaignItem::class, 100)->create();
    }
}
