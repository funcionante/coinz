<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Session;
use App;

class AbortIfNotManager
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

        if (!$request->user()->isManager()) {
            App::abort(403);
        }

        return $next($request);
    }
}
