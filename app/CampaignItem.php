<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignItem extends Model {
    //
    protected $fillable = [
        'item_id',
        'campaign_id',
        'owned_by',
        'carried_by'
    ];
}
