<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model {
    //
    protected $fillable = [
        'title',
        'description'
    ];

    public function users() {
        return $this->belongsToMany('App\User', 'participants');
    }

    public function items() {
        return $this->hasMany('App\CampaignItem');
    }
}
