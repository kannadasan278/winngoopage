<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchant; // Make sure to import the Merchant model
use App\Models\Category;
use App\Models\MerchantPrice;
use App\Models\Review;
use Carbon\Carbon;
use App\Models\SubCategory;

class SearchController extends Controller
{

public function searchResults(Request $request)
{
    $merchanttype = MerchantPrice::get();
    $categoriesrandom = Category::orderBy('category_name_en')->inRandomOrder()->limit(6)->get();

     $categories = Category::with('subcategory')
            ->inRandomOrder()
            ->limit(5)
            ->orderBy('category_name_en')
            ->get();
    $subCategories = SubCategory::with(['category'])->latest()->get();
    // Return the view with data
    return view('frontend.search-results', compact('categories','merchanttype','categoriesrandom','subCategories'));
}
public function search(Request $request)
{
  $now = now(); // Current date and time
  $currentDay = $now->format('l'); // Current day of the week (e.g., 'Monday')
$categories = Category::with('subcategory')
            ->inRandomOrder()
            ->limit(5)
            ->orderBy('category_name_en')
            ->get();
    // Perform search logic
    $query = Merchant::query();
    // if($request->input('business_type_id') != NULL){
    // $merchanttype = MerchantPrice::findOrFail($request->input('business_type_id'));
    // }
    if ($request->business_type_id) {
        $query->where('business_type_id', $request->input('business_type_id'));
    }
    if ($request->address_line) {
        $query->where('address_line_1', 'like', '%' . $request->input('address_line') . '%');
    }
    if ($request->city) {
        $query->where('city', 'like', '%' . $request->input('city') . '%');
    }
    if ($request->postcode) {
        $query->where('post_code', 'like', '%' . $request->input('postcode') . '%');
    }
    if ($request->country) {
        $query->where('country', 'like', '%' . $request->input('country') . '%');
    }
    if ($request->business_name) {
        $query->where('business_name', 'like', '%' . $request->input('business_name') . '%');
    }

        // Execute the query and get results
        $merchants = $query->paginate(100);
       // Add ratings, review counts, and opening status to each merchant
        $merchants->getCollection()->transform(function ($merchant) use ($now, $currentDay) {
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
                $merchant->statusMessage = 'Opens at ' . $open->format('g:i A');
            }
        } else {
            $merchant->status = 'closed';
            $merchant->statusMessage = 'No business hours available';
        }

        return $merchant;
    });
    // Store search results in session or another way
    $request->session()->put('search_results', $merchants);
    $request->session()->put('city', $request->input('city'));
    $request->session()->put('business_name', $request->input('business_name'));

    // Generate the URL to redirect to
    $searchResultsUrl = route('search.results');

    // Return JSON with redirect URL
    return response()->json([
        'redirect' => $searchResultsUrl,
    ]);

}

}
