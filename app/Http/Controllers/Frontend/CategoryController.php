<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Merchant;
use App\Models\MerchantPrice;
use Carbon\Carbon;
use App\Models\Review;
use App\Models\SubCategory;

class CategoryController extends Controller
{
      public function allcategory(Request $request)
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
    return view('frontend.category.allcategory', compact('categories','categoriesrandom','merchanttype'));
}

public function showByCategory($id)
{
    $categories = Category::with('subcategory')
            ->inRandomOrder()
            ->limit(5)
            ->orderBy('category_name_en')
            ->get();

    $categoriesrandom = Category::orderBy('category_name_en')->inRandomOrder()->limit(6)->get();
$merchanttype = MerchantPrice::get();
    try {
    $now = now(); // Current date and time
    $currentDay = $now->format('l'); // Current day of the week (e.g., 'Monday')
        // Decrypt the category ID
        $decryptedId = decrypt($id);

        // Validate the category ID
        $category = Category::findOrFail($decryptedId);
        $subCategories = SubCategory::with(['category'])->where('id',$category->id)->latest()->get();
        // Ensure decrypted ID is a string
        $decryptedId = (string) $decryptedId;

        // Retrieve merchants whose category_id JSON column contains the decrypted ID
        $merchants = Merchant::whereJsonContains('category_id', $decryptedId)->where('status','approved')->paginate(20);
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
        // Return view with merchants and category information
        return view('frontend.business.show', compact('merchants', 'category','categoriesrandom','categories','merchanttype','subCategories'));
    } catch (\Exception $e) {
        // Handle exceptions, such as invalid decryption or category not found
        return abort(404, 'Category not found or invalid ID');
    }
}
    public function show($slug)
    {
         $now = now(); // Current date and time
    $currentDay = $now->format('l'); // Current day of the week (e.g., 'Monday')
           $categories = Category::with('subcategory')
            ->inRandomOrder()
            ->limit(5)
            ->orderBy('category_name_en')
            ->get();
                $merchanttype = MerchantPrice::get();
        $categoriesrandom = Category::orderBy('category_name_en')->inRandomOrder()->limit(6)->get();
        // Find category by slug
        $category = Category::where('category_slug_en', $slug)->firstOrFail();
        $subCategories = SubCategory::with(['category'])->where('id',$category->id)->latest()->get();

        $decryptedId = (string) $category->id;
        // Fetch merchants related to this category
        $merchants = Merchant::whereJsonContains('category_id', $decryptedId)->where('status','approved')->paginate(20);
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
        // Return view with category and merchants
        return view('frontend.business.show', compact('category', 'merchants','categoriesrandom','categories','merchanttype','subCategories'));
    }

    public function subshow($slug)
    {

         $now = now(); // Current date and time
    $currentDay = $now->format('l'); // Current day of the week (e.g., 'Monday')
           $categories = Category::with('subcategory')
            ->inRandomOrder()
            ->limit(5)
            ->orderBy('category_name_en')
            ->get();
                $merchanttype = MerchantPrice::get();
        $categoriesrandom = Category::orderBy('category_name_en')->inRandomOrder()->limit(6)->get();
        // Find category by slug
        $category = SubCategory::where('subcategory_slug_en', $slug)->firstOrFail();
        $subCategories = SubCategory::with(['category'])->where('id',$category->category_id)->latest()->get();
        $decryptedId = (string) $category->id;
        // Fetch merchants related to this category
        $merchants = Merchant::whereJsonContains('category_id', $decryptedId)->where('status','approved')->paginate(20);

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
        // Return view with category and merchants
        return view('frontend.business.showsub', compact('category', 'merchants','categoriesrandom','categories','merchanttype','subCategories'));
    }


    public function searchcategorydata(Request $request)
    {
    $categoriesrandom = Category::orderBy('category_name_en')->inRandomOrder()->limit(6)->get();
    $merchanttype = MerchantPrice::get();
    $query = Category::orderBy('category_name_en');

    if ($request->has('s')) {
        $query->where('category_name_en', 'LIKE', $request->input('s') . '%');
    }
    if($request->input('s') == 'all'){
     $query = Category::orderBy('category_name_en');
    }
    $categories = $query->get();

    return view('frontend.category.searchcategory', compact('categories','categoriesrandom','merchanttype'));
}


}
