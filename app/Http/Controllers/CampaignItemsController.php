<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\CampaignItem;
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
     * @param \App\Campaign $campaign
     * @param CampaignItem $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign, CampaignItem $item) {
        return view('campaigns.items.edit', compact('campaign', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CampaignItem $item
     * @return \Illuminate\Http\Response
     */
    public function update(CampaignItem $item) {
        $item->update();
        return redirect()->route('campaigns.items.index')
            ->with('success', 'Item updated successfully');
    }

    /**
     * Sell the item and add money to campaign.
     *
     * @param CampaignItem $item
     * @return \Illuminate\Http\Response
     */
    public function sell(CampaignItem $item) {
        $campaign = $item->campaign();
        $worth = $item->info()->getAttributeValue('Cost');
        $success = $campaign->update(['money' => ($campaign->getAttributeValue('money') + $worth)]);


        return redirect()->route('campaigns.items.index')
            ->with('success', 'Item sold ' . ($success ? 'successfully' : 'unsuccessful'))
            ->with('campaign', $campaign)
            ->with('items', $campaign->items());
    }
}
