<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Category,Upload,SubCategory,Companies,City,Auction,Oders,Finishedauctions,Auctionitems,Reviews,CompanyInfo};
use Illuminate\Support\Facades\Auth;
use Carbon;


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

 
    public function dashboard()
    {
      $user = Auth::guard('web')->user();
     
      $reviews = Reviews::get();

       return view('front.user.dashboard' , [ 'reviews' => $reviews , 'user' => $user]);
    }

    public function all_auction()
    { 
         $auction = Auction::with('CatId')->get();
         $auctionitem = Auctionitems::with('Auction', 'companyId','CatId')->get(); 
        //  echo '<pre>'; print_r($auctionitem->all()); die;
         $user = Auth::guard('web')->user();

       return view('front.user.all_auction' , ['auction' => $auction ,'auctionitem' =>$auctionitem, 'user' => $user]);
    }

    public function current_auction()
    { 
        $currentDateTime = \Carbon\Carbon::now();
         $auction = Auction::with('CatId')->where('status',1)->where('start_time', '<=', $currentDateTime)->where('end_time', '>=', $currentDateTime)->get();
         $auctionitem = Auctionitems::with('Auction', 'companyId','CatId')->get(); 
        //  echo '<pre>'; print_r($auctionitem->all()); die;
         $user = Auth::guard('web')->user();

       return view('front.user.current_auction' , ['auction' => $auction ,'auctionitem' =>$auctionitem, 'user' => $user]);
    }

    public function last_bidings()
    { 
         $auction = Auction::with('CatId')->get();
         $auctionitem = Auctionitems::with('Auction', 'companyId','CatId')->get(); 
        //  echo '<pre>'; print_r($auctionitem->all()); die;
         $user = Auth::guard('web')->user();

       return view('front.user.last_bidings' , ['auction' => $auction ,'auctionitem' =>$auctionitem, 'user' => $user]);
    }

    public function change_password()
    { 
         $auction = Auction::with('CatId')->get();
         $auctionitem = Auctionitems::with('Auction', 'companyId','CatId')->get(); 
        //  echo '<pre>'; print_r($auctionitem->all()); die;
         $user = Auth::guard('web')->user();

       return view('front.user.change_password' , ['auction' => $auction ,'auctionitem' =>$auctionitem, 'user' => $user]);
    }

    public function edit_profile()
    {
      $user = Auth::guard('web')->user();
      return view('front.user.edit_profile' , ['user' => $user]);
    }

    public function edit_company_info()
    {
    
      $user = Auth::guard('web')->user();
      return view('front.user.edit_company_info' , ['user' => $user]);
    }

    public function auctionbit(Request $request)
    {
      $status = Auction::find($request->id);
      $status->status = $request->status;
      $status->save();
      return response()->json(['success' => 1,  'Auction Bit successfully']);
    }

    public function auctionend(Request $request)
    {
      $status = Auction::find($request->id);
      $status->is_start = $request->status;
      $status->save();
      return response()->json(['success' => 1,  'Auction Bit successfully']);
    }
    
   
}
