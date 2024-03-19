<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next,$role)
    { 

        if (Auth::check() && Auth::user()->role == $role) { 
            return $next($request);
        }

        abort(403, 'Unauthorized.');
    }
}