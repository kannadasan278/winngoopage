<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Session;
use DB;
use Hash;
use Alert;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Import the Validator facade
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Merchant; // Make sure to import the Merchant model
use App\Models\MerchantHour;
use App\Models\Country;
use App\Models\Business;
use App\Models\MerchantPrice;
use App\Models\Coupon;
use Illuminate\Support\Facades\Storage;
use App\Models\Transaction;
use Mail;
use App\Mail\NotifyMail;

class MerchantController extends Controller
{

 public function merchantdashboard(){
        return view('merchant.pages.dashboard');
    }

    // Login
    public function merchantlogin(){
             $merchanttype = MerchantPrice::get();
        $categories = Category::with('subcategory')
            ->inRandomOrder()
            ->limit(5)
            ->orderBy('category_name_en')
            ->get();

        $categoriesrandom = Category::orderBy('category_name_en')->inRandomOrder()->limit(6)->get();
        $merchants = Merchant::with('businessHours')
            ->paginate(5);

        return view('merchant.pages.login',compact('merchants','categoriesrandom','categories','merchanttype'));
    }

     public function merchantloginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email', 'password');
        $user = Merchant::where('email', $request->email)->first();

        if (Auth::guard('merchant')->attempt(['email' => $request->email, 'password' => $request->password])) {

            Auth::guard('merchant')->attempt($credentials);
            Session::put('merchant', $request->email);
            return response()->json(['success' => true, 'redirect_url' => route('merchantdashboard')]);
        }else{
                    return response()->json(['success' => false, 'message' => 'Invalid email or password.']);

        }

        return response()->json(['success' => false, 'message' => 'Invalid email or password.']);
    }


    public function merchantlogout(){
        Session::forget('merchant');
        Auth::logout();
        request()->session()->flash('success','Logout successfully');
        return back();
    }


    public function registerSubmit(Request $request){
        // return $request->all();
        $this->validate($request,[
            'name'=>'string|required|min:2',
            'email'=>'string|required|unique:users,email',
            'password'=>'required|min:6|confirmed',
        ]);
        $data=$request->all();
        // dd($data);
        $check=$this->create($data);
        Session::put('user',$data['email']);
        if($check){
            request()->session()->flash('success','Successfully registered');
            return redirect()->route('home');
        }
        else{
            request()->session()->flash('error','Please try again!');
            return back();
        }
    }
    public function create(array $data){
        return User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            'status'=>'active'
            ]);
    }
    // Reset password
    public function showResetForm(){
        return view('auth.passwords.old-reset');
    }
   public function register(){
         $merchanttype = MerchantPrice::get();


        $categoriesrandom = Category::orderBy('category_name_en')->inRandomOrder()->limit(6)->get();
        $merchants = Merchant::with('businessHours')
            ->paginate(5);


        $categories = Category::latest()->get();
        $sub_categories = SubCategory::get();
        $business = Business::get();
        $country = Country::get();
        $merchantprice = MerchantPrice::get();
        return view('merchant.pages.register',compact('categories','sub_categories','business','country','merchantprice','merchants','categoriesrandom','merchanttype'));
    }

    public function merchantinfo(){
    //$merchant_profile = Auth::guard('merchant')->user();
    $id = Auth::guard('merchant')->user()->id;
    $merchant_profile = Merchant::with('businessHours','businessType')->findOrFail($id);
      // Assuming 'start_date' is a column in your 'merchants' table
    $start_date = new Carbon($merchant_profile->created_at); // Or use 'start_date' column if available
    $expiry_date = $start_date->copy()->addYear();

    return view('merchant.pages.merchantinfo',compact('merchant_profile','expiry_date'));
    }
     public function merchantprofile(){
    $id = Auth::guard('merchant')->user()->id;
    $merchant_profile = Merchant::with('businessHours','businessType')->findOrFail($id);
        return view('merchant.pages.merchantprofile',compact('merchant_profile'));
    }

