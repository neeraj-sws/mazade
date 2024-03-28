<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,User,SubCategory,Companies,City,Transaction};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{     
    protected $route;

    protected $single_heading;
    public function __construct()
    {
          $this->route = new \stdClass;
          $this->single_heading = "Dashboard";
    }
     //todo: admin login form
     public function login_form()
     {
        return view('admin.auth.login'); 
     }
 
     //todo: admin login functionality
     public function login_functionality(Request $request){
       
          $request->validate([
             'email'=> ['required', 'string', 'email', 'max:255'],
             'password'=> ['required', 'string', 'min:6'],
         ]);
         if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['status' => 2, 'message' => 'Admin Login Successfully', 'surl' => route('admin.dashboard')]);
        } else {
            return response()->json(['status' => 0, 'errors' => ['Invalid Email or Password']]);
         }
     }
 
     public function dashboard()
     {
        $companies   = Companies::get()->count();
        $categorys = Category::get()->count();
        $customer  = User::get()->count();
        $sub_category   = SubCategory::get()->count();
        $city   = Transaction::get()->count();

         return view('admin.dashboard',['single_heading'=>$this->single_heading ,'categorys'=>$categorys,'companies'=>$companies,'customer'=>$customer, 'sub_category'=>$sub_category,'city'=>$city]);
     }
 
 
     //todo: admin logout functionality
     public function logout(){
         Auth::guard('admin')->logout();
         return redirect()->route('admin.adminlogin.form');
     }
}