<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle($request, Closure $next)
    { 
        $user = Auth::user();
            echo '<pre>';print_R($user);die;
        if (!$user || $user->role !== $role) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
