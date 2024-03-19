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

class AuctionController extends Controller
{

    protected $single_heading;

    public function __construct()
    {
       
          $this->single_heading = "Sub Category";
       
    }


    public function create($cat_id=0,$sub_cat_id=0){
        $sub_categories = $cat_info= $sub_cat_info= array();    
        $categories = Category::where('status', 1)->get();
       
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
        ]);
    }

    public function bid_details($id){
        // echo $id; die;
        $ids['idss'] = Auction::find($id);
        //   echo '<pre>'; print_r( $ids['idss']->toArray()); die;
        $company['companys'] = Auth::guard('companie')->user();
       
        return view('front.auction.bid_details',$ids,$company);
    }

    public function active_auctions(){
        
        $qry = Auction::with(['CatId', 'status_id']);
        $result['list'] = $qry->get();
        // echo '<pre>'; print_r($result['list']->toArray()); die;
        return view('front.auction.active_auctions',$result);
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
        
           $status = Companies::find($request->company_id);
        $status->is_bid_add = 1;
        $status->save();
    
        $auction = new Auctionitems;
        
          $auction->oder_id = $idd;
        $auction->category_id = $request->category_id;
        $auction->auction_id = $request->auction_id;
        $auction->companie_id = $request->company_id;
        $auction->price = $request->lastPrice;
        $auction->save();

        return redirect()->route('active-auctions')
                         ->with('success', 'Auction updated successfully');  
        }
       
    }

    public function add_review(){
   
        return view('front.auction.add_review');
    }

    public function add(Request $request)
    {
        //  echo '<pre>'; print_r($request->all()); die;
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
        }else{
            
            // echo '<pre>'; print_r(new Reviews); die;
        $rating = new Reviews;
       
        $rating->ratings = $request->rating;
        $rating->discription = $request->experience;
        $rating->title = $request->title;
        $rating->email = $request->email;
        $rating->save();

        // return redirect()->route('active-auctions')
        //                  ->with('success', 'Auction updated successfully');  
        }
       
    }
    
    public function withdraw(){
        return view('front.auction.withdraw');
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
   
        if($request->id){
                return $this->update($request);
        }else{
        $validator = Validator::make(
            $request->all(),
            [   
                'title'=>'required',
                'category'=>'required',
                'sub_category'=>'required',
                //'quality'=>'required',
                'budget'=>'required',
                'city'=>'required',
               // 'quantity'=>'required',
               'message'=>'required',
            ]
        );
            if($validator->fails()){
                return response()->json(['status' => 0,'errors' =>  $validator->errors()]);
            }else{

                

            
                $id = DB::table('auctionodernumber')->insertGetId([]);
                $opder_id = DB::table('auctionodernumber')->where('id', $id)->first();
                $date = new DateTime($opder_id->created_at);
                $datee =   $date->format("Ym");
                $idd = 'MZ'.$datee.$opder_id->id;

                $info = Auction::create([
                    'oder_id' => $idd,
                    'title'=> $request->title,
                    'category'=> $request->category,
                    'sub_category'=> $request->sub_category,
                    'quality'=>1,
                    'budget'=> $request->budget,
                    'city'=>$request->city,
                    'quantity'=>2,
                    'image'=>$request->image,
                    'message'=>$request->message,
                    'status'=>0,
                ]);

                return response()->json(['status' => 1, 'message' => $this->single_heading .'saved successfully' ]);
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
                'password'=>['required', 'string', 'min:8'],
                'password_confirmation' => ['required', 'string', 'min:8']
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
            $user->password =  Hash::make($request->password);
            $user->save();

            return response()->json(['status' => 2, 'message' => 'User Login Successfully', 'surl' => route('dashboard')]);
            }
   }

  
    public function imageuplode(Request $request)
    {
    //    echo '<pre>'; print_r($request->all()); die;

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
   


}
