<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\{Startauction,Auctionitems,Oders,Status,Companies};
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use DB;
use DateTime;

class CompaniesbidController extends Controller
{
    
      public function auctionedit()
    {
        $info = Auctionitems::with(['CatId','AuId'])->get();

        // echo "<pre>";print_r($info);die;

        return view('companies.editform',['info' => $info]);
    }

    public function auctionupdate($id)
    {
        $startauction = Auctionitems::with(['CatId', 'AuId'])->findOrFail($id);

      //  echo "<pre>";print_r($startauction);die;
      
        return view('companies.bitupdate' , ['startauction' => $startauction ]);
    }


    public function update(Request $request): RedirectResponse
    {
       
        $validator = Validator::make(
            $request->all(),
            [   
                'price' => 'required',
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

        $status = Status::select('name')->where('id',8)->first();
        
           $status = Companies::find($request->company_id);
        $status->is_bid_add = 1;
        $status->save();
    
        $auction = new Auctionitems;
          $auction->oder_id = $idd;
        $auction->category_id = $request->category_id;
        $auction->auction_id = $request->auction_id;
        $auction->company_id = $request->company_id;
        $auction->status_bit = $status->id;
        $auction->price = $request->price;
        $auction->save();

        return redirect()->route('auctions.bit')
                         ->with('success', 'Auction updated successfully');  
        }
       
    }

    public function store(Request $request): RedirectResponse
    {

    //   echo "<pre>";print_r($request->all());die;
        
           $request->validate([
            'category_id' => 'required',
            'price' => 'required',
            'code' => 'required',
        ]);
    
        $auction = new Oders;
        $auction->category_id = $request->category_id;
        $auction->user_id = $request->user_id;
        $auction->company_id = $request->company_id;
        $auction->auction_id = $request->auction_id;
        $auction->price = $request->price;
        $auction->code = $request->code;    
        $auction->save();
    
        return redirect()->route('auctions.bit')
                         ->with('success', 'Auction updated successfully');
    }
   
}

