<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use Illuminate\Http\Request;
use App\Models\Category;

class BusinessController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $location = $request->get('location');

        $query = Merchant::query();

        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        if ($location) {
            $query->where('location', 'LIKE', "%{$location}%");
        }

        $businesses = $query->get();
        return response()->json($businesses);
    }
}
