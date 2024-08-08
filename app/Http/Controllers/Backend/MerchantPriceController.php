<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MerchantPrice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Validator;
use Alert;

class MerchantPriceController extends Controller
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
         if (is_null($this->user) || !$this->user->can('merchantfees.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $merchantPrices = MerchantPrice::all();
        return view('backend.merchant_prices.index', compact('merchantPrices'));
    }

    public function create()
    {
          if (is_null($this->user) || !$this->user->can('merchantfees.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }
        return view('backend.merchant_prices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'range' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'vat' => 'required|numeric',
            'total_price' => 'required|numeric',
        ]);

        MerchantPrice::create($request->all());
        Alert::success('Success', 'Merchant Price created successfully.');
        return redirect()->route('admin.merchant-prices.index');
    }

    public function show(MerchantPrice $merchantPrice)
    {
          if (is_null($this->user) || !$this->user->can('merchantfees.show')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }
        return view('backend.merchant_prices.show', compact('merchantPrice'));
    }

    public function edit(MerchantPrice $merchantPrice)
    {
         if (is_null($this->user) || !$this->user->can('merchantfees.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }
        return view('backend.merchant_prices.edit', compact('merchantPrice'));
    }

    public function update(Request $request, MerchantPrice $merchantPrice)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'range' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'vat' => 'required|numeric',
            'total_price' => 'required|numeric',
        ]);

        $merchantPrice->update($request->all());
        Alert::success('Success', 'Merchant Price updated successfully.');
        return redirect()->route('admin.merchant-prices.index');
    }

    public function destroy(MerchantPrice $merchantPrice)
    {
          if (is_null($this->user) || !$this->user->can('merchantfees.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any admin !');
        }

        $merchantPrice->delete();
        Alert::success('Success', 'Merchant Price deleted successfully.');
        return redirect()->route('admin.merchant-prices.index');
    }
}
