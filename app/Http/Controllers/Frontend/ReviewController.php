<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'website' => 'nullable|url',
        'comment' => 'required|string',
    ]);

    $review = new Review();
    $review->merchant_id = $request->merchant_id;
    $review->name = $request->name;
    $review->email = $request->email;
    $review->website = $request->website;
    $review->comment = $request->comment;
    $review->rating = $request->rating;
    $review->save();

    return response()->json(['success' => 'Review submitted successfully!']);
}

}
