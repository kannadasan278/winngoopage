<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|unique:subscribers,email',
    ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Subscriber::create([
            'email' => $request->email,
        ]);

        return response()->json(['success' => 'Thank you for subscribing!']);
    }
}

