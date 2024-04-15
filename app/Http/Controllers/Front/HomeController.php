<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\SellerCategory;
use Illuminate\Http\Request;
use App\Models\{Category,Upload,SubCategory,Companies,City,Auction,Oders,Finishedauctions,Auctionitems};
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

 

    // public function index()
    // { 
    //     $route = route('auctionlist');
    //     return view('front.auction' , ['route' => $route ]);
    // }

    public function index()
    {
        
        if(Auth::check() && Auth::guard('web')->user()->role == 2){
            $categories = SellerCategory::with('category')->where('seller_id',auth()->user()->id)
            ->whereHas('category',function($qry) {
                $qry->where('status',1);
            })
            ->orderBy('category_level','asc')
            ->get();
    
            if(count($categories) == 0){
                return redirect()->route('manage.categories');
            }
        }else{
            $categories = Category::where('status', 1)->get();
        }
        $user = Auth::guard('web')->user();
        if($user->role == 1){
            $all_auction = Auction::with('CatId')->where('user_id',$user->id)->orderBy('id', 'DESC')->count();
            $current_auction = Auction::with('CatId')->where(['status'=> 1 ,'user_id' =>$user->id])->orderBy('id', 'DESC')->count();
            $end_auction = Auction::with('CatId')->where(['status'=> 3 ,'user_id' =>$user->id])->count();
            $cancel_auction = Auction::with('CatId')->where('status', 2)->count();
         }else{
            $all_auction =  Auctionitems::with('Auction','CatId')->where('company_id',$user->id)->orderBy('id', 'DESC')->count();
            $current_auction =  Auctionitems::with('Auction','CatId')->whereHas('Auction', function ($query) {
                $query->where('status', 1);
            })
            ->where('company_id', $user->id)->orderBy('id', 'DESC')->count();
            $end_auction = Auctionitems::with('Auction','CatId')->whereHas('Auction', function ($query) {
                $query->where('status', 3);
            })
            ->where('company_id', $user->id)->orderBy('id', 'DESC')->count();
            $cancel_auction = Auctionitems::with('Auction','CatId')->whereHas('Auction', function ($query) {
                $query->where('status', 2);
            })
            ->where('company_id', $user->id)->orderBy('id', 'DESC')->count();
         }

        
        $companies = Companies::get();
        return view('front.index',['categories' => $categories,'companies'=>$companies,'auction_all'=> $all_auction ,'current_all'=> $current_auction, 'end_all' => $end_auction , 'cancel_all' => $cancel_auction]);
    }

    public function categories()
    {
        if(Auth::check() && Auth::guard('web')->user()->role == 2){
            $categories = SellerCategory::with('category')->where('seller_id',auth()->user()->id)
            ->whereHas('category',function($qry) {
                $qry->where('status',1);
            })
            ->orderBy('category_level','asc')
            ->get();
        }else{
            $categories = Category::where('status', 1)->get();
        }
       return view('front.categories',['categories' => $categories]);
    }
    
    public function about()
    {
       return view('front.about');
    }

    
    public function contact()
    {
        return view('front.contact');
    }
    
    public function categoryshow()
    {
        $categories = Category::where('status', 1)->get();
        $companies = Companies::get();
        return view('front.index',['categories' => $categories,'companies'=>$companies]);
    }

    public function status(Request $request)
    {
        $is_cancel = Auction::find($request->id);
        $is_cancel->status = $request->status;
        $is_cancel->save();
        return response()->json(['success' => 1,  'Status  successfully']);
    }

    // public function category($slug)
    // {
    //         //    echo $slug;die;
    //     $categories = Category::where('slug', $slug)->first();

    //     $sub_categories = SubCategory::where('category_id', $categories->id)->where('status', 1)->get();
        
    //     $category = SubCategory::with(['CatId'])->where('category_id', $categories->id)->first();

    //     return view('front.category',['sub_categories' => $sub_categories,'category' => $category]);
    // }

    public function sub_category($slug)
    {

        $sub_categories = SubCategory::with(['CatId'])->where('slug', $slug)->first();

        $city = City::get();

        return view('front.subcategory',['sub_categories' => $sub_categories  ,'city' => $city]);
    }
    
    //  public function about_us()
    // {
    //     $auction = Auction::with(['CatId'])->get();

    //     return view('front.about',['auction' => $auction]);
    // }
    
    public function orderstatus()
    {
         $user = Auth::guard('web')->user();

         $oders = Oders::with(['CatId', 'AuId'])->get();

         return view('front.oders_status' , ['oders' => $oders , 'user' => $user ]);

    }

    public function cancelauction(Request $request)
    {
       //   echo "<pre>";print_r($request->all());die;
        $is_cancel = Oders::find($request->id);
        $is_cancel->is_cancel = $request->cancel;
        $is_cancel->save();
        return response()->json(['success' => 1,  'Cancel  successfully']);
    }

    public function finished(Request $request)
    {
        $is_cancel = Oders::find($request->id);
        $is_cancel->is_auction = $request->cancel;
        $is_cancel->save();
        return response()->json(['success' => 1,  'Cancel  successfully']);
    }

    public function cancel($id)
    {
        $user = Auth::guard('web')->user();

        $oders = Oders::with(['CatId', 'AuId'])->findOrFail($id);
        // echo "<pre>";print_r($oders);die;
        return view('front.cancelform' , ['oders' => $oders , 'user' => $user]);
    } 

    public function auctioncomplet()
    {
        $user = Auth::guard('web')->user();
        $auction = Auctionitems::with(['CatId', 'AuId','companyId'])->get();
      // echo "<pre>";print_r($auction);die;
        return view('front.auctioncomplet',['auction' => $auction , 'user' => $user]);   
    }

   
}
