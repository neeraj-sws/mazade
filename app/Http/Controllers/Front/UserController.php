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
         $auctionitem = Auctionitems::with('AuId', 'companyId','CatId')->get(); 
        //  echo '<pre>'; print_r($auctionitem->all()); die;
         $user = Auth::guard('web')->user();

       return view('front.user.dashboard' , ['auction' => $auction ,'auctionitem' =>$auctionitem, 'user' => $user]);
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
