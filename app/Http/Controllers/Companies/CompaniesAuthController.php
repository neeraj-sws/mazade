<?php

namespace App\Http\Controllers\Companies;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\{Auction,Auctionitems,Oders,Companies,Upload,user,Companyinfo};
use App\Http\Controllers\Controller;

class CompaniesAuthController extends Controller
{
    //todo: admin login form
    public function login_form()
    {
        if(!Auth::guard('companie')->user()){
        return view('companies.login-form');
        }else{
        return redirect('/companies/dashboard');
        }
    }

    //todo: admin login functionality
    public function login_functionality(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    
        if (Auth::guard('companie')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['status' => 2, 'message' => 'Company Login Successfully', 'surl' => route('companie.dashboard')]);
        } else {
            return response()->json(['status' => 0, 'errors' => 'Invalid Email or Password']);
        }
    }


    public function showRegistrationForm()
    {
 
        return view('auth.register');
    }

    public function companies_register(Request $request)
    {
        
    //  echo "<pre>";print_r($request->all());die;
        $validatedData = $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:10'],
            'address' => ['required'],
            'password' => ['required', 'string', 'min:8'],
            'company_name' => ['required', 'string', 'max:255'],
            'company_phone' => ['required', 'string', 'max:10'],
            'commercial_register' => ['required'],
           
        ]);
    
        // Create the user
        $user = User::create([
            'name' => $request['firstName'],
            'last_name' => $request['lastName'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
            'mobile_number' => $request['phone'],
        ]);

        $company = Companyinfo::create([
            'user_id' => $user->id, 
            'company_name' => $request['company_name'],
            'compan_phone' => $request['company_phone'],
            'address' => $request['address'],
            'commercial_register'=> $request['commercial_register'],
        ]);
    
        // Return the response
        return response()->json(['status' => 2, 'message' => 'Company registration Successfully', 'surl' => route('home')]);
    }
    

    public function image_upload(Request $request)
    {
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
    
    public function detaills($id)
    {

        $startauction = Auction::with(['CatId'])->findOrFail($id);
      
        return view('companies.detaills',['startauction' => $startauction ]);
    }

    //todo: admin logout functionality
    public function logout(){
        Auth::guard('companie')->logout();
        return redirect()->route('companieslogin.form');
    }
    
}
