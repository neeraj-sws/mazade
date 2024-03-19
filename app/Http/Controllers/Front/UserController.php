<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,Upload,SubCategory,Companies,City,Auction,Oders,Finishedauctions,Auctionitems};
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

 
    public function profile()
    {
       return view('front.user.profile');
    }

    public function dashboard()
    { 
         $auction = Auction::with('CatId')->get();

         $user = Auth::guard('web')->user();

       return view('front.user.dashboard' , ['auction' => $auction , 'user' => $user]);
    }
    
   
}
