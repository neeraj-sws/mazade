<?php

namespace App\Http\Controllers\Companies;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\{Auction,Auctionitems,Oders,Companies,Upload};
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

    public function companies_register(Request $request){
        // echo '<pre>'; print_r($request->all()); die;
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile_number' => ['required', 'string', 'max:10'],
            'address' => ['required'],
            'password' => ['required', 'string', 'min:8'],
            'file_id'=>['required'],
        ]);
        
        Companies::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'address' => $request['address'],
            'pnumber' => $request['mobile_number'],
            'file_id'=> $request['file_id'],
        ]);
        // echo '<pre>'; print_r($request->all()); die;
        return response()->json(['status' => 2, 'message' => 'Company Registered Successfully', 'surl' => route('companieslogin.form')]);
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
