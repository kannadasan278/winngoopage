<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function perform()
    {
        Session::flush();

        Auth::logout();

        return redirect('/admin');
    }
    public function customerperform(){
        Session::flush();

        Auth::logout();

        return redirect('/user/login');
    }
      public function merchantperform(){
        Session::flush();

        Auth::logout();

        return redirect('/merchant/login');
    }
}
