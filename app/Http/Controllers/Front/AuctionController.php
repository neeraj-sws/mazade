<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Helper;
Use \Carbon\Carbon;

use App\Models\{Auction,Auctioncancel,Finishedauctions,Reviews,Auctionitems,Companies,Payment,Status,Upload,Category,SubCategory,user,CompanyInfo,Orders,WithdrawHistory,WithdrawHistoryDetails,Transaction,City};



use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Facades\Hash;

class AuctionController extends Controller
{

    protected $single_heading;

    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
          $this->single_heading = "Sub Category";
       
    }


    public function create($cat_id=0,$sub_cat_id=0){
        $sub_categories = $cat_info= $sub_cat_info= array();    
        $categories = Category::where('status', 1)->get();
        $city = City::where('status', 1)->get();
        // echo '<pre>'; print_r($city->toArray()); die;

        if($cat_id != 0){
            $sub_categories = SubCategory::where('category_id', $cat_id)->where('status', 1)->get();
        }

        if($cat_id != 0 AND $sub_cat_id != 0){
            $cat_info = Category::where('id', $cat_id)->where('status', 1)->first();
            $sub_cat_info = SubCategory::where('id', $sub_cat_id)->where('status', 1)->first();
        }

        return view('front.auction.create',[
            'cat_id'=>$cat_id,
            'sub_cat_id'=>$sub_cat_id,
            'categories' => $categories,
            'sub_categories'=>$sub_categories,
            'cat_info'=>$cat_info,
            'sub_cat_info'=>$sub_cat_info,
            'city' => $city,
        ]);
    }

    public function bid_details($id){
        // echo $id; die;
        $auction = Auction::find($id);
        $orders = Orders::where('auction_id', $id)->first();
        // echo"<pre>";print_r($auction);die;
       
        $company = Auth::user();
       
        // echo"<pre>";print_r($company['companys']);die;
        return view('front.auction.bid_details',['auction'=>$auction,'company'=>$company,'orders' =>$orders]);
    }

    public function bidings_code(Request $request){
        

        $company = Auth::user();


        $order = Orders::find($request->id);
       
        if($order->code == $request->checkcode){
        $order->status = 1;
        $order->save();

        $company =User::find($order->company_id);
        $company->wallet += $order->price;
        $company->save();

            return response()->json(['status' => 2, 'message' => 'Code Matched Successfully', 'surl' => route('last-bidings')]);
        }else{
            return response()->json(['status' => 0, 'message' => 'Code MisMatched', 'surl' => route('last-bidings')]);
        }
       
        
       
        
    }

    public function payment($id){

        $auction = Auction::find($id);
        return view('front.auction.payment',['auction'=>$auction]);
    }

    public function bid_confirm(Request $request){

       
        $auctionitem = Auctionitems::find($request->id);
        $auctionitem->status = 1;
        $auctionitem->save();

        $auction = Auction::where('id', $auctionitem->auction_id)->first();
        // echo "<pre>";print_r($auction);die;
        $auction->status = 3;
        $auction->save();

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
            return response()->json(['status' => 1]);
        }else{
            return response()->json(['status' => 0]);
        }


    }

    
    public function cancel_request(Request $request){

        $auctionitem = Orders::find($request->id);
        $auctionitem->status = 2;
        $auctionitem->save();
        return response()->json(['status' => 1]);

    }
    public function active_auctions(){
        // echo"hello";die;
        $currentDateTime = \Carbon\Carbon::now();


        $result['categories'] = Category::where('status', 1)->get();

        $type=request('type');
        
       
        return view('front.auction.active_auctions', array_merge($result, ['type' => $type]));
    }

    public function active_auctions_list(Request $request){

        // echo "<pre>";print_r($request->all());die;
        
        $currentDateTime = \Carbon\Carbon::now();


        $qry = Auction::with(['CatId','subcatid', 'status_id'])->where('status',1)->where('start_time', '<=', $currentDateTime)->where('end_time', '>=', $currentDateTime);
        $qry->whereDoesntHave('auctionItem', function ($query){
            $query->where('auction_items.company_id', Auth::user()->id);
        });
        $result['list'] = $qry->get();
        $result['rating'] = CompanyInfo::where('user_id', Auth::guard('web')->user()->id)->first();
     
        if($request->list_type == 'grid'){
            $view = view('front.auction.category_detail',$result)->render();
       }else{
            $view =  view('front.auction.active_aution_list',$result)->render();
        }
       

      return response()->json(['view' => $view]);

    }

    public function categories_auctions_filter(){
        
        $currentDateTime = \Carbon\Carbon::now();

        $result['categories'] = Category::where('status', 1)->get();
      
      
      $view =  view('front.auction.categories_auctions_filter',$result)->render();

      return response()->json(['view' => $view]);

    }

    public function auctions_filter(Request $request) {

    //    echo "<pre>";print_r($request->all());die;
        $currentDateTime = \Carbon\Carbon::now();
        $search = $request->input('search');
        $catIds = $request->input('cat_id', []);
        $subCatIds = $request->input('sub_cat_id', []);
    
        $qry = Auction::with(['CatId', 'subcatid', 'status_id'])
            ->where('status', 1)
            ->where('start_time', '<=', $currentDateTime)
            ->where('end_time', '>=', $currentDateTime);
    
        if ($search) {
            $qry->where(function($query) use ($search) {
                $query->where('title', 'like', "%$search%");
                $query->orWhereHas('CatId', function($catQuery) use ($search) {
                    $catQuery->where('title', 'like', "%$search%");
                });
                $query->orWhereHas('subcatid', function($subCatQuery) use ($search) {
                    $subCatQuery->where('title', 'like', "%$search%");
                });
            });
        }
        if (!empty($catIds)) {
            $qry->whereIn('category', $catIds);
        }
        if (!empty($subCatIds)) {
            $qry->whereIn('sub_category', $subCatIds);
        }
        $result['list'] = $qry->get();

        if($request->list_type == 'grid'){
            $view = view('front.auction.category_detail',$result)->render();
       }else{
            $view =  view('front.auction.active_aution_list',$result)->render();
        }
        return response()->json(['view' => $view]);
    }
    
    
    


    public function updates(Request $request)
    {
        
        // echo '<pre>'; print_r($request->all()); die;
        $validator = Validator::make(
            $request->all(),
            [   
                'lastPrice' => 'required',
            ]
        );

        if($validator->fails()){
            return response()->json(['status' => 0,'errors' =>  $validator->errors()]);
        }else{
            
             $id = DB::table('bidoderid')->insertGetId([]);

            $opder_id = DB::table('bidoderid')->where('id', $id)->first();

            $date = new DateTime($opder_id->created_at);
           $datee =   $date->format("Ym");

              $idd = 'MZ'.$datee.$opder_id->id;

        // $status = Status::select('name')->where('id',8)->first();
        
        //    $status = Companies::find($request->company_id);
        // $status->is_bid_add = 1;
        // $status->save();
    
        $auction = new Auctionitems;
        
          $auction->oder_id = $idd;
        $auction->category_id = $request->category_id;
        $auction->auction_id = $request->auction_id;
        $auction->company_id = $request->company_id;
        $auction->price = $request->lastPrice;
        
        $auction->save();


        $qry = Auction::where('id',$request->auction_id)->first();
        $qry->last_bid = $request->lastPrice;
        $qry->save();
        return redirect()->route('active-auctions')
                         ->with('success', 'Auction updated successfully');  
        }
       
    }

    public function add_review($id) 
    {
       $id=request('id');
    //    echo"<pre>";print_r($id);die;
        $orders = Orders::with('AuId')->findOrFail($id);
      

        $bit = Auctionitems::with(['CatId' , 'companyId'])->where('auction_id' , $orders->AuId->id )->first();

    //    echo "<pre>";print_r($bit);die;
   
        return view('front.auction.add_review' ,['orders' => $orders , 'bit' => $bit]);
    }


    public function add(Request $request)
{
    $validator = Validator::make(
        $request->all(),
        [   
            'rating' => 'required',
            'experience' => 'required',
            'title' => 'required',
            'email' => 'required',
        ]
    );

    if($validator->fails()){
        return response()->json(['status' => 0,'errors' =>  $validator->errors()]);
    } else {
        $rating = new Reviews;
        $rating->auction_id = $request->auction_id;
        $rating->company_id = $request->company_id;
        $rating->rating = $request->rating;
        $rating->discription = $request->experience;
        $rating->title = $request->title;
        $rating->email = $request->email;
        $rating->save();

        $orders = Orders::where('id', $request->order_id)->first();
        $orders->is_review = 1;
        $orders->save();

        return response()->json(['status' => 2, 'message' => 'Review Added Successfully', 'surl' => route('last-bidings')]);
        $this->review($request->company_id,$request->rating); 

        // Return your response here if needed
    }
}

