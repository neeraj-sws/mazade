<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Auctionitems;
use App\Models\Orders;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function initiatePayment($id)
    {
        // echo "<pre>";print_r($id);die;
        $orders = Orders::where('id', $id)->first();

        $response = Http::withHeaders([
            'Authorization' => 'SKJ9N6NZTW-JH9Z9GTDTJ-KBT2W66TNK',
            'Content-Type' => 'application/json',
        ])->post('https://secure-jordan.paytabs.com/payment/request', [
                    'profile_id' => '138034',
                    'tran_type' => 'sale',
                    'tran_class' => 'ecom',
                    'cart_id' => "$orders->id",
                    'cart_description' => 'null',
                    'cart_currency' => 'JOD',
                    'cart_amount' => $orders->price,
                    'callback' => route('payment.callback'),
                    'return' => route('payment.complete'),
                    // "redirect_url" => "https://secure-jordan.paytabs.com/payment/page/REF/redirect",
                    'customer_details' => [
                        'name' => $orders->AuId->user?->name,
                        'email' => $orders->AuId->user?->email,
                        'street1' => $orders->AuId->user?->address,
                        'city' => $orders->AuId->user?->city?->name,
                        'state' => $orders->AuId->user?->city?->state?->state_title,
                        'country' => 'null',
                        'ip' => 'null'
                    ],
                    "hide_shipping" => true,
                ]);


        if ($response->successful()) {
            $responseData = $response->json();


            if (isset($responseData['redirect_url'])) {

                return redirect()->away($responseData['redirect_url']);
            } else {

                Session::flash('response', 'Redirect url not found! Please try again.'); 
                return view('front.payment.index', ['data' => $orders]);
            }
        } else {
                // echo "<pre>";print_r($response->json());die;
            Session::flash('response', 'Something Error Found! Please try again.'); 
            return view('front.payment.index', ['data' => $orders]);
        }

    }

    public function handleCallback(Request $request)
    {
        
        $order = Orders::where('id', $request->cart_id)->first();

        if ($order && $request->payment_result['response_status'] == 'A') {
            $numericCode = mt_rand(100000, 999999);
            $order->update([
                'is_payment' => 1,
                'code' => $numericCode,
            ]);
        }

        Transaction::create([
            'transaction_id' => $request->tran_ref,
            'order_id' => $order->id,
            'transaction_detail' => json_encode($request->all()),
        ]);

        return response()->json(['status' => 'success'], 200);
    }
    
    public function complete(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        $data=$error ="";
        $request = $request->all();
        $id = $request['cartId'];
        $status = $request['respStatus'];
        $message = $request['respMessage'];
         if(!empty($request)){
            $data = Orders::with('AuId')->where('id', $id)->first();
         }else{ 
            return view('front.payment.paymentFailed');
         }
        
        $data = Orders::with('AuId')->where('id', $id)->first();
        
        $user = User::find($data->AuId->user_id);
        Auth::login($user);
        
        $success = 'fail';
        if($status == 'A'){
            $success = 'success' ;
        }
        
        return view('front.payment.index', compact('data','message','success'));
    }
}
