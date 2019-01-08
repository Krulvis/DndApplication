<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CampaignsController extends Controller {


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');

        $this->middleware('participant', ['only' => ['show', 'items']]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\Response|string
     */
    public function index(Request $request) {
        $campaigns = DB::table('campaigns')->join('participants', 'participants.campaign_id', '=', 'campaigns.id')
            ->where('participants.user_id', '=', Auth::id())->get();

        return view('campaigns.index', compact('campaigns'))->with('campaigns', $campaigns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('campaigns.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required'
        ]);

        $campaign = Campaign::create($request->all());
        Participant::create(['campaign_id' => $campaign->id, 'user_id' => Auth::id(), 'role' => 'DungeonMaster']);

        return redirect()->route('campaigns.index')
            ->with('success', 'Campaign created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
        $campaign = Campaign::find($id);

        return view('campaigns.show')->with('campaign', $campaign);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
