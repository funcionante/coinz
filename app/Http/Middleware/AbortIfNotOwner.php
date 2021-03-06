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
        $id = $request->segment(2);

        if ($request->is('copies/*')) {
            if (is_null($request->user()->copies->find($id))) {
                return App::abort(403);
            }
        }

        return $next($request);
    }
}
