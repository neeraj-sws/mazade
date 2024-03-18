<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,Upload,SubCategory,Companies,City,Auction,Oders,Finishedauctions,Auctionitems};
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
       return view('front.company.dashboard');
    }
    

    public function user_company_detail()
    {
       return view('front.company.user_company_detail');
    }

    public function user_category_detail()
    {
       return view('front.company.user_category_detail');
    }
   
}
