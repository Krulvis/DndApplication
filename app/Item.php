<?php

namespace App;

use App\Abstracts\MongoModel;

class Item extends MongoModel {

    protected $collection = 'items';

    protected $guarded = [

    ];
}
