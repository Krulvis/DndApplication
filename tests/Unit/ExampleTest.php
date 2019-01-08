<?php

namespace Tests\Unit;

use App\Campaign;
use App\CampaignItem;
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

    public function testItemInfo()
    {
        $campaign = Campaign::where('id', '=', '1')->first();
        dd($campaign->items()->first()->info()->name);
    }

    public function testUsersOfCampaign()
    {
        $campaign = Campaign::where('id', '=', '1')->first();
        $users = $campaign->users();
        dd($users->get()->toArray());
    }

    public function testSomeShit()
    {
        $parser = new ItemParser();
        $parser->parseFiles();
        $this->assertTrue(true);
    }

    public function testFilterCategory()
    {
        $category = 'Weapon';

        dd(Item::where('categories', 'all', [$category])->get()->toArray());
    }
}
