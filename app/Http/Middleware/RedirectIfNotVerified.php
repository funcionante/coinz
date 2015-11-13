<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Session;

class RedirectIfNotVerified
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

        if (!$request->user()->isVerified()) {
            Session::flash('alert-message', 'Por favor verifica o teu email para poderes ativar a tua conta.');
            Session::flash('alert-important', true);
            return Redirect::back();
        }

        return $next($request);
    }
}
