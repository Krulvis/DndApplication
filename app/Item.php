<?php

namespace App;

use App\Abstracts\MongoModel;

class Item extends MongoModel {

    protected $collection = 'items';

    protected $guarded = [

    ];

    protected $filled = [
        'name',
        'price'
    ];

    public function getCostAttribute() {
        $text = $this->getAttributeValue('Cost');
        $value = preg_replace('/\D/', '', $text);
        return $value;
    }
}
