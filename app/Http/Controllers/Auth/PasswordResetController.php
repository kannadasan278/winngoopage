<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\User;
use Carbon\Carbon;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Category;
use App\Models\Merchant;
use App\Models\MerchantPrice;

class PasswordResetController extends Controller
{
    // Show the form to request a password reset link
    public function showLinkRequestForm()
    {
           $merchanttype = MerchantPrice::get();
        $categories = Category::with('subcategory')
            ->inRandomOrder()
            ->limit(5)
            ->orderBy('category_name_en')
            ->get();

        $categoriesrandom = Category::orderBy('category_name_en')->inRandomOrder()->limit(6)->get();
        $merchants = Merchant::with('businessHours')
            ->paginate(5);

        return view('auth.customer.passwords.email',compact('merchants','categoriesrandom','categories','merchanttype'));
    }
 public function merchantRequestForm()
    {
        return view('auth.merchant.passwords.email');
    }
    // Send the password reset link to the user
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $token = Str::random(60);

            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            $resetLink = url('/password/reset/' . $token);

        if ($user) {
    $token = Str::random(60);

    DB::table('password_resets')->insert([
        'email' => $request->email,
        'token' => $token,
        'created_at' => Carbon::now()
    ]);

    $resetLink = url('/password/reset/' . $token);
            $email = $request->email;
            $user = $email;
      Mail::send('emails.password-reset', ['resetLink' => $resetLink, 'email' => encrypt($email)], function ($m) use ($user) {
                $m->from('noreply@winngoo.com', 'Winngoo Pages');
                $m->to($user, 'customer')->subject('Reset Link');
            });
        }

        return back()->with('status', 'We have emailed your password reset link!');
    }
    }

      // Send the password reset link to the user
    public function merchantResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $token = Str::random(60);

            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            $resetLink = url('/merchant/reset/' . $token);

        if ($user) {
    $token = Str::random(60);

    DB::table('password_resets')->insert([
        'email' => $request->email,
        'token' => $token,
        'created_at' => Carbon::now()
    ]);

    $resetLink = url('/merchant/reset/' . $token);
            $email = $request->email;
            $user = $email;
      Mail::send('emails.password-reset', ['resetLink' => $resetLink, 'email' => encrypt($email)], function ($m) use ($user) {
                $m->from('noreply@winngoo.com', 'Winngoo Pages');
                $m->to($user, 'customer')->subject('Reset Link');
            });
        }

        return back()->with('status', 'We have emailed your password reset link!');
    }
    }
    // Show the form to reset the password
    public function showResetForm($token)
    {
          $merchanttype = MerchantPrice::get();
        $categories = Category::with('subcategory')
            ->inRandomOrder()
            ->limit(5)
            ->orderBy('category_name_en')
            ->get();

        $categoriesrandom = Category::orderBy('category_name_en')->inRandomOrder()->limit(6)->get();
        $merchants = Merchant::with('businessHours')
            ->paginate(5);

        return view('auth.customer.passwords.reset', ['token' => $token],compact('merchants','categoriesrandom','categories','merchanttype'));
    }
    // Show the form to reset the password
    public function merchantResetForm($token)
    {
        return view('auth.merchant.passwords.reset', ['token' => $token]);
    }

    // Handle the password reset
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required'
        ]);

        $reset = DB::table('password_resets')->where([
            ['token', $request->token],
            ['email', $request->email],
        ])->first();

        if (!$reset) {
            return back()->withErrors(['email' => 'Invalid token!']);
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Delete the password reset token
        DB::table('password_resets')->where(['email' => $request->email])->delete();
        request()->session()->flash('success','Your password has been reset!');
        return redirect('user/login');
    }
    // Handle the password reset
    public function merchantreset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required'
        ]);

        $reset = DB::table('password_resets')->where([
            ['token', $request->token],
            ['email', $request->email],
        ])->first();

        if (!$reset) {
            return back()->withErrors(['email' => 'Invalid token!']);
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Delete the password reset token
        DB::table('password_resets')->where(['email' => $request->email])->delete();
        request()->session()->flash('success','Your password has been reset!');
        return redirect('merchant/login');
    }
}
