<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Session;
use DB;
use Hash;
use Mail;
use Carbon\Carbon;
use App\Mail\NotifyMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Merchant;
use App\Models\MerchantPrice;
use App\Models\Review;
use App\Models\Tagline;
use App\Models\About;
use App\Models\News;
use App\Models\Contact;
use App\Mail\EnquiryReceived;

class FrontendController extends Controller
{

    public function index(Request $request){
        return redirect()->route($request->user()->role);
    }

    public function home(){
         $now = now(); // Current date and time
         $currentDay = $now->format('l'); // Current day of the week (e.g., 'Monday')

        // return $category;
        $banners = Banner::all();
        $merchants = Merchant::with('businessHours', 'businessType')
        ->where('status', 'approved')
        ->where('business_type_id', 4)
        ->orderBy('created_at', 'desc') // Order by the created_at column in descending order
        ->limit(20)
        ->get();
        $categories = Category::orderBy('category_name_en')->get();
        $categoriesrandom = Category::with('merchants')->orderBy('category_name_en')->inRandomOrder()->limit(6)->get();
        $merchanttype = MerchantPrice::get();
        $query = Merchant::with(['businessHours', 'businessType','taglines'])
                ->where('status', 'approved')
                ->orderBy('created_at', 'desc')
                ->where('business_type_id', '!=', 4) // Exclude business type with ID 4
                ->limit(15);

        $merchants_business = $query->paginate(20);
         // Add ratings, review counts, and opening status to each merchant
        $merchants_business->getCollection()->transform(function ($merchant) use ($now, $currentDay) {
        // Calculate the average rating
        $merchant->averageRating = Review::where('merchant_id', $merchant->id)
                                         ->where('status', 'active') // Optional: include only active reviews
                                         ->avg('rating');

        // Calculate the total number of reviews
        $merchant->reviewCount = Review::where('merchant_id', $merchant->id)
                                        ->where('status', 'active') // Optional: include only active reviews
                                        ->count();

        // Determine the current business hour for the day
        $currentBusinessHour = $merchant->businessHours->where('day_of_week', $currentDay)->first();

        if ($currentBusinessHour) {
            $openTime = $currentBusinessHour->opening_time;
            $closeTime = $currentBusinessHour->closing_time;

            // Convert times to Carbon instances for comparison
            $open = Carbon::parse($openTime);
            $close = Carbon::parse($closeTime);
            $currentTime = $now->copy()->setTimeFromTimeString($now->format('H:i'));

            if ($currentTime->between($open, $close)) {
                $merchant->status = 'open';
                $merchant->statusMessage = 'until '.'-'.$close->format('g:i A');
            } else {
                $merchant->status = 'closed';
                $merchant->statusMessage = 'Closed - Opens at ' . $open->format('g:i A');
            }
        } else {
            $merchant->status = 'closed';
            $merchant->statusMessage = 'No business hours available';
        }

        return $merchant;
    });

        return view('frontend.index',compact('banners','categories','merchants','categoriesrandom','merchanttype','merchants_business'));
    }

    // Login
    public function login(){
           $merchanttype = MerchantPrice::get();
        $categories = Category::with('subcategory')
            ->inRandomOrder()
            ->limit(5)
            ->orderBy('category_name_en')
            ->get();

        $categoriesrandom = Category::orderBy('category_name_en')->inRandomOrder()->limit(6)->get();
        $merchants = Merchant::with('businessHours')
            ->paginate(5);

        return view('frontend.pages.login',compact('merchants','categoriesrandom','categories','merchanttype'));
    }

    public function checkEmailExists(Request $request)
    {
        $email = $request->input('email');
        $exists = User::where('email', $email)->exists();

        return response()->json(['exists' => $exists]);
    }

    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');
       $user = User::where('email', $request->email)->where('email_verified_at', '!=', null)->first();
        //    if (!$user) {
        //     return response()->json(['success' => false, 'errors' => 'This email is not registered.'], 422);
        // }

        if (Auth::attempt($credentials) && $user->role == 'user') {
            Session::put('user', $request->email);
            return response()->json(['success' => true, 'redirect_url' => route('user')]);
        }

