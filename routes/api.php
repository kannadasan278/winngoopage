<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\BusinessController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\MerchantController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('categories', [CategoryController::class, 'index']);
Route::get('morecategory', [CategoryController::class, 'morecategory']);
Route::get('maincategory', [CategoryController::class, 'maincategory']);
Route::get('maincategorytwo', [CategoryController::class, 'maincategorytwo']);
Route::get('maincategorythree', [CategoryController::class, 'maincategorythree']);


Route::get('businesses', [BusinessController::class, 'index']);
Route::get('banners', [BannerController::class, 'index']);

Route::get('/merchants/{category?}', [MerchantController::class, 'getApprovedMerchants']);
Route::get('/merchants/{wholesales?}', [MerchantController::class, 'getApprovedwholesale']);


