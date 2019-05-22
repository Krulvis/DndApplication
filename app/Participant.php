<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model {
	//
	protected $fillable = [
		'user_id',
		'campaign_id',
		'role',
        'character',
        'money'
	];
}
