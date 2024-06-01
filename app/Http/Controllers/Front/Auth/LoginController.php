<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function logout(){ 
        Auth::guard('web')->logout();
        return redirect('/login');
    }
    
     protected function login(Request $request)
    {
       
        $validatedData = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $user = User::where("role", $request->user)->where("email", $request->email)->first();

        if($user) {
            if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
                // Authentication passed...
                return response()->json(['status' => 2, 'message' => 'User Login Successfully', 'surl' => route('all-auction')]);
            } else {
                return response()->json(['status' => 0, 'errors' => ['Invalid Email or Password']]);
            }
        } else {
            return response()->json(['status' => 0, 'errors' => ["Credential doesn't exist"]]);
        }


}

}
