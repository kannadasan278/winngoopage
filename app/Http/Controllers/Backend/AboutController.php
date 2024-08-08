<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\About;
use Alert;
use Illuminate\Support\Facades\Validator;


class AboutController extends Controller
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

        $about = About::latest()->first();
        return view('backend.cms.about', compact('about'));
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
            'about_intro_1' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()], 422);
        }

        // Find the about item by ID
        $about = About::findOrFail($id);

        // Update about content
        $about->about_intro_1 = $request->input('about_intro_1');
        $about->about_intro_2 = $request->input('about_intro_2');
        $about->about_online_use = $request->input('about_online_use');
        $about->offline_loyalty_card_us = $request->input('offline_loyalty_card_us');
        $about->about_us_charity = $request->input('about_us_charity');
        $about->save();

        // Return success response
        return response()->json(['status' => 'success', 'message' => 'About us updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
