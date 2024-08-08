<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Merchantterm;
use Alert;
use Illuminate\Support\Facades\Validator;


class MerchanttermsController extends Controller
{
        public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          if (is_null($this->user) || !$this->user->can('cms.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any role !');
        }

        $merchantterm = Merchantterm::latest()->first();
        return view('backend.cms.merchantterm', compact('merchantterm'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()], 422);
        }

        // Find the Merchantterm item by ID
        $Merchantterm = Merchantterm::findOrFail($id);

        // Update Merchantterm content
        $Merchantterm->content = $request->input('content');
        $Merchantterm->save();

        // Return success response
        return response()->json(['status' => 'success', 'message' => 'Merchant Terms & Conditions updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
