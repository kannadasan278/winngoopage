<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function index()
    {
        $categories = Category::with('subcategory')
            ->inRandomOrder()
            ->limit(20)
            ->orderBy('category_name_en')
            ->get();

        return response()->json($categories);
    }
      public function morecategory()
    {
        $categories = Category::with('subcategory')
            ->inRandomOrder()
            ->limit(4)
            ->get();
        return response()->json($categories);
    }

      public function maincategory()
    {
        // Fetch categories with more than 6 subcategories
         $categories_mainone = SubCategory::with('category')
            ->where('category_id',7)
            ->limit(6)
            ->get();
        return response()->json($categories_mainone);
    }
        public function maincategorytwo()
    {
        // Fetch categories with more than 6 subcategories
         $maincategorytwo = SubCategory::with('category')
            ->where('category_id',2)
            ->limit(6)
            ->get();
        return response()->json($maincategorytwo);
    }
        public function maincategorythree()
    {
        // Fetch categories with more than 6 subcategories
         $maincategorythree = SubCategory::with('category')
            ->where('category_id',3)
            ->limit(6)
            ->get();
        return response()->json($maincategorythree);
    }


}

