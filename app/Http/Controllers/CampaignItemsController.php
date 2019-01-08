<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Item;
use Illuminate\Http\Request;

class CampaignItemsController extends Controller {
    //
    /**
     * @param Request $request
     *
     * @param \App\Campaign $campaign
     * @return \Illuminate\Http\Response|string
     */
    public function index(Request $request, Campaign $campaign) {
        return view('campaigns.items.index')->with('campaign', $campaign)->with('items', $campaign->items());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param \App\Campaign $campaign
     * @param  \App\Item $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Campaign $campaign, Item $item) {
        return view('campaigns.items.edit', compact('campaign', 'item'));
    }
}
