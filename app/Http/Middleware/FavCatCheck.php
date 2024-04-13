<?php

namespace App\Http\Middleware;

use App\Models\SellerCategory;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavCatCheck
{
    public function handle(Request $request, Closure $next)
    { 

        if (Auth::check()) { 
            $favCatCount = SellerCategory::where('seller_id',Auth::user()->id)->count();
            if($favCatCount == 0){
                return redirect()->route('manage.categories');
            }
            return $next($request);
        }

        abort(403, 'Unauthorized.');
    }
}
