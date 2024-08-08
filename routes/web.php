<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Auth\VerificationController;
    use Illuminate\Support\Facades\Artisan;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\FrontendController;
    use App\Http\Controllers\Auth\LoginController;
     use App\Http\Controllers\HomeController;
    use \UniSharp\LaravelFilemanager\Lfm;
    use App\Http\Controllers\LogoutController;
    use App\Http\Controllers\MerchantController;
    use App\Http\Controllers\RoleController;
    use App\Http\Controllers\Backend\SubCategoryController;
    use App\Http\Controllers\Backend\SubSubCategoryController;
    use App\Http\Controllers\Auth\RegisterController;
    use App\Http\Controllers\StripeController;
    use App\Http\Controllers\Backend\MerchantPriceController;
    use App\Http\Controllers\Backend\CouponController;
    use App\Http\Controllers\Backend\BusinessController;
    use App\Http\Controllers\Backend\ContactController;
    use App\Http\Controllers\Backend\NotificationController;
    use App\Http\Controllers\TransactionController;
    use App\Http\Controllers\Frontend\CategoryController;
    use App\Http\Controllers\TaglineController;
    use App\Http\Controllers\Frontend\NewsletterController;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    // CACHE CLEAR ROUTE
    Route::get('cache-clear', function () {
        Artisan::call('optimize:clear');
        request()->session()->flash('success', 'Successfully cache cleared.');
        return redirect()->back();
    })->name('cache.clear');

            Auth::routes(['register' => false]);
            Auth::routes(['verify' => true]);
            Route::get('/user/verification/{emailid}/{guid}', 'App\Http\Controllers\FrontendController@email_verification');

            Route::get('/email/verify', function () {
            return view('auth.verify-email');
        })->middleware('auth')->name('verification.notice');
    // Define Custom Verification Routes
    Route::controller(VerificationController::class)->group(function() {
    Route::get('/email/verify', 'notice')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'verify')->name('verification.verify');
    Route::post('/email/resend', 'resend')->name('verification.resend');
});
    // STORAGE LINKED ROUTE
    Route::get('storage-link',[AdminController::class,'storageLink'])->name('storage.link');


    Route::post('/check-email-exists', [FrontendController::class, 'checkEmailExists'])->name('check.email.exists');

    Route::get('merchant/login', [MerchantController::class, 'merchantlogin'])->name('merchant.loginform');

    Route::get('user/login', [FrontendController::class, 'login'])->name('login.form');
    Route::post('user/login', [FrontendController::class, 'loginSubmit'])->name('login.submit');
    Route::get('user/logout', [FrontendController::class, 'logout'])->name('user.logout');

    Route::get('user/register', [FrontendController::class, 'register'])->name('register.form');
    Route::post('user/register', [FrontendController::class, 'registerSubmit'])->name('register.submit');
    Route::get('about-us', [FrontendController::class, 'about'])->name('aboutpage');
    Route::get('news', [FrontendController::class, 'news'])->name('newspage');
    Route::get('contact', [FrontendController::class, 'contact'])->name('contactpage');

    //frontend routes
    Route::get('allcategory', [CategoryController::class, 'allcategory'])->name('frontend.allcategory');
    Route::get('business', [App\Http\Controllers\Frontend\BusinessController::class, 'business'])->name('frontend.business');
    Route::get('wholesalers', [App\Http\Controllers\Frontend\BusinessController::class, 'wholesalers'])->name('frontend.wholesalers');
    Route::get('charity', [App\Http\Controllers\Frontend\BusinessController::class, 'charity'])->name('frontend.charity');
    Route::get('place-of-worship', [App\Http\Controllers\Frontend\BusinessController::class, 'placeofwork'])->name('frontend.placeofwork');
    Route::get('businessshow/{id}', [App\Http\Controllers\Frontend\BusinessController::class, 'businessshowdata'])->name('frontend.businessshow');
    Route::get('/business/data', [App\Http\Controllers\Frontend\BusinessController::class, 'fetchData'])->name('business.fetchData');
    Route::post('/subscribe', [App\Http\Controllers\Frontend\NewsletterController::class, 'subscribe'])->name('subscribe');
    Route::get('/business/{id}', [App\Http\Controllers\Frontend\CategoryController::class, 'showByCategory'])->name('business.show');
    Route::get('/category/{slug}', [App\Http\Controllers\Frontend\CategoryController::class, 'show'])->name('category.show');
    Route::get('/subcategory/{slug}', [App\Http\Controllers\Frontend\CategoryController::class, 'subshow'])->name('category.subshow');
    Route::get('/search-results', [App\Http\Controllers\Frontend\SearchController::class, 'searchResults'])->name('search.results');
    Route::post('/reviews', [App\Http\Controllers\Frontend\ReviewController::class, 'store'])->name('reviews');
    Route::get('/filter-results', [App\Http\Controllers\Frontend\BusinessController::class, 'filterResults'])->name('filter.results');
    Route::post('/contact', [FrontendController::class, 'handleContactForm'])->name('contact.submit');

    Route::post('/search', [App\Http\Controllers\Frontend\SearchController::class, 'search'])->name('search');

