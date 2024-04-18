<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category, Upload, SubCategory, Companies, City, Auction, Orders, Finishedauctions, Payment, Auctionitems, Transaction};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use DB;
use Illuminate\Support\Facades\Session;

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


    public function index($id)
    {

        $data = Orders::where('id', $id)->first();
        return view('front.payment.index', compact('data'));
    }

    public function store($id)
    {

        $id = base64_decode($id);
        $order = Orders::with('transaction')->where('id', $id)->first();

        
        $response_message = json_decode($order->transaction->last()->transaction_detail);
        $response_message = $response_message->payment_result->response_message;


        if ($order && $order->is_payment) {
            return redirect()->route('last-bidings');
        }
        
        Session::flash('response', $response_message); 
        return view('front.payment.index', ['data' => $order]);
    }

}
