<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

// use Illuminate\Contracts\Auth\Factory as Auth;

class ActivityUser
 {
/**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $expire = now()->addMinutes(2); /* keep online for 2 min */
            Cache::put('user-is-online-' .Auth::user()->id,true,$expire);

            /* last seen */
            User::where('id',Auth::user()->id)->update(['last_seen' => now()]);

        }
        return $next($request);
    }
}