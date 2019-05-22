<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model {
    //
    protected $fillable = [
        'title',
        'description',
        'money',
        'spent'
    ];

    public function users() {
        return $this->belongsToMany('App\User', 'participants');
    }

    public function getSpendableAttribute() {
        return ($this->getAttributeValue('money') - $this->getAttributeValue('spent'));
    }

    public function items() {
        return $this->hasMany('App\CampaignItem');
    }
}
