<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,Upload,SubCategory,Companies,City,Auction,CompanyInfo,Orders,Finishedauctions,Auctionitems,Reviews,User};
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


      

       return view('front.company.dashboard' ,[ 'averageRating' => $averageRating,'info' => $info]);
    }
    

    public function user_company_detail()
    {
      $data=request()->user();
      $info=CompanyInfo::where('user_id',$data->id)->first();
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
   
}
