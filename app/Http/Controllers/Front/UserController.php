<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,Upload,SubCategory,Companies,City,Auction,Oders,Finishedauctions,Auctionitems,Reviews,Company_info};
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

      $user = Auth::guard('web')->user();
      $company = Company_info::where('user_id', $user->id)->first();
      $reviews = Reviews::get();

       return view('front.user.profile' , [ 'reviews' => $reviews , 'user' => $user ,'company' => $company ]);
    }

    public function dashboard()
    { 
         $auction = Auction::with('CatId')->get();
         $auctionitem = Auctionitems::with('AuId', 'companyId','CatId')->get(); 
        //  echo '<pre>'; print_r($auctionitem->all()); die;
         $user = Auth::guard('web')->user();

       return view('front.user.dashboard' , ['auction' => $auction ,'auctionitem' =>$auctionitem, 'user' => $user]);
    }

    public function last_bidings()
    { 
         $auction = Auction::with('CatId')->get();
         $auctionitem = Auctionitems::with('AuId', 'companyId','CatId')->get(); 
        //  echo '<pre>'; print_r($auctionitem->all()); die;
         $user = Auth::guard('web')->user();

       return view('front.user.last_bidings' , ['auction' => $auction ,'auctionitem' =>$auctionitem, 'user' => $user]);
    }

    public function change_password()
    { 
         $auction = Auction::with('CatId')->get();
         $auctionitem = Auctionitems::with('AuId', 'companyId','CatId')->get(); 
        //  echo '<pre>'; print_r($auctionitem->all()); die;
         $user = Auth::guard('web')->user();

       return view('front.user.change_password' , ['auction' => $auction ,'auctionitem' =>$auctionitem, 'user' => $user]);
    }

    public function user_profile()
    {
      $user = Auth::guard('web')->user();
      return view('front.user.profiledashboard' , ['user' => $user]);
    }

    public function company_info()
    {
    
      $user = Auth::guard('web')->user();

      $company = Company_info::where('user_id', $user->id)->first();

      return view('front.user.companyinfo' , ['user' => $user ,'company' => $company]);
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
