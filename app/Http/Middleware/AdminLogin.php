<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;

class AdminLogin
{
    
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && auth()->user()->type == '1') {
            return $next($request);
    }  else {
            return redirect()->route('login')->with('auth-message', 'Please login first');
        }
    }

}
