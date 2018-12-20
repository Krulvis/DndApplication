<?php

namespace App\Http\Middleware;

use App\Participant;
use Closure;

class CheckParticipant {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $id = $request->user()->id;
        $campaign = $request->route('campaign');
        $record = Participant::where([
            ['user_id', '=', $id],
            ['campaign_id', '=', $campaign]
        ]);
        if ($record->exists()) {
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