public function updatelogo(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $merchant = Auth::guard('merchant')->user();

    if ($request->hasFile('image')) {
        if($merchant->image != NULL){
            Storage::delete($merchant->image);
        }
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $merchant->image = 'logos/'.$imageName;
    }

        $merchant->save();

        return back()->with('success', 'Company logo updated successfully.');


}
 public function merchantprofileupdate(Request $request,$id){
        $merchant=Merchant::findOrFail($id);
        $data=$request->all();
        $status=$merchant->fill($data)->save();
        if($status){
            request()->session()->flash('success','Successfully updated your profile');
        }
        else{
            request()->session()->flash('error','Please try again!');
        }
        return redirect()->back();
    }

     public function getSubcategories(Request $request)
    {
        $categoryId = $request->category_id;
        $subCategory = SubCategory::where('category_id','=', $categoryId)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subCategory);
    }
     public function merchantregistration(Request $request)
    {
        $emailExists = Merchant::where('email', $request->email)->exists();
        $usernameExists = Merchant::where('username', $request->username)->exists();

        return response()->json([
            'email_exists' => $emailExists,
            'username_exists' => $usernameExists,
        ]);
    }
     public function getMerchantPrice($id)
    {
        // Fetch the business type details, including the price
        $businessType = MerchantPrice::find($id);


        if ($businessType) {
            return response()->json(['businessType' => $businessType]);
        } else {
            return response()->json(['error' => 'Business type not found'], 404);
        }
    }
    public function validateCoupon(Request $request)
    {
        $couponCode = $request->coupon_code;
        $businessTypeId = $request->business_type_id;

        // Check if the coupon is valid
        $coupon = Coupon::where('code', $couponCode)->where('status', 'active')->first();
        if ($coupon && $coupon->status == 'active') {
            // Get the discount value
            $discount = $coupon->discount; // Assume this is a fixed amount for simplicity
            $discount_type = $coupon->coupon_type;
            return response()->json([
                'valid' => true,
                'discount' => $discount,
                'discount_type' => $discount_type,
            ]);
        }

        return response()->json(['valid' => false]);
    }

    public function transaction()
    {
        // Fetch all transactions
        $id = Auth::guard('merchant')->user()->id;
        $transactions = Transaction::with('merchant')->where('merchant_id',$id)->get();

        return view('merchant.pages.transactions', compact('transactions'));
    }

    public function franchise(Request $request){
         $id = Auth::guard('merchant')->user()->id;
        $franchise = Merchant::with('businessHours', 'businessType')
            ->where('merchant_parent_id', $id) // $ids should be an array of values
            ->get();
    return view('merchant.pages.franchise',compact('franchise'));
    }

     public function addfranchise(){
        $categories = Category::latest()->get();
        $sub_categories = SubCategory::get();
        $business = Business::get();
        $country = Country::get();
        $merchantprice = MerchantPrice::get();
        // In your controller or wherever you're preparing data for the view
        $merchant = Auth::guard('merchant')->user();
        $selectedBusinessTypeId = $merchant->business_type_id; // or however you store this
        return view('merchant.pages.addfranchise',compact(
        'merchantprice','selectedBusinessTypeId','categories','sub_categories','business','country'));
    }

    public function processfranchisedata(Request $request)

    {
        // Store the uploaded file if it exists
        $filePath = null;
        if ($request->hasFile('image')) {
             $filePath = time().'.'.$request->image->extension();
             $request->image->move(public_path('logos'), $filePath);
        }

            // Store the merchant data in session, excluding the 'image' field
        $merchantData = $request->except('image');
        $merchantData['image'] = $filePath; // Add file path to the merchant data
        $request->session()->put('merchant_data', $merchantData);

        $merchantData = $request->session()->get('merchant_data');

        $merchant_data = Auth::guard('merchant')->user();
           $merchant = Merchant::create([
            'merchant_parent_id'=>$merchant_data->id,
            'username' => NULL,
            'business_type_id' => $merchant_data->business_type_id,
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
            'is_franchise' =>1,
            'business_description' => $merchantData['business_description'],
            'website_link' => $merchantData['website_link'],
            'image' => 'logos/'.$merchantData['image'],
            'coupon_code'=>NULL,
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
                $m->from('noreply@winngoo.com', 'Winngoo Pages Franchise Member');
                $m->to($user, 'customer')->subject('Franchise Member Successful - Application Under Review');
            });

         return response()->json([
            'message' => 'Franchise completed successfully. Your application is now under review, and you can expect a decision within 7 to 28 days. We appreciate your patience during this process.'
        ]);

    }
   public function updateStatus(Request $request)
    {
    $merchant = Merchant::findOrFail($request->id);
    $merchant->is_franchise = 0;
    $status = $merchant->save();
        if($status) {
        return 'true';
        }else{
            return 'false';
        }
    }
    public function updateStatusactive(Request $request)
    {
    $merchant = Merchant::findOrFail($request->id);
    $merchant->is_franchise = 1;
    $status = $merchant->save();
        if($status) {
        return 'true';
        }else{
            return 'false';
        }
    }
    public function franchiseshow(string $id)
    {

        $franchiseshow = Merchant::with('businessHours','businessType')->findOrFail($id);
        // Assuming 'start_date' is a column in your 'merchants' table
        $start_date = new Carbon($franchiseshow->created_at); // Or use 'start_date' column if available
        $expiry_date = $start_date->copy()->addYear();

        return view('merchant.pages.showfranchise',compact('franchiseshow','expiry_date'));
    }

     public function destroy(int $id)
    {


        $merchant = Merchant::find($id);
        if (!is_null($merchant)) {
            $merchant->delete();
        }
        Alert::success('Success', 'franchise has been deleted !!');

        return back();
    }

    }
