<?php

use Illuminate\Database\Seeder;

class CampaignTablesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(App\Campaign::class, 10)->create();
    }
}
