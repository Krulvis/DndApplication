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

    public function campaign() {
        return $this->belongsTo('App\Campaign')->first();
    }

    public function info() {
        return $this->belongsTo('App\Item')->first();
    }
}