// customer Reset password
    Route::get('password-reset', [App\Http\Controllers\Auth\PasswordResetController::class, 'showLinkRequestForm'])->name('password.reset');
    Route::post('password/email', [App\Http\Controllers\Auth\PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');

    // routes/web.php
    Route::get('password/reset/{token}', [App\Http\Controllers\Auth\PasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [App\Http\Controllers\Auth\PasswordResetController::class, 'reset'])->name('password.update');


// Socialite
    Route::get('login/{provider}/', [LoginController::class, 'redirect'])->name('login.redirect');
    Route::get('login/{provider}/callback/', [LoginController::class, 'Callback'])->name('login.callback');

    Route::get('/', [FrontendController::class, 'home'])->name('home');

// Frontend Routes
    Route::get('/home', [FrontendController::class, 'index']);


// Backend section start

Route::group(['prefix' => 'admin'], function () {
    // Login Routes
    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Auth\LoginController@login')->name('admin.login.submit');
    // Logout Routes
    Route::post('/logout/submit', 'Auth\LoginController@logout')->name('admin.logout.submit');

        Route::get('/', [AdminController::class, 'index'])->name('admin');

        // user route
        Route::resource('users', 'UsersController');

        // Profile
        Route::get('/profile', [AdminController::class, 'profile'])->name('admin-profile');
        Route::post('/profile/{id}', [AdminController::class, 'profileUpdate'])->name('profile-update');
        // Category
        Route::resource('/category', 'CategoryController');
        // Ajax for sub category
        Route::post('/category/{id}/child', 'CategoryController@getChildByParent');


        // Settings
        Route::get('settings', [AdminController::class, 'settings'])->name('settings');
        Route::post('setting/update', [AdminController::class, 'settingsUpdate'])->name('settings.update');

        // Password Change
        Route::get('change-password', [AdminController::class, 'changePassword'])->name('change.password.form');
        Route::post('change-password', [AdminController::class, 'changPasswordStore'])->name('change.password');

        //Logout
         Route::get('perform', [LogoutController::class, 'perform'])->name('perform.logout');

        Route::resource('roles', 'Backend\RolesController', ['names' => 'admin.roles']);
        Route::resource('users', 'Backend\UsersController', ['names' => 'admin.users']);
        Route::resource('admins', 'Backend\AdminsController', ['names' => 'admin.admins']);
        //category
        Route::resource('categories', 'Backend\CategoryController', ['names' => 'admin.categories']);
        Route::resource('subcategories', 'Backend\SubCategoryController', ['names' => 'admin.subcategories']);
        Route::resource('subsubcategories', 'Backend\SubSubCategoryController', ['names' => 'admin.subsubcategories']);

        Route::get('/category/subcategory/ajax/{category_id}', [SubSubCategoryController::class, 'getSubCategory']);
        Route::get('/category/subsubcategory/ajax/{subcategory_id}', [SubSubCategoryController::class, 'getSubSubCategory']);

        //cms
        Route::resource('news', 'Backend\NewsController', ['names' => 'admin.news']);
        Route::resource('privacy', 'Backend\PrivacyController', ['names' => 'admin.privacy']);
        Route::resource('memberterm', 'Backend\MembertermsController', ['names' => 'admin.memberterm']);
        Route::resource('merchantterm', 'Backend\MerchanttermsController', ['names' => 'admin.merchantterm']);
        Route::resource('banners', 'Backend\BannerController', ['names' => 'admin.banners']);
        Route::resource('about', 'Backend\AboutController', ['names' => 'admin.about']);
        Route::resource('faqs', 'Backend\FaqController', ['names' => 'admin.faqs']);

        //merchant price
        Route::resource('merchant-prices', 'Backend\MerchantPriceController', ['names' => 'admin.merchant-prices']);
        Route::resource('coupons', 'Backend\CouponController', ['names' => 'admin.coupons']);
        //business
        Route::resource('business', 'Backend\BusinessController', ['names' => 'admin.business']);
        Route::post('/business/approved', 'Backend\BusinessController@updateStatus')->name('business.approved');
        Route::post('/business/pending', 'Backend\BusinessController@updatependingStatus')->name('business.pending');
        Route::patch('/business/comment/{id}', 'Backend\BusinessController@comments')->name('business.comments');

         // Notification
        Route::get('/notification/{id}', 'Backend\NotificationController@show')->name('admin.notification');
        Route::get('/notifications', 'Backend\NotificationController@index')->name('all.notification');
        Route::delete('/notification/{id}', 'Backend\NotificationController@delete')->name('notification.delete');
        //Newsletter
        Route::resource('newsletters', 'Backend\NewsletterController', ['names' => 'admin.newsletters']);
        //reviews
        Route::post('/review/pending', 'Backend\BusinessController@updatereviewStatus')->name('review.pending');
        Route::post('/review/active', 'Backend\BusinessController@updatereviewactivetatus')->name('review.active');
        Route::delete('/review/{id}', 'Backend\BusinessController@reviewdelete')->name('admin.review.delete');
        //taglines
        Route::patch('/business/taglines/{id}', 'Backend\BusinessController@taglinesapprove')->name('admin.business.taglines');
        //contact
       Route::resource('enquiries', 'Backend\EnquiriesController', ['names' => 'admin.enquiries']);
    });

    //email and mobile unique
    Route::post('/check-registration', [FrontendController::class, 'checkRegistration'])->name('check.registration');

 //email and mobile unique
    Route::post('/check-merchantregistration', [MerchantController::class, 'merchantregistration'])->name('check.merchantregistration');

// User section start
    Route::group(['prefix' => '/user', 'middleware' => ['user','check.expiration']], function () {
         Route::get('/customerdashboard', [HomeController::class, 'index'])->name('user');
                // Profile
        Route::get('/profile', [HomeController::class, 'profile'])->name('user-profile');
        Route::post('/profile/photo/update', [HomeController::class, 'updatePhoto'])->name('profile.photo.update');

        Route::post('/profile/{id}', [HomeController::class, 'profileUpdate'])->name('user-profile-update');
        // Password Change
        Route::get('change-password', [HomeController::class, 'changePassword'])->name('user.change.password.form');
        Route::post('change-password', [HomeController::class, 'changPasswordStore'])->name('change.password');
        Route::get('customerperform', [LogoutController::class, 'customerperform'])->name('customerperform.logout');
    });


     //merchant section
    Route::get('merchantperform', [LogoutController::class, 'merchantperform'])->name('merchantperform.logout');


    //merchant section
    Route::post('merchant/submit', [MerchantController::class, 'merchantloginSubmit'])->name('merchant.merchantsubmit');
    Route::get('merchant/register', [MerchantController::class, 'register'])->name('register.merchantform');
    Route::post('merchant/register', [MerchantController::class, 'registerSubmit'])->name('register.merchantsubmit');
    Route::post('/merchant/store', [MerchantController::class, 'store'])->name('merchant.store');
    Route::post('/getsubcategories/ajax', [MerchantController::class, 'getSubcategories'])->name('getSubcategories.ajax');
    Route::post('/merchant/register', [StripeController::class, 'register'])->name('merchant.register.post');
    Route::post('/merchant/payment', [StripeController::class, 'processPayment'])->name('merchant.payment');
    Route::post('/merchant/freepayment', [StripeController::class, 'processFreePayment'])->name('merchant.freepayment');
    Route::get('/merchant/success', [StripeController::class, 'paymentSuccess'])->name('merchant.success');
    Route::get('/merchant/success', function () {
        return view('merchant.success');
    })->name('merchant.success');
    //coupon add
    Route::get('/get-merchant-price/{id}', [MerchantController::class, 'getMerchantPrice'])->name('get.merchant.price');
    Route::post('/validate-coupon', [MerchantController::class, 'validateCoupon']);

    // customer Reset password
    Route::get('merchant-reset', [App\Http\Controllers\Auth\PasswordResetController::class, 'merchantRequestForm'])->name('merchantpassrest.reset');
    Route::post('merchant/email', [App\Http\Controllers\Auth\PasswordResetController::class, 'merchantResetLinkEmail'])->name('merchantpass.email');
    Route::post('merchant/reset', [App\Http\Controllers\Auth\PasswordResetController::class, 'merchantreset'])->name('merchantpass.update');
    Route::get('merchant/reset/{token}', [App\Http\Controllers\Auth\PasswordResetController::class, 'merchantResetForm'])->name('merchantpass.reset');

    Route::get('/merchantdashboard', [MerchantController::class, 'merchantdashboard'])->name('merchantdashboard');

    Route::group(['prefix' => '/merchant'], function () {
    // Routes accessible only to merchants
        Route::get('/merchantinfo', [MerchantController::class, 'merchantinfo'])->name('merchant.merchantinfo');
        Route::post('/merchant/logo/update', [MerchantController::class, 'updatelogo'])->name('merchant.logo.update');
        Route::get('/merchantprofile', [MerchantController::class, 'merchantprofile'])->name('merchant.merchantprofile');
        Route::post('/merchant-profile-update/{id}', [MerchantController::class, 'merchantprofileupdate'])->name('merchant.merchant-profile-update');
        Route::get('/transaction', [MerchantController::class, 'transaction'])->name('merchant.transaction');
        Route::get('/franchise', [MerchantController::class, 'franchise'])->name('merchant.franchise');
        Route::get('/addfranchise', [MerchantController::class, 'addfranchise'])->name('merchant.addfranchise');
        Route::post('/merchant/processfranchise', [MerchantController::class, 'processfranchisedata'])->name('merchant.processfranchise');
        Route::post('/merchant/approved', [MerchantController::class, 'updateStatus'])->name('merchant.approved');
        Route::post('/merchant/updateStatusin', [MerchantController::class, 'updateStatusactive'])->name('merchant.updateStatusin');
        Route::get('/franchiseshow/{id}', [MerchantController::class, 'franchiseshow'])->name('merchant.franchiseshow');
        Route::delete('/delete/{id}', [MerchantController::class, 'destroy'])->name('merchant.delete');
        Route::resource('taglines', 'TaglineController', ['names' => 'merchant.taglines']);
});
