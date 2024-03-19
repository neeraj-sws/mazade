<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    protected $user;
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
     
       public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function registerSubmit(Request $request)
    {

       
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile_number' => ['required', 'string', 'min:11'],
            'user_id' => ['required'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        try {
         User::create([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role_id' => $request['user_id'],
            'mobile_number' => $request['mobile_number'],
        ]);

        return response()->json(['status' => 2, 'message' => 'User Login Successfully', 'surl' => route('home')]);
    }
        catch (\Exception $e) {
            // If an error occurs during registration
            return response()->json(['status' => 0, 'message' => 'Registration failed', 'errors' => $e->getMessage()]);
        }
    

    }
  
}
