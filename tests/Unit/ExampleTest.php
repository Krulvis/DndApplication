<?php

namespace Tests\Unit;

use App\Item;
use App\Parsers\ItemParser;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testSomeShit()
    {
        $parser = new ItemParser();
        $parser->parseFiles();
        $this->assertTrue(true);
    }

    public function testFilterCategory(){
        $category = 'Weapon';

        dd(Item::where('categories','all', [$category])->get()->toArray());
    }
}
