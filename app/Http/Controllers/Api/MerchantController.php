<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchant;

class MerchantController extends Controller
{
   public function getApprovedMerchants($category = null)
        {
            $query = Merchant::with(['businessHours', 'businessType'])
                ->where('status', 'approved')
                ->where('business_type_id', '!=', 4) // Exclude business type with ID 4
                ->limit(15);

            if ($category) {
                $query->where('category_id', $category);
            }

            $merchants = $query->get();
            return response()->json($merchants);
        }
     public function getApprovedwholesale($category = null)
    {
        $query = Merchant::with(['businessHours', 'businessType'])
            ->where('status', 'approved')
            ->limit(15);

        if ($category) {
            $query->where('category_id', $category);
        }

        $merchants = $query->get();
        return response()->json($merchants);
    }
    public function getcategoryMerchants($slug){
        dd("hhh");
    }
}
