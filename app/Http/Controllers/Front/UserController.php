<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Category,Upload,SubCategory,Companies,City,Auction,Oders,Finishedauctions,Auctionitems,Reviews,CompanyInfo,Orders};
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
     
      $reviews = Reviews::with(['companyId'])->get();
      // echo"<pre>";print_r($reviews->companyId);die;

       return view('front.user.dashboard' , [ 'reviews' => $reviews , 'user' => $user]);
    }

    public function all_auction()
    { 
      $user = Auth::guard('web')->user();
      $auction = Auction::with('CatId')->where('user_id',$user->id)->orderBy('id', 'DESC')->get();
      $auctionitem = Auctionitems::with('Auction', 'companyId','CatId')->orderBy('id', 'DESC')->get(); 
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
       
         $orders = Orders::with('comid','AuId','CatId')->get();
         
       
        //  echo '<pre>'; print_r($orders); die;
         $user = Auth::guard('web')->user();
        //  echo '<pre>'; print_r($user); die;
       return view('front.user.last_bidings' , ['user' => $user,'orders' =>$orders]);
    }

    public function enter_code(Request $request)
    { 
      // echo '<pre>'; print_r($request->all()); die;
          $orders = Orders::where('id' , $request->id)->with('comid','AuId','CatId')->first();
          // echo '<pre>'; print_r($orders[0]->price); die;
         return  view('front.user.last_bidings_code',['orders' =>$orders]);

        
      
    }

    public function open_profile(Request $request)
    { 
      // echo '<pre>'; print_r($request->all()); die;
          $orders = Orders::where('id' , $request->id)->with('comid','AuId','CatId')->first();
          // echo '<pre>'; print_r($orders[0]->price); die;
         return  view('front.user.last_bidings_profile',['orders' =>$orders]);

        
      
    }

   
    public function change_password()
    { 
         $auction = Auction::with('','CatId')->get();
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
   

    public function all_auction_data()
    { 
        $currentDateTime = \Carbon\Carbon::now();
        $user = Auth::guard('web')->user();
        $auction = Auction::with('CatId')->where('user_id',$user->id)->orderBy('id', 'DESC')->get();
        $auctionitem = Auctionitems::with('Auction', 'companyId','CatId')->orderBy('id', 'DESC')->get(); 

        return view('front.user.auction_data' , ['auction' => $auction ,'auctionitem' =>$auctionitem, 'user' => $user]);
        // return response()->json(['auction' => $auction, 'auctionitem' => $auctionitem, 'user' => $user]);
    }
  public function current_auction_data()
    { 
        $currentDateTime = \Carbon\Carbon::now();
         $auction = Auction::with('CatId')->where('status',1)->where('start_time', '<=', $currentDateTime)->where('end_time', '>=', $currentDateTime)->get();
         
         $auctionitem = Auctionitems::with('Auction', 'companyId','CatId')->get(); 
        //  echo '<pre>'; print_r($auctionitem->all()); die;
         $user = Auth::guard('web')->user();

       return view('front.user.current_data' , ['auction' => $auction ,'auctionitem' =>$auctionitem, 'user' => $user]);
    }

    public function auctionend(Request $request)
    {
      $status = Auction::find($request->id);
      $status->status = $request->status;
      $status->save();
      return response()->json(['success' => 1,  'Auction Bit successfully']);
    }

    public function end_auctions(Request $request){

      // echo "<pre>";print_r($request->all());die;
      $auction =  Auction::with('auctionItem')->where('id', $request->id)->first();
     
      // echo "<pre>";print_r($auctionitem);die;

      $auction->status = 3;
      $auction->save();

      $auctionitem = Auctionitems::where('auction_id', $auction->id)->latest()->first();
      // echo "<pre>";print_r($auction);die;
      $auctionitem->status = 1;
      $auctionitem->save();

      $order = new Orders;
      $order->order_id = $auction->oder_id;
      $order->cat_id = $auction->category;
      $order->auction_id = $auction->id;
      $order->auction_item_id = $auctionitem->id;
      $order->company_id = $auctionitem->company_id;
      $order->price = $auctionitem->price;
      $order->status = 0;
      $order->save();
      // echo "<pre>";print_r($order);die;

      if($order->id){
        return response()->json(['status' => 1, 'surl' => route('bid-details', $auction->id)]);
      }else{
          return response()->json(['status' => 0]);
      }


  }
  
  
  public function select_auction(Request $request)
  { 
    //   echo "<pre>";print_r($request->all());die;
      
      $currentDateTime = \Carbon\Carbon::now();
      $user = Auth::guard('web')->user();
      $status = $request->auction_data;
      if($status == 1){
        $auctions = Auction::with('CatId')->where('user_id',$user->id)->orderBy('id', 'DESC')->get();
      }
      elseif($status == 2){
        $auctions = Auction::with('CatId')->where(['status'=> 1 ,'user_id' =>$user->id])->orderBy('id', 'DESC')->get();
      }
      elseif($status == 3){
        $auctions = Auction::with('CatId')->where(['status'=> 3 ,'user_id' =>$user->id])->get();
      }
      elseif($status == 4){
        $auctions = Auction::with('CatId')->where(['status'=>2 ,'user_id' =>$user->id])->get();
      }
      
       
        $auctionitem = Auctionitems::with('Auction', 'companyId','CatId')->get(); 
        //  echo '<pre>'; print_r($auctionitem->all()); die;
        $user = Auth::guard('web')->user();

        return view('front.user.auction_data' , ['auction' => $auctions ,'auctionitem' =>$auctionitem, 'user' => $user]);
     
     
  }

  public function all_auction_data_seller()
    { 
     
        $user = Auth::guard('web')->user();
        $auctionitem = Auctionitems::with('Auction','CatId')->where('company_id',$user->id)->orderBy('id', 'DESC')->get(); 
       return view('front.user.auction_data_seller' , ['auction' => $auctionitem ,'auctionitem' =>$auctionitem, 'user' => $user]);
        // return response()->json(['auction' => $auction, 'auctionitem' => $auctionitem, 'user' => $user]);
    }
    public function select_auction_seller(Request $request)
    { 
      //   echo "<pre>";print_r($request->all());die;
        
        $user = Auth::guard('web')->user();
        $status = $request->auction_data;
       
        if($status == 1){
          $auctions =  Auctionitems::with('Auction','CatId')->where('company_id',$user->id)->orderBy('id', 'DESC')->get();
         
        }
        elseif($status == 2){
          $auctions =  Auctionitems::with('Auction','CatId')->whereHas('Auction', function ($query) {
            $query->where('status', 1);
        })
        ->where('company_id', $user->id)->orderBy('id', 'DESC')->get();
       
        }
        elseif($status == 3){
          $auctions =  Auctionitems::with('Auction','CatId')->whereHas('Auction', function ($query) {
            $query->where('status', 3);
        })
        ->where('company_id', $user->id)->orderBy('id', 'DESC')->get();
          
        }
        elseif($status == 4){
          $auctions =  Auctionitems::with('Auction','CatId')->whereHas('Auction', function ($query) {
            $query->where('status', 2);
        })
        ->where('company_id', $user->id)->orderBy('id', 'DESC')->get();
         
        }
          $auctionitem = Auctionitems::with('Auction', 'companyId','CatId')->get(); 
  
          return view('front.user.auction_data_seller' , ['auction' => $auctions ,'auctionitem' =>$auctionitem, 'user' => $user]);
    }
   
}
