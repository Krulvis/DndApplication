<?php

use Illuminate\Database\Seeder;

class ParticipantTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run() {
        DB::table('users')->insert([
            'name' => 'Joep KT',
            'email' => 'joep@live.nl',
            'password' => bcrypt('secret'),
        ]);
        DB::table('participants')->insert([
            'user_id' => DB::table('users')->where('name', '=', 'Joep KT')->first()->id,
            'campaign_id' => random_int(\DB::table('campaigns')->min('id'), \DB::table('campaigns')->max('id')),
            'role' => 'DM'
        ]);
        factory(App\Participant::class, 100)->create();
    }
}
