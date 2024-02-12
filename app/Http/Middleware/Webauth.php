<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Webauth
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('webuser')->check()) {
            return redirect('/index'); // Change this to the desired redirect route
        }
        return $next($request);
    }
}

