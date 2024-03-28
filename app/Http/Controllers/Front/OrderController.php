<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;


use App\Models\{Auction,Auctioncancel,Finishedauctions,Reviews,Auctionitems,Companies,Payment,Status,Upload,Category,SubCategory,user,Orders,WithdrawHistory,WithdrawHistoryDetails};



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

        $orders = Orders::with('comid','AuId','CatId')->get();
        return view('front.orders.all-orders' , ['orders' =>$orders]);
    }

    public function pending_order(){

        $orders = Orders::where('status', 0)->where('is_payment', 1)->with('comid','AuId','CatId')->get();
        return view('front.orders.pending-orders', ['orders' =>$orders]);
    }

    public function completed_order(){
        $orders = Orders::where('status', 1)->where('is_payment', 1)->with('comid','AuId','CatId')->get();
        return view('front.orders.completed-orders', ['orders' =>$orders]);
    }

    public function last_order(){
        $orders = Orders::with('comid','AuId','CatId')->get();
        return view('front.orders.last-orders', ['orders' =>$orders]);
    }
    
    public function withdarw_history(){
        $orders = Orders::with('comid','AuId','CatId')->get();
        $withdraw = WithdrawHistory::with('WithdrawDetails')->get();
        // echo "<pre>";print_r($withdraw);die;

        return view('front.orders.withdraw-history', ['orders' =>$orders ,'withdraw' => $withdraw]);
    }




}
