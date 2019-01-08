<?php

use App\Parsers\ItemParser;
use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parser = new ItemParser();
        $parser->parseFiles();
    }
}
