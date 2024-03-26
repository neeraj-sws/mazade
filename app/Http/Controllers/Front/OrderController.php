<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;


use App\Models\{Auction,Auctioncancel,Finishedauctions,Reviews,Auctionitems,Companies,Payment,Status,Upload,Category,SubCategory,user};



use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{

    protected $single_heading;

    public function __construct()
    {
       
          $this->single_heading = "Sub Category";
       
    }


    
    public function all_order(){
        return view('front.orders.all-orders');
    }

    public function pending_order(){
        return view('front.orders.pending-orders');
    }

    public function completed_order(){
        return view('front.orders.completed-orders');
    }

    public function last_order(){
        return view('front.orders.last-orders');
    }
    
    public function withdarw_history(){
        return view('front.orders.withdraw-history');
    }

    public function profile(){
        $user = Auth::guard('web')->user();
        return view('front.orders.profile' ,[ 'user' => $user]);
    }




}
