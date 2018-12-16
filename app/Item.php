<?php

namespace App;

use App\Abstracts\MongoModel;
use Illuminate\Database\Eloquent\Model;

class Item extends MongoModel {



    protected $collection = 'items';

	protected $guarded = [

	];
}
