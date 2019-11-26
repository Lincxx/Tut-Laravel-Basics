<?php

namespace App\Http\Middleware;

use Closure;

class TestMiddle
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

        //dd();
        if (now()->format('s') % 2) {
            return $next($request);
        }

        return response('Not Allowed');
    }
}
