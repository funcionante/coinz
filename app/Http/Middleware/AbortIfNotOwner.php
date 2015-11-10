<?php

namespace App\Http\Middleware;

use Closure;
use App;

class AbortIfNotOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Get the segments from the url: ".../{model}/(id)/..."
        $model = $request->segment(1);
        $id = $request->segment(2);

        if ($model == "copies") {
            if ($request->user()->copies->find($id) == null) {
                return App::abort(403);
            }
        }

        return $next($request);
    }
}
