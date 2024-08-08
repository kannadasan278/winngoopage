<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Validator;
use Alert;

class CouponController extends Controller
{
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
        if (is_null($this->user) || !$this->user->can('coupon.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $coupons = Coupon::all();
        return view('backend.coupons.index', compact('coupons'));
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('coupon.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }
        return view('backend.coupons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:coupons|max:255',
            'coupon_type' =>'required',
            'discount' => 'required|numeric',
            'start_date' => 'required|date',
            'expiry_date' => 'required|date',
        ]);

        Coupon::create($request->all());
         Alert::success('Success', 'Coupon created successfully.');
        return redirect()->back();
    }

    public function show(Coupon $coupon)
    {
        return view('backend.coupons.show', compact('coupon'));
    }

    public function edit(Coupon $coupon)
    {
         if (is_null($this->user) || !$this->user->can('coupon.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }
        return view('backend.coupons.edit', compact('coupon'));
    }

    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'code' => 'required|max:255|unique:coupons,code,' . $coupon->id,
            'coupon_type' =>'required',
            'discount' => 'required|numeric',
            'start_date' => 'required|date',
            'expiry_date' => 'required|date',
        ]);

        $coupon->update($request->all());
         return response()->json(['success' => 'Coupon updated successfully.']);
    }

    public function destroy(Coupon $coupon)
    {
        if (is_null($this->user) || !$this->user->can('coupon.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any admin !');
        }
        $coupon->delete();
        Alert::success('Success', 'Coupon deleted successfully.');
        return redirect()->route('admin.coupons.index');
    }
}
