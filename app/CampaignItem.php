<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignItem extends Model
{
    //
    protected $fillable = [
        'item_id',
        'quantity',
        'campaign_id',
        'owned_by',
        'carried_by'
    ];

    public function campaign()
    {
        return $this->belongsTo('App\Campaign')->first();
    }

    public function carrier()
    {
        return $this->belongsTo('App\User', $ownerKey = 'carried_by')->first();
    }

    public function owner()
    {
        return $this->belongsTo('App\User', $ownerKey = 'owned_by')->first();
    }

    public function info()
    {
        return $this->belongsTo('App\Item')->first();
    }
}
