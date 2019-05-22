<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CampaignItem extends Model {
    //
    protected $fillable = [
        'item_id',
        'quantity',
        'campaign_id',
        'owned_by',
        'carried_by'
    ];

    public function campaign(): BelongsTo {
        return $this->belongsTo('App\Campaign');
    }

    public function carrier(): BelongsTo {
        return $this->belongsTo('App\User', $ownerKey = 'carried_by');
    }

    public function owner(): BelongsTo {
        return $this->belongsTo('App\User', $ownerKey = 'owned_by');
    }

    public function info(): BelongsTo {
        return $this->belongsTo('App\Item');
    }
}
