<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnyMiddleware
{
   
    public function handle(Request $request, Closure $next, ...$middlewares)
    {
        foreach ($middlewares as $middleware) {
            if ($this->checkMiddleware($middleware)) {
                return $next($request);
            }
        }

        return redirect()->route('login')->with('auth-message', 'Please log in first.');
    }

    protected function checkMiddleware($middleware)
    {
        switch ($middleware) {
            case 'adminlogin':
                return auth()->check() && auth()->user()->type == '1';
            case 'userlogin':
                return auth()->check() && auth()->user()->type == '2';
            // Add other middleware conditions as needed
            default:
                return false;
        }
    }
}
