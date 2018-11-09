<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParticipantController extends Controller {
	//

	function getParticipants( User $user ) {
		return DB::table( 'Participants' )->where( 'user_id', $user->getAttributes( 'id' ) )->get();
	}
}
