<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller {
	//

	function index() {
		$campaigns = "HIII";

		return view('campaigns').with([
				'campaigns' => $campaigns
			]);
	}
}
