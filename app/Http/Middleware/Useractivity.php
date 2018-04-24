<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Cache;
use Auth;

class Useractivity
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
        if(Auth::check())
        {
            $expireasAt = Carbon::now()->addMinutes(1);
            Cache::put('user-is-online-'.Auth::user()->id,true,$expireasAt);
        }
        return $next($request);
    }
}
