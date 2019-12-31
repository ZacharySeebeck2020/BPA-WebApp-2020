<?php

namespace App\Http\Middleware;

use Closure;

class IsAdministrator
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
        //First you need to instantiate the middleware you want to use and call the handle method on it.
        //Then you have to create a closure where you'll do all your logic.
        return app(Authenticate::class)->handle($request, function ($request) use ($next) {
            //Put your awesome stuff there. Like:
            if (!\Auth::user()->is_administrator) {
                return abort(403, 'Unauthorized.');
            }

            //Then process the next request if every tests passed.
            return $next($request);
        });
    }
}
