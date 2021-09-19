<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserActiveStatusMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()){
            $expireAt = now()->addSeconds(120);
            Cache::put('userIsOnline'.Auth::user()->id, true, $expireAt);

            User::where('id', Auth::user()->id)->update(['last_seen' => now()]);
        }
        return $next($request);
    }
}
