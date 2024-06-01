<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,Upload,SubCategory,Companies,City,Auction,CompanyInfo,Orders,Finishedauctions,Auctionitems,Reviews,User, WalletHistory};
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
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
        $data=request()->user();

        // echo "<pre>";print_r($data);die;
            $info=User::where('id',$data->id)->first();
            $auction =  Reviews::get();
            $averageRating = $auction->avg('ratings');

            $currentDateTime = \Carbon\Carbon::now();
            $auctioncount = Auction::with('CatId')->where('status',1)->where('start_time', '<=', $currentDateTime)->where('end_time', '>=', $currentDateTime)->count();
     
            $orders = Orders::with('comid','AuId','CatId')->count();

            // echo $auctioncount;die;


      

       return view('front.company.dashboard' ,[ 'averageRating' => $averageRating,'info' => $info ,'auctioncount' =>$auctioncount,'orders' =>$orders]);
    }
    

    public function user_company_detail(Request $request)
    {
      $data=request()->user();
      $order=Orders::where('id',$request->id)->first();
      $info=CompanyInfo::where('user_id',$order->company_id)->first();
      $random_code = substr(uniqid(), -10);
      // echo"<pre>";print_r($random_code);die;
       return view('front.company.user_company_detail', ['info' => $info,'random_code' => $random_code ]);
    }


    public function updateCompanyDetails(Request $request)
    {
  
    
        

        $status = Orders::where('auction_id',$request->id)->first();
     
        if ($status) {
         $status->code = $request->code;
         
         $status->save();
        }
      
        return redirect()->route('last-bidings')
                         ->with('success', 'code  updated successfully');  
        
       
    }

    public function user_category_detail()
    {
       return view('front.company.user_category_detail');
    }

    public function walletHistory(Request  $request)
    {
       $walletHistories = WalletHistory::where('user_id',Auth::guard('web')->user()->id)->paginate(10);

    //    echo "<pre>"; print_r($walletHistories->toArray()); die;

        return view('front.walletHistory',['walletHistories'=>$walletHistories]);
    }

   
}
