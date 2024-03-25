<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,Upload,SubCategory,Companies,City,Auction,Orders,Finishedauctions,Payment,Auctionitems};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use DB;

class PaymentController extends Controller
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

 
    public function index()
    {
        $id=request('id') ;
        $data=Auctionitems::where('id',$id)->first();     
        // echo"<pre>";print_r($data);die;
        $price=$data->price;
       return view('front.payment.index',compact('data'));
    }
    
    public function store(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        $validator = Validator::make(
            $request->all(),
            [   
                'name'=>'required',
                'cardnumber'=>'required',
                'expirationdate'=>'required',
                'securitycode'=>'required',
              
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data=Auctionitems::where('id',$request->id)->first();     
        // $expiration_date=$request->expirationdate;
        // echo"<pre>";print_r($expiration_date);die;

        $info = Payment::create([
            'auction_id'=> $request->id,
            'name' => $request->name,
            'card_number'=> $request->cardnumber,
            'expiration_date'=> $request->expirationdate,
            'security_code'=> $request->securitycode,
            'amount'=>$data->price,           
        ]);
        
        $order=Orders::where('auction_id',$request->id)->first(); 
        if ($order) {
            // Update the is_payment field to 1
            $order->update(['is_payment' => 1]);

            return response()->json(['status' => 2, 'message' => 'Payment Done Successfully', 'surl' => route('last-bidings')]);
          
          $order->save();
        }
      
        

        return view('front.payment.index');
    }

}
