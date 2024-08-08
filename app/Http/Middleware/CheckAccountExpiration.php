<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CheckAccountExpiration
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->expires_at < Carbon::now()) {
            return redirect()->route('login.form')->withErrors(['Your account has expired.']);
        }

        return $next($request);
    }
}
