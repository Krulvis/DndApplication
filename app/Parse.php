<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parse extends Model
{
    protected $fillable = [
        'body',
        'name',
        'weight',
        'price',
        'source',
        'type',
        'misc' => 'array'
      ];
}
