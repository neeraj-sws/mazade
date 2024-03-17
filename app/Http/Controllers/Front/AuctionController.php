<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\{Auction,Auctioncancel,Finishedauctions,Payment,Status,Upload};
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use DB;

class AuctionController extends Controller
{

    protected $single_heading;

    public function __construct()
    {
       
          $this->single_heading = "Sub Category";
       
    }


    public function create(){
        return view('front.auction.create');
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
                'name'=>'required',
                'category'=>'required',
                'sub_category'=>'required',
                'Quality'=>'required',
                'Bugiet'=>'required',
                'city'=>'required',
                'quantity'=>'required',
                'image'=>'required',
                'description'=>'required',
            ]
        );
            if($validator->fails()){
                return response()->json(['status' => 0,'errors' =>  $validator->errors()]);
            }else{

                $status = Status::where('id',1)->first();

            
                $id = DB::table('auctionodernumber')->insertGetId([]);

                $opder_id = DB::table('auctionodernumber')->where('id', $id)->first();

                $date = new DateTime($opder_id->created_at);
               $datee =   $date->format("Ym");

                  $idd = 'MZ'.$datee.$opder_id->id;

                $info = Auction::create([
                    'oder_id' => $idd,
                    'name'=> $request->name,
                    'category'=> $request->category,
                    'sub_category'=> $request->sub_category,
                    'quality'=>$request->Quality,
                    'budget'=> $request->Bugiet,
                    'city'=>$request->city,
                    'status'=>$status->id,
                    'quantity'=>$request->quantity,
                    'image'=>$request->image,
                    'description'=>$request->description,
                ]);

                // return redirect()->route('home')
                // ->with('success', 'state auction created successfully.');

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
