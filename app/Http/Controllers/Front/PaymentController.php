<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,Upload,SubCategory,Companies,City,Auction,Oders,Finishedauctions,Auctionitems};
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
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

 
    public function index()
    {
       return view('front.payment.index');
    }
    

}