public function review($id,$rating)
{
    $company = CompanyInfo::where('user_id', $id)->first();
    $reviews = Reviews::where('company_id', $id)->get();
    $sumRatings = $reviews->sum('rating');
    $totalReviews = $reviews->count();
    $averageRating = $totalReviews > 0 ? $sumRatings / $totalReviews : 0;
    
    $company->total_rating += $rating; 
    $company->avg_rating = $averageRating;
    $company->save();
}

    public function withdraw(){

        $data=request()->user();

       
        $info=User::where('id',$data->id)->first();
        return view('front.auction.withdraw',['info' => $info]);
    }

    public function withdraw_submit(Request $request){

        // echo "<pre>";print_r($request->all());die;
        $data=request()->user();
        $info = new WithdrawHistory ;
        $info->withdraw_amout = $request->withdrawAmount;
        $info->payment_method = $request->paymentMethod;
        $info->transaction_id = $request->transaction_id;
        $info->company_id = $data->id;
        $info->type = 1;
        $info->save();

        $WithdrawHistoryDetails = new WithdrawHistoryDetails ;
        $WithdrawHistoryDetails->withdraw_id = $info->id;
        $WithdrawHistoryDetails->type = $request->paymentMethod;
        $WithdrawHistoryDetails->email = $request->paypalEmail;
        $WithdrawHistoryDetails->banck_acc_no = $request->bankAccount;
        $WithdrawHistoryDetails->bank_name = $request->bankName;
        $WithdrawHistoryDetails->bank_branch = $request->bankBranch;
        $WithdrawHistoryDetails->Crypto_address = $request->cryptoAddress;
        $WithdrawHistoryDetails->save();


        $data=request()->user();
       
        
        return response()->json(['status' => 2, 'message' => 'WithDraw Done Successfully', 'surl' => route('company.dashboard')]);
    }

    public function user_auction_detail()
    {
       return view('front.auction.user_auction_detail');
       
    }


    public function index()
    {
      
       $startauction = Auction::with(['CatId'])->get();

        return view('front.active_auction',['startauction' => $startauction]);
    }

   public function store(Request $request)
   {
    //    echo "<pre>";print_r($request->title);die;
    
     $user = Auth::user();
     
     
        if($request->id){
                return $this->update($request);
        }else{
        $validator = Validator::make(
            $request->all(),
            [   
                'title'=>'required',
                'category'=>'required',
                'sub_category'=>'required',
                'budget'=>'required',
                'quality'=>'required',
                'quantity'=>'required',
                'city'=>'required',
               
               
            ]
        );
        if($validator->fails()){
            return response()->json(['status' => 0,'errors' =>  $validator->errors()]);
        }else{
// echo "<pre>";print_r($user->id);die;
                $id = DB::table('auctionodernumber')->insertGetId([]);
                $opder_id = DB::table('auctionodernumber')->where('id', $id)->first();
                $date = new DateTime($opder_id->created_at);
                $datee =   $date->format("Ym");
                $idd = 'MZ'.$datee.$opder_id->id;
                
               
                      
                $current = \Carbon\Carbon::now();
                $tomorrow = \Carbon\Carbon::now()->addHours(24);


              
     
                $info = Auction::create([
                    'oder_id' => $idd,
                    'title'=> $request->title,
                    'category'=> $request->category,
                    'sub_category'=> $request->sub_category,
                    'quality'=> $request->quality,
                    'budget'=> $request->budget,
                    'city'=>$request->city,
                    'quantity'=>$request->quantity,
                    'start_time'=>$current,
                    'end_time'=> $tomorrow,
                    'image'=>$request->image,
                    'message'=>$request->message,
                    'user_id'=> $user->id,
                    'status'=>1,
                ]);

              

                return response()->json(['status' => 2, 'message' => 'Auction Create Successfully', 'surl' => route('all-auction')]);
            }
        }
   }
   
    public function auctioncancel(Request $request)
   {
       if($request->id){
                return $this->update($request);
        }else{
        $validator = Validator::make(
            $request->all(),
            [   
                'category_id'=>'required',
                'company_id'=>'required',
                'username'=>'required',
                'Paid'=>'required',
                'reason'=>'required',
            ]
        );
            if($validator->fails()){
                return response()->json(['status' => 0,'errors' =>  $validator->errors()]);
            }else{
                
                $info = Auctioncancel::create([
                    'category_id'=> $request->category_id,
                    'company_id'=> $request->company_id,
                    'username'=>$request->username,
                    'Paid'=> $request->Paid,
                    'reason'=>$request->reason,
                ]);

                return redirect()->route('home')
                ->with('success','state auction created successfully.');
            }
        }
       
   }

   public function finishedauction(Request $request)
   {
         if($request->id){
            return $this->update($request);
    }else{
    $validator = Validator::make(
        $request->all(),
        [   
            'category_id'=>'required',
            'company_id'=>'required',
            'username'=>'required',
            'Paid'=>'required',
        ]
    );
        if($validator->fails()){
            return response()->json(['status' => 0,'errors' =>  $validator->errors()]);
        }else{
            
            $info = Finishedauctions::create([
                'category_id'=> $request->category_id,
                'company_id'=> $request->company_id,
                'username'=>$request->username,
                'Paid'=> $request->Paid,
            ]);

            return redirect()->route('home')
            ->with('success','state auction created successfully.');
        }
    }
   }

   public function payments(Request $request)
   {
  // echo "<pre>";print_r($request->all());die;

        if($request->id){
            return $this->update($request);
        }else{
        $validator = Validator::make(
        $request->all(),
        [  
            'category_id'=>'required',
            'user_id'=>'required',
            'amount'=>'required',
        ]
        );

        $code = mt_rand(1000000000, 9999999999);
        while (Payment::where('code', $code)->exists()) {
            $code = mt_rand(1000000000, 9999999999);
        }

        if($validator->fails()){
            return response()->json(['status' => 0,'errors' =>  $validator->errors()]);
        }else{
            
            $info = Payment::create([
                'category_id'=> $request->category_id,
                'user_id'=> $request->user_id,
                'auction_id'=> $request->auction_id,
                'amount'=> $request->amount,
                'code'=> $code,
            ]);

            return redirect()->route('home')
            ->with('success','state auction created successfully.');
        }
        }

    
   }

   public function user_update(Request $request)
   {
          $validator = Validator::make(
            $request->all(),
            [  
                'name'=>'required',
                'lastname'=>'required',
                'phone'=>['required', 'string', 'min:11'],
                'email'=>'required',
                'message'=>'required',
                
            ]

            );
            if($validator->fails()){
                return response()->json(['status' => 0,'errors' =>  $validator->errors()]);
            }else{

            $user = user::find($request->user_id);
            $user->name = $request->name;
            $user->last_name = $request->lastname;
            $user->mobile_number = $request->phone;
            $user->email = $request->email;
            $user->address = $request->message;
            $user->save();

            return response()->json(['status' => 2, 'message' => 'User Login Successfully', 'surl' => route('dashboard')]);
            }
   }

   public function companyinfo_update(Request $request)
   {
    //  echo "<pre>";print_r($request->all());die;
      $validator = Validator::make(
        $request->all(),
        [  
            'name'=>'required',
            'lastname'=>'required',
            'phone'=>['required', 'string', 'min:11'],
            'email'=>'required',
            'message' => ['required'],
            'companyName' => ['required', 'string', 'max:255'],
            'company_phone' => ['required', 'string', 'max:10'],
            'commercialRegister' => ['required'],
            
        ]

        );
        if($validator->fails()){
            return response()->json(['status' => 0,'errors' =>  $validator->errors()]);
        }else{

        $user = user::find($request->user_id);
        $user->name = $request->name;
        $user->last_name = $request->lastname;
        $user->mobile_number = $request->phone;
        $user->email = $request->email;
        $user->address = $request->message;
        $user->save();

        $Company_info = Company_info::find($request->company_id);
        $Company_info->user_id = $user->id;
        $Company_info->companyname = $request->companyName;
        $Company_info->companphone = $request->company_phone;
        $Company_info->address = $request->message;
        $Company_info->commercialregister = $request->commercialRegister;
        $Company_info->save();

        return response()->json(['status' => 2, 'message' => 'User Login Successfully', 'surl' => route('dashboard')]);
        }
   }

   public function change_password(Request $request)
   {
    

  //  echo "<pre>";print_r($request->all());die;
       $validator = Validator::make(
           $request->all(),
           [
               'oldpassword'=>'required',
               'newpassword'=>'required',
           ]
         );  
         
         if($validator->fails())
         {
           return response()->json(['status'=>0,'errors'=>$validator->errors()]);
       }else{

           $user = user::find($request->user_id);

           if (Hash::check($request->oldpassword, $user->password)) {
               
                  user::find($request->user_id)->fill([
               'password'=>$request->newpassword,
                    ])->save();
                    return response()->json(['status' => 2, 'message' => 'User Login Successfully', 'surl' => route('dashboard')]);
           } else {
               return response()->json(['status'=>3, 'message' => 'Old password is not match']);
           }

         }
   }

  
    public function imageuplode(Request $request)
    {
        // echo '<pre>'; print_r($request->all()); die;

        $type = $request->type;
        $path = $type . '_path';
        $name = $type . '_name';
        $file_name = $request->$name;
        $file_path = $request->$path;
        $file = $request->file('image');

            if (!empty($file)) {
                $ext = $file->getClientOriginalExtension();
        
                $destinationPath = public_path().'/'.$file_path;
                $file_name = time().".".$file->getClientOriginalExtension();
                $file->move($destinationPath,$file_name);
                 $movedFile =  $file_name;
                 
                $file_data= Upload::create([
                    'file'=>$movedFile,
                ]);

                return response()->json(['status' => 1, 'file_id' => $file_data->id, 'file_path' => asset($file_path . $file_data->file)]);

        }else{ 

            return response()->json(['status' => 0, 'msg' => 'File type not allowed']);
        }
    }
   
    public function imagedelete(Request $request)
    {
        // echo '<pre>'; print_r($request->all()); die;

        $id = $request->id;
        if (!empty($id)) {
                $file_data= Upload::find($id);
                    $file_data->delete();

                return response()->json(['status' => 1,'msg' => 'File deleted successfully' ]);

        }else{ 

            return response()->json(['status' => 0, 'msg' => 'File not deleted']);
        }
    }
    


}
