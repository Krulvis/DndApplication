<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recap extends Model {
    protected $fillable = [
        'name',
        'detail'
    ];

    public function campaign() {
        return $this->belongsTo('App\Campaign');
    }
}