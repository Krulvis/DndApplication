<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campaign extends Model {
    //
    protected $fillable = [
        'title',
        'description',
        'money',
        'spent'
    ];

    public function users(): BelongsToMany {
        return $this->belongsToMany('App\User', 'participants');
    }

    public function participants(): HasMany {
        return $this->HasMany('App\Participant');
    }

    public function getSpendableAttribute() {
        return ($this->getAttributeValue('money') - $this->getAttributeValue('spent'));
    }

    public function items(): HasMany {
        return $this->hasMany('App\CampaignItem');
    }
}
