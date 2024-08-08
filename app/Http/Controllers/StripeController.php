<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\MerchantHour;
use App\Models\MerchantPrice;
use App\Models\Transaction;
use App\Models\Business;
use Stripe;
use Stripe\Exception\InvalidRequestException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Session;
use Mail;
use Carbon\Carbon;
use App\Mail\NotifyMail;

class StripeController extends Controller
{
    public function showRegisterForm()
    {
        return view('merchant.register');
    }

    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            // Add validation rules
        ]);
           // Store the uploaded file if it exists
        $filePath = null;
        if ($request->hasFile('image')) {
             $filePath = time().'.'.$request->image->extension();
             $request->image->move(public_path('logos'), $filePath);
        }

            // Store the merchant data in session, excluding the 'image' field
        $merchantData = $request->except('image', 'stripeToken');
        $merchantData['image'] = $filePath; // Add file path to the merchant data
        $request->session()->put('merchant_data', $merchantData);


    return response()->json([
        'message' => 'Registration data saved successfully.',
    ]);
    }

    public function processPayment(Request $request)

    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        // Retrieve the stored merchant data from session
        $merchantData = $request->session()->get('merchant_data');

        $currencySymbol = config('constants.currency_symbol');
            $customer = Stripe\Customer::create(array(

                        'name' => $merchantData['first_name'],
                        'email' => $merchantData['email'],
                        "source" => $request->stripeToken

                    ));

        $charge = Stripe\Charge::create ([

                "amount" => $request->total_amount * 100,

                "currency" => $currencySymbol,

                "customer" => $customer->id,

                "description" => "Merchant registration payment.",



        ]);
           $merchant = Merchant::create([
            'merchant_parent_id'=>NULL,
            'username' => NULL,
            'business_type_id' => $merchantData['business_type_id'],
            'first_name' => $merchantData['first_name'],
            'last_name' => $merchantData['last_name'],
            'email' => $merchantData['email'],
            'password' => bcrypt($merchantData['password']),
            'address_line_1' => $merchantData['address_line_1'],
            'address_line_2' => $merchantData['address_line_2'],
            'address_line_3' => $merchantData['address_line_3'],
            'city' => $merchantData['city'],
            'post_code' => $merchantData['post_code'],
            'country' => $merchantData['country'],
            'phone_number' => $merchantData['phone_number'],
            'business_name' => $merchantData['business_name'],
            'trading_name' => $merchantData['trading_name'],
            'category_id' => $merchantData['category_id'],
            'othercategory' => $merchantData['othercategory'],
            'sub_category_id' => isset($merchantData['sub_category_id']) ? $merchantData['sub_category_id'] : [],
            'othersubcategory' => $merchantData['othersubcategory'],
            'is_franchise' =>0,
            'business_description' => $merchantData['business_description'],
            'website_link' => $merchantData['website_link'],
            'image' => 'logos/'.$merchantData['image'],
            'coupon_code'=>$merchantData['coupon_code'],
            'rejected_comments' => NULL
        ]);

         // Save merchant hours
        foreach ($merchantData['dayOfWeek'] as $index => $dayOfWeek) {
            MerchantHour::create([
                'merchant_id' => $merchant->id,
                'day_of_week' => $dayOfWeek,
                'status' => $merchantData['status'][$index],
                'opening_time' => $merchantData['openingTime'][$index],
                'closing_time' => $merchantData['closingTime'][$index],
                'day_type' => $merchantData['dayType'][$index],
                'day_order' => $merchantData['dayOrder'][$index],
            ]);
        }

          // Save the transaction data to the database
        Transaction::create([
            'merchant_id' => $merchant->id,
            'stripe_charge_id' => $charge->id,
            'amount' => $charge->amount / 100, // Convert to dollars
            'currency' => $charge->currency,
            'status' => $charge->status,
            'description' => $charge->description,
            'metadata' => $charge->metadata,
        ]);

        //mail
            $fname = $merchantData['first_name'];
            $lname = $merchantData['last_name'];
            $email = $merchantData['email'];
            $user = $email;

            Mail::send('emails.merchantpayregister', ['fname' => $fname,'lname' => $lname, 'email' => encrypt($email)], function ($m) use ($user) {
                $m->from('noreply@winngoo.com', 'Winngoo Pages Payment');
                $m->to($user, 'customer')->subject('Payment Successful - Application Under Review');
            });

         return response()->json([
            'message' => 'Payment completed successfully.<br/>Your application is now under review, and you can expect a decision within 7 to 28 days. We appreciate your patience during this process.<br/><a href="' . route('merchant.loginform') . '" class="login-link">Go Login</a>'
        ]);

    }


public function processFreePayment(Request $request)

    {

        $merchantData = $request->session()->get('merchant_data');


           $merchant = Merchant::create([
            'merchant_parent_id'=>NULL,
            'username' => NULL,
            'business_type_id' => $merchantData['business_type_id'],
            'first_name' => $merchantData['first_name'],
            'last_name' => $merchantData['last_name'],
            'email' => $merchantData['email'],
            'password' => bcrypt($merchantData['password']),
            'address_line_1' => $merchantData['address_line_1'],
            'address_line_2' => $merchantData['address_line_2'],
            'address_line_3' => $merchantData['address_line_3'],
            'city' => $merchantData['city'],
            'post_code' => $merchantData['post_code'],
            'country' => $merchantData['country'],
            'phone_number' => $merchantData['phone_number'],
            'business_name' => $merchantData['business_name'],
            'trading_name' => $merchantData['trading_name'],
            'category_id' => $merchantData['category_id'],
            'othercategory' => $merchantData['othercategory'],
            'sub_category_id' => isset($merchantData['sub_category_id']) ? $merchantData['sub_category_id'] : [],
            'othersubcategory' => $merchantData['othersubcategory'],
            'is_franchise' =>0,
            'business_description' => $merchantData['business_description'],
            'website_link' => $merchantData['website_link'],
            'image' => 'logos/'.$merchantData['image'],
            'coupon_code'=>$merchantData['coupon_code'],
            'rejected_comments' => NULL
        ]);

         // Save merchant hours
        foreach ($merchantData['dayOfWeek'] as $index => $dayOfWeek) {
            MerchantHour::create([
                'merchant_id' => $merchant->id,
                'day_of_week' => $dayOfWeek,
                'status' => $merchantData['status'][$index],
                'opening_time' => $merchantData['openingTime'][$index],
                'closing_time' => $merchantData['closingTime'][$index],
                'day_type' => $merchantData['dayType'][$index],
                'day_order' => $merchantData['dayOrder'][$index],
            ]);
        }

        //mail
            $fname = $merchantData['first_name'];
            $lname = $merchantData['last_name'];
            $email = $merchantData['email'];
            $user = $email;

            Mail::send('emails.merchantfreeregister', ['fname' => $fname,'lname' => $lname, 'email' => encrypt($email)], function ($m) use ($user) {
                $m->from('noreply@winngoo.com', 'Winngoo Pages Free Member');
                $m->to($user, 'customer')->subject('Free Member Successful - Application Under Review');
            });

         return response()->json([
            'message' => 'Merchant completed successfully.<br/>Your application is now under review, and you can expect a decision within 7 to 28 days. We appreciate your patience during this process.<br/><a href="' . route('merchant.loginform') . '" class="login-link">Go Login</a>'
        ]);

    }

    public function paymentSuccess()
    {
        return view('merchant.success');
    }
}
