<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;
use App\User;
use Auth;
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
    public function login(Request $request)
{
    // Validate Login Data
    $request->validate([
        'email' => 'required|max:50',
        'password' => 'required',
    ]);

    // Attempt to login with email
    if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        return response()->json([
            'success' => true,
            'message' => 'Successfully Logged in!',
            'redirect_url' => route('admin')
        ]);
    } else {
        // Attempt to login with username
        if (Auth::guard('admin')->attempt(['username' => $request->email, 'password' => $request->password], $request->remember)) {
            return response()->json([
                'success' => true,
                'message' => 'Successfully Logged in!',
                'redirect_url' => route('admin')
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid email and password'
        ], 401);
    }
}

// public function ajaxLogin(Request $request)
//     {
//         // Validate the request
//         $validator = Validator::make($request->all(), [
//             'email' => 'required|email',
//             'password' => 'required|min:8',
//         ]);

//         if ($validator->fails()) {
//             return response()->json([
//                 'errors' => $validator->errors()
//             ], 422);
//         }

//         // Attempt to log the user in
//         if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
//             // Authentication passed...
//             return response()->json([
//                 'message' => 'Login successful!',
//                 'redirect_url' => route('admin') // Replace with your intended redirect URL
//             ]);
//         }

//         return response()->json([
//             'errors' => [
//                 'email' => ['These credentials do not match our records.'],
//             ]
//         ], 422);
//     }


    public function credentials(Request $request){
        return ['email'=>$request->email,'password'=>$request->password,'status'=>'active','role'=>'admin'];
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirect($provider)
    {
        // dd($provider);
     return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider)
    {
        $userSocial =   Socialite::driver($provider)->stateless()->user();
        $users      =   User::where(['email' => $userSocial->getEmail()])->first();
        // dd($users);
        if($users){
            Auth::login($users);
            return redirect('/')->with('success','You are login from '.$provider);
        }else{
            $user = User::create([
                'name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'image'         => $userSocial->getAvatar(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => $provider,
            ]);
         return redirect()->route('home');
        }
    }

      public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}
