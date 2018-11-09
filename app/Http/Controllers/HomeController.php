<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Participant;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'auth' );
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response|string
	 */
	public function index() {

		return view( 'home' );
	}
}
