<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AbortIfPrivate
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
        if ($request->is('users/profile/*')) {

            $id = $request->segment(3);

            // If the profile is private and the user is not the owner.
            if (User::find($id)->isPrivate() and (Auth::guest() or $request->user()->id != $id)) {
                return App::abort(403);
            }
        }

        return $next($request);
    }
}
