<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recap extends Model {
	protected $fillable = [
		'name',
		'detail'
	];
}