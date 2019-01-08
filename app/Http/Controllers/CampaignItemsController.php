<?php

namespace App\Http\Controllers;

use App\Campaign;
use Illuminate\Http\Request;

class CampaignItemsController extends Controller
{
    //
    /**
     * @param Request $request
     *
     * @param Campaign $campaign
     * @return \Illuminate\Http\Response|string
     */
    public function index(Request $request, Campaign $campaign) {
        return view('campaigns.items.index')->with('campaign', $campaign)->with('items', $campaign->items());
    }
}
