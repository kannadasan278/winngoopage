<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->hasRole('merchant')) {
            return $next($request);
        }

        // Redirect or handle unauthorized access
        return redirect()->route('merchant.loginform')->with('error', 'Unauthorized access.');
    }
}
