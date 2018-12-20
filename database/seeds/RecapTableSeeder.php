<?php

use Illuminate\Database\Seeder;

class RecapTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(App\Recap::class, 20)->create();
    }
}
