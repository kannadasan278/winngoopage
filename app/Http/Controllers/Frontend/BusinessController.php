<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\Category;
use App\Models\Review;
use DB;
use App\Models\MerchantPrice;
use Carbon\Carbon;
use App\Models\SubCategory;
use App\Models\Tagline;

class BusinessController extends Controller
{
    public function business(){
         $merchanttype = MerchantPrice::get();
        $categories = Category::with('subcategory')
            ->inRandomOrder()
            ->limit(5)
            ->orderBy('category_name_en')
            ->get();
    $subCategories = SubCategory::with(['category'])->latest()->get();
    $categoriesrandom = Category::orderBy('category_name_en')->inRandomOrder()->limit(6)->get();
     $now = now(); // Current date and time
    $currentDay = $now->format('l'); // Current day of the week (e.g., 'Monday')

    // Fetch paginated merchants with their business hours
    $merchants = Merchant::with('businessHours','taglines')->where('status','approved')->paginate(20);

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


        return view('frontend.business.business',compact('merchants','categoriesrandom','categories','merchanttype','subCategories'));
    }
    public function wholesalers(){
         $merchanttype = MerchantPrice::get();
        $categories = Category::with('subcategory')
            ->inRandomOrder()
            ->limit(5)
            ->orderBy('category_name_en')
            ->get();

        $categoriesrandom = Category::orderBy('category_name_en')->inRandomOrder()->limit(6)->get();
     $now = now(); // Current date and time
    $currentDay = $now->format('l'); // Current day of the week (e.g., 'Monday')

    // Fetch paginated merchants with their business hours
    $merchants = Merchant::with('businessHours','taglines')->where('status','approved')->where('business_type_id', 4)->paginate(20);

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


        return view('frontend.business.wholesellers',compact('merchants','categoriesrandom','categories','merchanttype'));
    }

     public function charity(){
         $merchanttype = MerchantPrice::get();
        $categories = Category::with('subcategory')
            ->inRandomOrder()
            ->limit(5)
            ->orderBy('category_name_en')
            ->get();

        $categoriesrandom = Category::orderBy('category_name_en')->inRandomOrder()->limit(6)->get();
     $now = now(); // Current date and time
    $currentDay = $now->format('l'); // Current day of the week (e.g., 'Monday')

    // Fetch paginated merchants with their business hours
    $merchants = Merchant::with('businessHours','taglines')->where('status','approved')->where('business_type_id', 6)->paginate(20);

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


        return view('frontend.business.charity',compact('merchants','categoriesrandom','categories','merchanttype'));
    }
   public function placeofwork(){
         $merchanttype = MerchantPrice::get();
        $categories = Category::with('subcategory')
            ->inRandomOrder()
            ->limit(5)
            ->orderBy('category_name_en')
            ->get();

        $categoriesrandom = Category::orderBy('category_name_en')->inRandomOrder()->limit(6)->get();
     $now = now(); // Current date and time
    $currentDay = $now->format('l'); // Current day of the week (e.g., 'Monday')

    // Fetch paginated merchants with their business hours
    $merchants = Merchant::with('businessHours','taglines')->where('status','approved')->where('business_type_id', 7)->paginate(20);

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


        return view('frontend.business.placeofwork',compact('merchants','categoriesrandom','categories','merchanttype'));
    }
    public function businessshowdata($id){
         $merchanttype = MerchantPrice::get();
        $categories = Category::with('subcategory')
            ->inRandomOrder()
            ->limit(5)
            ->orderBy('category_name_en')
            ->get();

        $categoriesrandom = Category::orderBy('category_name_en')->inRandomOrder()->limit(6)->get();

        // Decrypt the category ID
        $decryptedId = decrypt($id);
        // Retrieve merchants whose category_id JSON column contains the decrypted ID
        $merchants = Merchant::with('businessHours','businessType','taglines')->findOrFail($decryptedId);

        // Calculate the average rating
        $averageRating = Review::where('merchant_id', $decryptedId)
                            ->where('status', 'active') // Optional: include only active reviews
                            ->avg('rating');
        $reviewCount = Review::where('merchant_id', $decryptedId)->where('status', 'active')->count();
        // Calculate the average rating
        $ratingcustomer = Review::where('merchant_id', $decryptedId)
                            ->where('status', 'active')
                            ->get();


        // Count the number of reviews for each rating
        $ratingsCount = Review::selectRaw('rating, COUNT(*) as count')
                            ->where('merchant_id', $decryptedId)
                            ->where('status', 'active')
                            ->groupBy('rating')
                            ->pluck('count', 'rating')
                            ->toArray();

        // Total number of reviews
        $totalReviews = array_sum($ratingsCount);
        // Return view with merchants and category information
        return view('frontend.business.businessshow', [
            'merchants' => $merchants,
            'averageRating' => $averageRating,
            'reviewCount' => $reviewCount,
            'categoriesrandom' => $categoriesrandom,
            'ratingsCount' => $ratingsCount,
            'categories' => $categories,
            'merchanttype' => $merchanttype,
            'ratingcustomer'=>$ratingcustomer,
            'totalReviews' => $totalReviews
        ]);


    }
    public function fetchData(Request $request)
    {
        $categories = Category::with('subcategory')
            ->inRandomOrder()
            ->limit(5)
            ->orderBy('category_name_en')
            ->get();
            $merchanttype = MerchantPrice::get();
        $categoriesrandom = Category::orderBy('category_name_en')->inRandomOrder()->limit(6)->get();
        $merchants = Merchant::with('businessHours','taglines')
            ->paginate(20);

        if ($request->ajax()) {
            return view('frontend.business.partials.merchant_data', compact('merchants','categoriesrandom','categories'))->render();
        }

        return view('frontend.business.business', compact('merchants','categoriesrandom','categories','merchanttype'));
    }

public function filterResults(Request $request)
{
    $now = now(); // Current date and time
    $currentDay = $now->format('l'); // Current day of the week (e.g., 'Monday')

    // Get the sub-category IDs from the request and ensure they are strings
    $subCategoryIds = $request->input('sub_category_id', []);

    // Ensure sub-category IDs are strings (if they aren't already)
    $stringVersion = array_map('strval', $subCategoryIds);

    // Retrieve merchants whose sub_category_id JSON column contains the IDs
    $merchants = Merchant::where(function ($query) use ($stringVersion) {
        foreach ($stringVersion as $id) {
            $query->orWhereJsonContains('sub_category_id', $id);
        }
    })
    ->where('status', 'approved')
    ->paginate(20); // Paginate results

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
                $merchant->statusMessage = 'until ' . $close->format('g:i A');
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

    // Generate the URL to redirect to
    $searchResultsUrl = route('search.results');

    // Return JSON with redirect URL
    return response()->json([
        'redirect' => $searchResultsUrl,
    ]);
}


}