        return response()->json(['success' => false, 'message' => 'Invalid email or password.']);
    }


    public function logout(){
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success','Logout successfully');
        return back();
    }

    public function register(){
            $merchanttype = MerchantPrice::get();
        $categories = Category::with('subcategory')
            ->inRandomOrder()
            ->limit(5)
            ->orderBy('category_name_en')
            ->get();

        $categoriesrandom = Category::orderBy('category_name_en')->inRandomOrder()->limit(6)->get();
        $merchants = Merchant::with('businessHours')
            ->paginate(5);

        return view('frontend.pages.register',compact('merchants','categoriesrandom','categories','merchanttype'));
    }

    public function checkRegistration(Request $request)
    {
        $emailExists = User::where('email', $request->email)->exists();
        $mobileExists = User::where('mobile_number', $request->mobile_number)->exists();

        return response()->json([
            'email_exists' => $emailExists,
            'mobile_exists' => $mobileExists,
        ]);
    }

    public function registerSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'mobile_number' => 'required|digits:11',
            'postcode' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'agree' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Generate the unique member_id
        $validatedData['member_id'] = User::generateMemberId();

        // Set the expiration date to one year from now
        $validatedData['expires_at'] = Carbon::now()->addYear();

        $data = random_bytes(16);
            assert(strlen($data) == 16);
            $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
            $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
            $guid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));

        $user = User::create([
            'name' => $request->name,
            'lname'=>$request->lname,
            'mobile_number' => $request->mobile_number,
            'postcode' => $request->postcode,
            'email' => $request->email,
            'email_verification_code' => $guid,
            'email_verification_code_gen_date' => date('Y-m-d H:i:s'),
            'gender'=>NULL,
            'birth_month'=>NULL,
            'password' => Hash::make($request->password),
            'member_id' => $validatedData['member_id'],
            'expires_at' => $validatedData['expires_at'],
        ]);
        $mail = $request->email;
        $password = $request->password;

        //mail
            $name = $request->name;
            $lname = $request->lname;
            $email = $mail;
            $user = $email;

            Mail::send('emails.memberregister', ['name' => $name,'lname' => $lname, 'guid' => encrypt($guid), 'email' => encrypt($email)], function ($m) use ($user) {
                $m->from('reena@winngooconsultancy.in', 'Winngoo Pages');
                $m->to($user, 'customer')->subject('Winngoo Pages - Account Verification Link');
            });

        Session::put('user',$request->email);
        return response()->json(['success' => 'An account verification link has been sent to your email address.Please click on the link to complete the sign up process.']);


    }

    public function create(array $data){
        return User::create([
            'name'=>$data['name'],
            'lname'=>$data['lname'],
            'postcode'=>$data['postcode'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            'status'=>'active'
            ]);
    }
    // Reset password
    public function showResetForm(){
        return view('auth.passwords.old-reset');
    }

  public function email_verification($email, $guid, Request $request)
    {
        try {
            $email = decrypt($email);
            $guid = decrypt($guid);
            $userdet = User::where('email', $email)->where('email_verification_code', $guid)->get();
            if ($userdet) {
                $verification_date = $userdet[0]['email_verification_code_gen_date'];
                $end_date = Carbon::createFromFormat('Y-m-d H:i:s', $verification_date)->addDays(1);
                $currentDate = date('Y-m-d H:i:s');
                $currentDate = date('Y-m-d  H:i:s', strtotime($currentDate));
                $startDate = date('Y-m-d  H:i:s', strtotime($verification_date));
                $endDate = date('Y-m-d  H:i:s', strtotime($end_date));
                if (($currentDate >= $startDate) && ($currentDate <= $endDate)) {
                    $user = User::find($userdet[0]['id']);
                    $user->update([
                        'email_verified_at' => date('Y-m-d H:i:s'),
                        // 'referral_code' => $this->alphaNumeric($request),
                        // 'access' => 1,
                    ]);
                    $userdet = User::where('id', $userdet[0]['id'])->first();
                    Auth::login($userdet);
                    return redirect('user/customerdashboard');
                } else {
                    $user = User::find($userdet[0]['id']);
                    $user->delete();
                    return redirect('/user/register')->withErrors(['Verification Link Expired. Please Register Again.']);
                }
            } else {
                return redirect('/user/register')->withErrors(['Invalid Verification Link']);
            }
        } catch (DecryptException $e) {
            return redirect('/user/register')->withErrors(['Invalid Verification Link']);
        }
    }

      public function about(Request $request)
    {
    $categoriesrandom = Category::orderBy('category_name_en')->inRandomOrder()->limit(6)->get();

    $query = Category::orderBy('category_name_en');

    if ($request->has('s')) {
        $query->where('category_name_en', 'LIKE', $request->input('s') . '%');
    }
    if($request->input('s') == 'all'){
     $query = Category::orderBy('category_name_en');
    }
    $categories = $query->get();
    $merchanttype = MerchantPrice::get();
    $about = About::latest()->first();
    return view('frontend.pages.about-us', compact('categories','categoriesrandom','merchanttype','about'));
}

  public function news(Request $request)
    {
    $categoriesrandom = Category::orderBy('category_name_en')->inRandomOrder()->limit(6)->get();

    $query = Category::orderBy('category_name_en');

    if ($request->has('s')) {
        $query->where('category_name_en', 'LIKE', $request->input('s') . '%');
    }
    if($request->input('s') == 'all'){
     $query = Category::orderBy('category_name_en');
    }
    $categories = $query->get();
    $merchanttype = MerchantPrice::get();
    $news = News::latest()->first();
    return view('frontend.pages.news', compact('categories','categoriesrandom','merchanttype','news'));
}

  public function contact(Request $request)
    {
    $categoriesrandom = Category::orderBy('category_name_en')->inRandomOrder()->limit(6)->get();

    $query = Category::orderBy('category_name_en');

    if ($request->has('s')) {
        $query->where('category_name_en', 'LIKE', $request->input('s') . '%');
    }
    if($request->input('s') == 'all'){
     $query = Category::orderBy('category_name_en');
    }
    $categories = $query->get();
    $merchanttype = MerchantPrice::get();
    return view('frontend.pages.contact', compact('categories','categoriesrandom','merchanttype'));

}

public function handleContactForm(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|email',
            'telephone' => 'nullable|string', // Make optional if needed
            'subject' => 'required|string',
            'message' => 'required|string|min:5',
        ]);

        // Create a new contact entry
        Contact::create($validated);
       // Send the confirmation email
    Mail::to($validated['email'])->send(new EnquiryReceived(
        $validated['name'],
        $validated['email'],
        $validated['telephone'],
        $validated['subject'],
        $validated['message']
    ));
        // Return a JSON response
        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully!'
        ]);
    }
}
