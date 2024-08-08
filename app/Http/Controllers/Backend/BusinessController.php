<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use DB;
use Hash;
use Alert;
use Carbon\Carbon;
use Illuminate\Support\Str;
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
use Spatie\Permission\Models\Role;
use App\Models\Review;
use App\Models\Tagline;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function index()
    {
         if (is_null($this->user) || !$this->user->can('merchants.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }

    $merchant_approved = Merchant::with('businessHours','businessType')->where('merchant_parent_id',NULL)->where('status','approved')->get();
    $merchant_pending = Merchant::with('businessHours','businessType')->where('merchant_parent_id',NULL)->where('status','pending')->get();
    $merchant_rejected = Merchant::with('businessHours','businessType')->where('status','rejected')->get();
    $franshise_pending = Merchant::with('businessHours','businessType')->where('merchant_parent_id','!=',NULL)->where('status','pending')->get();
    $merchant_pending = Merchant::with('businessHours','businessType','parent')->where('merchant_parent_id',NULL)->where('status','pending')->get();
    $reviews_pending = Review::with('merchant')->get();


    $merchant_approved_count = $merchant_approved->count();
    $merchant_pending_count = $merchant_pending->count();
    $merchant_rejected_count = $merchant_rejected->count();
    $franshise_pending_count = $franshise_pending->count();
    $reviews_pending_count = $reviews_pending->count();

    return view('backend.business.index',compact('merchant_approved','merchant_pending','merchant_rejected','franshise_pending','merchant_approved_count','merchant_pending_count','merchant_rejected_count','franshise_pending_count','reviews_pending','reviews_pending_count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (is_null($this->user) || !$this->user->can('merchants.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }


        $merchant_details = Merchant::with('businessHours','businessType')->findOrFail($id);
        $Franchises_details = Merchant::with('businessHours','businessType')->where('merchant_parent_id',$id)->get();
        // Assuming 'start_date' is a column in your 'merchants' table
        $start_date = new Carbon($merchant_details->created_at); // Or use 'start_date' column if available
        $expiry_date = $start_date->copy()->addYear();

        $query = Tagline::query();
        $taglines = $query->with('merchant')->where('merchant_id',$id)->get();
        return view('backend.business.show',compact('merchant_details','expiry_date','Franchises_details','taglines'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (is_null($this->user) || !$this->user->can('merchants.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }


        $merchant_details = Merchant::with('businessHours','businessType')->findOrFail($id);
        // Assuming 'start_date' is a column in your 'merchants' table
        $start_date = new Carbon($merchant_details->created_at); // Or use 'start_date' column if available
        $expiry_date = $start_date->copy()->addYear();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::get();
        $business = Business::get();
        $country = Country::get();
        return view('backend.business.edit',compact('merchant_details','expiry_date','categories','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
       public function destroy(int $id)
    {
        if (is_null($this->user) || !$this->user->can('merchants.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any admin !');
        }

        // TODO: You can delete this in your local. This is for heroku publish.
        // This is only for Super Admin role,
        // so that no-one could delete or disable it by somehow.
        if ($id === 1) {
            Alert::success('error', 'Sorry !! You are not authorized to delete this Admin as this is the Super Admin. Please create new one if you need to test !');
            return back();
        }

        $merchant = Merchant::find($id);
        if (!is_null($merchant)) {
            $merchant->delete();
        }
        Alert::success('Success', 'Merchant has been deleted !!');

        return back();
    }

    public function updateStatus(Request $request)
    {
    $merchant = Merchant::findOrFail($request->id);
    $merchant->status = "approved";
    $merchant->is_franchise  == 0;
    $status = $merchant->save();
        if($status) {
        return 'true';
        }else{
            return 'false';
        }
    }
    public function updatependingStatus(Request $request)
    {
    $merchant = Merchant::findOrFail($request->id);
    $merchant->status = "pending";
    $status = $merchant->save();
        if($status) {
        return 'true';
        }else{
            return 'false';
        }
    }

    public function comments($id, Request $request)
{
    $gift = $request->all();

    $merchant = Merchant::findOrFail($request->id);
    $merchant->status = "rejected";
    $merchant->rejected_reason = $gift['delete_reason'];
    if($gift['delete_reason'] == 'Others'){
        $merchant->rejected_comments = $gift['deleted_comments'];
    }else{
       $merchant->rejected_comments = NULL;
    }

    if($merchant->save()){


    request()->session()->flash('success','Merchant has been rejected successfully');
    return back();
    }
    request()->session()->flash('error','Something went wrong!');
    return back();
}
public function updatereviewStatus(Request $request)
    {
    $review = Review::findOrFail($request->id);
    $review->status = "inactive";
    $status = $review->save();
        if($status) {
        return 'true';
        }else{
            return 'false';
        }
    }
public function updatereviewactivetatus(Request $request)
    {
    $review = Review::findOrFail($request->id);
    $review->status = "active";
    $status = $review->save();
        if($status) {
        return 'true';
        }else{
            return 'false';
        }
    }
     public function reviewdelete($id){
        $review=Review::find($id);
        if($review){
            $status=$review->delete();
            if($status){
                Alert::success('Success', 'Review successfully deleted');
                return back();
            }
            else{
                request()->session()->flash('error','Error please try again');
                return back();
            }
        }
        else{
            request()->session()->flash('error','review not found');
            return back();
        }
    }
    public function taglinesapprove(Request $request)
    {
    $tagline = Tagline::findOrFail($request->id);
    if($tagline->status == 'inactive'){
        $tagline->status = "active";
        $status = 'Approved';
    }else{
        $tagline->status = "inactive";
        $status = 'Rejected';
    }

    $status = $tagline->save();
        if($status) {
            Alert::success('Success', "Tagline updated successfully.");
                return back();
     }


    }


}
