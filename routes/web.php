<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ClientauthController,MailController};
use App\Http\Controllers\Companies\{CompaniesAuthController,CompaniesController,CompaniesbidController,CompanieslistController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/optimize', function () {
    try{
    \Artisan::call('cache:clear');
    \Artisan::call('route:clear');
    \Artisan::call('config:clear');
    \Artisan::call('view:clear');
    \Artisan::call('route:cache');
    \Artisan::call('optimize');
    }catch(\Exception $e){
    }

});


Route::get('send-mail', [MailController::class, 'index']);

Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('home');
Route::get('/categories', [App\Http\Controllers\Front\HomeController::class, 'categories'])->name('categories');
Route::get('/about', [App\Http\Controllers\Front\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\Front\HomeController::class, 'contact'])->name('contact');




Route::group(['middleware'=>'auth:web'],function(){
   
    
    Route::get('/dashboard', [App\Http\Controllers\Front\UserController::class, 'dashboard'])->name('dashboard');
    
    Route::get('/profile', [App\Http\Controllers\Front\UserController::class, 'profile'])->name('profile');
    Route::get('/all-auction', [App\Http\Controllers\Front\UserController::class, 'all_auction'])->name('all-auction');
    Route::get('/all-auction_data', [App\Http\Controllers\Front\UserController::class, 'all_auction_data'])->name('all-auction-data');
    Route::get('/current-auction-data', [App\Http\Controllers\Front\UserController::class, 'current_auction_data'])->name('current-auction-data');
    Route::post('/select-auction', [App\Http\Controllers\Front\UserController::class, 'select_auction'])->name('select-auction');
    // Route::get('/all-auction-data', 'YourController@all_auction_data')->name('all-auction-data');


    // Route::post('/categories-auctions_filter', [App\Http\Controllers\Front\AuctionController::class, 'categories_auctions_filter'])->name('categories-auctions_filter');
        

    
    Route::get('/current-auction', [App\Http\Controllers\Front\UserController::class, 'current_auction'])->name('current-auction');
    
    Route::get('/last-bidings', [App\Http\Controllers\Front\UserController::class, 'last_bidings'])->name('last-bidings');
    Route::post('/enter_code', [App\Http\Controllers\Front\UserController::class, 'enter_code'])->name('enter_code');
    Route::post('/open_profile', [App\Http\Controllers\Front\UserController::class, 'open_profile'])->name('open_profile');
    Route::post('/end-auctions', [App\Http\Controllers\Front\UserController::class, 'end_auctions'])->name('end-auctions');

    Route::get('/change-password', [App\Http\Controllers\Front\UserController::class, 'change_password'])->name('change-password');
    Route::get('/edit-profile', [App\Http\Controllers\Front\UserController::class, 'edit_profile'])->name('edit-profile');
   
    Route::post('/auction-bit', [App\Http\Controllers\Front\UserController::class, 'auctionbit'])->name('auction-bit');
    Route::post('/auction-end', [App\Http\Controllers\Front\UserController::class, 'auctionend'])->name('auction-end');
    Route::get('/user-category-detail', [App\Http\Controllers\Front\CompanyController::class, 'user_category_detail'])->name('user-category-detail');
    Route::get('/bid-details/{id}', [App\Http\Controllers\Front\AuctionController::class, 'bid_details'])->name('bid-details');
    Route::post('/bidings-code', [App\Http\Controllers\Front\AuctionController::class, 'bidings_code'])->name('bidings-code');
    Route::post('/bid-confirm', [App\Http\Controllers\Front\AuctionController::class, 'bid_confirm'])->name('bid-confirm');
    
    Route::post('/cancel-request', [App\Http\Controllers\Front\AuctionController::class, 'cancel_request'])->name('cancel-request');

    // Group for Role 1
    Route::middleware(['role:1'])->group(function () {
        
        Route::get('/new-auction', [App\Http\Controllers\Front\AuctionController::class, 'create'])->name('new-auction');
        
        Route::get('/new-auction/{cate_id}', [App\Http\Controllers\Front\AuctionController::class, 'create']);
        Route::get('/new-auction/{cate_id}/{sub_cat_id}', [App\Http\Controllers\Front\AuctionController::class, 'create']);
        Route::post('auction/store',[App\Http\Controllers\Front\AuctionController::class, 'store'])->name('auction.store');
        Route::get('/payment/{id}', [App\Http\Controllers\Front\PaymentController::class, 'index'])->name('payment');
        // Route::get('/payment/{id}', [App\Http\Controllers\Front\PaymentController::class, 'index'])->name('payment');
        Route::post('/payment', [App\Http\Controllers\Front\PaymentController::class, 'store'])->name('payment.store');
        Route::get('/payment/{id}', [App\Http\Controllers\Front\PaymentController::class, 'index'])->name('payment');


        Route::get('/add-review/{id}', [App\Http\Controllers\Front\AuctionController::class, 'add_review'])->name('add-review');
        Route::post('/review-add',[App\Http\Controllers\Front\AuctionController::class, 'add'])->name('review-add');
        Route::get('/user-company-detail/{id}', [App\Http\Controllers\Front\CompanyController::class, 'user_company_detail'])->name('user-company-detail');
        Route::post('user-company-detail', [App\Http\Controllers\Front\CompanyController::class, 'updateCompanyDetails'])->name('user-company-update');
        // Route::post('user-company-update', 'YourController@updateCompanyDetails')->name('user-company-update');

        
    });
       
    // Group for Role 2
    Route::middleware(['role:2','fav_cat_check'])->group(function () {
        Route::get('/company/dashboard', [App\Http\Controllers\Front\CompanyController::class, 'dashboard'])->name('company.dashboard');
        Route::get('/withdraw', [App\Http\Controllers\Front\AuctionController::class, 'withdraw'])->name('withdraw');
        Route::post('/withdraw-submit', [App\Http\Controllers\Front\AuctionController::class, 'withdraw_submit'])->name('withdraw-submit');

        Route::get('/active-auctions', [App\Http\Controllers\Front\AuctionController::class, 'active_auctions'])->name('active-auctions');
        Route::get('/category-detail', [App\Http\Controllers\Front\AuctionController::class, 'category_detail'])->name('category-detail');
        Route::post('/active-auctions_list', [App\Http\Controllers\Front\AuctionController::class, 'active_auctions_list'])->name('active-auctions_list');
        Route::post('/categories-auctions_filter', [App\Http\Controllers\Front\AuctionController::class, 'categories_auctions_filter'])->name('categories-auctions_filter');
        
        Route::post('/auctions_filter', [App\Http\Controllers\Front\AuctionController::class, 'auctions_filter'])->name('auctions_filter');

        // Route::get('/user-company-detail', [App\Http\Controllers\Front\CompanyController::class, 'user_company_detail'])->name('user-company-detail');

        // Route::get('/user-company-detail/{id}', [App\Http\Controllers\Front\CompanyController::class, 'user_company_detail'])->name('user-company-detail');

        Route::get('/user-auction-detail', [App\Http\Controllers\Front\AuctionController::class, 'user_auction_detail'])->name('user-auction-detail');
        Route::match(['get', 'post'],'bids',[App\Http\Controllers\Front\AuctionController::class,'updates'])->name('bidadd');
        Route::get('/edit-company-info', [App\Http\Controllers\Front\UserController::class, 'edit_company_info'])->name('edit-company-info');
      
   
        Route::get('/all-orders', [App\Http\Controllers\Front\OrderController::class, 'all_order'])->name('all-orders');
        Route::get('/pending-orders', [App\Http\Controllers\Front\OrderController::class, 'pending_order'])->name('pending-orders');
        Route::get('/completed-orders', [App\Http\Controllers\Front\OrderController::class, 'completed_order'])->name('completed-orders');
        Route::get('/last-bid', [App\Http\Controllers\Front\OrderController::class, 'last_order'])->name('last-orders');
        Route::get('/withdarw-history', [App\Http\Controllers\Front\OrderController::class, 'withdarw_history'])->name('withdarw-history');

        Route::get('/manage-categories', [App\Http\Controllers\Front\CategoryController::class, 'index'])->name('manage.categories')->withoutMiddleware('fav_cat_check');
        Route::post('/manage-categories-store', [App\Http\Controllers\Front\CategoryController::class, 'store'])->name('manage.categories.store')->withoutMiddleware('fav_cat_check');
        Route::post('/update-order', [App\Http\Controllers\Front\CategoryController::class, 'updateOrder'])->name('manage.update-order');

    });



  
    Route::get('/sub-category/{slug}', [App\Http\Controllers\Front\HomeController::class, 'sub_category'])->name('sub.category');
    Route::get('/orderstatus', [App\Http\Controllers\Front\HomeController::class, 'orderstatus'])->name('orderstatus');
    Route::get('/cancelauction/{id}', [App\Http\Controllers\Front\HomeController::class, 'cancel'])->name('cancelauction');
   // Route::get('/category', [App\Http\Controllers\Front\HomeController::class, 'categoryshow'])->name('categoryshow');
    Route::get('/auctioncomplet', [App\Http\Controllers\Front\HomeController::class, 'auctioncomplet'])->name('auctioncomplet');

    Route::post('/imageuplode', [App\Http\Controllers\Front\AuctionController::class, 'imageuplode'])->name('imageuplode');
    Route::post('/imagedelete', [App\Http\Controllers\Front\AuctionController::class, 'imagedelete'])->name('imagedelete');
 
    Route::post('/auctioncancel', [App\Http\Controllers\Front\AuctionController::class, 'auctioncancel'])->name('auctioncancel');
    Route::post('/finishedauction', [App\Http\Controllers\Front\AuctionController::class, 'finishedauction'])->name('finishedauction');
    Route::get('auction/update/{id}',[App\Http\Controllers\Front\AuctionController::class,'auctionupdate'])->name('auctionupdate');

   
    Route::get('state/auction',[App\Http\Controllers\Front\AuctionController::class, 'index'])->name('state.auction');
    Route::match(['get', 'post'],'payments',[App\Http\Controllers\Front\AuctionController::class, 'payments'])->name('payments');

    Route::post('status_list',[App\Http\Controllers\Front\HomeController::class, 'list'])->name('status_list');
    Route::post('companie/cancel',[App\Http\Controllers\Front\HomeController::class, 'cancelauction'])->name('companie_cancel');
    Route::post('companie/finished',[App\Http\Controllers\Front\HomeController::class, 'finished'])->name('companie_finished');

    Route::post('auction/status',[App\Http\Controllers\Front\AuctionlictController::class, 'status'])->name('auction.status');

    Route::get('auction/codeshow/{id}',[App\Http\Controllers\Front\AuctionlictController::class, 'codeshow'])->name('codeshow');

    Route::post('/auctionlist',[App\Http\Controllers\Front\AuctionlictController::class, 'list'])->name('auctionlist');
    

     Route::post('/auctionbit',[App\Http\Controllers\Front\AuctionlictController::class, 'bitlist'])->name('auctionbit');   
 
     Route::post('/user/update', [App\Http\Controllers\Front\AuctionController::class, 'user_update'])->name('user.update');

     Route::post('/companyinfo/update', [App\Http\Controllers\Front\AuctionController::class, 'companyinfo_update'])->name('companyinfo.update');

     Route::post('/change/password', [App\Http\Controllers\Front\AuctionController::class, 'change_password'])->name('change.password');

});
    

Route::get('login',[App\Http\Controllers\Front\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login',[App\Http\Controllers\Front\Auth\LoginController::class, 'login'])->name('submit.login');
Route::post('logout',[App\Http\Controllers\Front\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('register',[App\Http\Controllers\Front\Auth\RegisterController::class, 'showRegistrationForm']);
Route::post('register',[App\Http\Controllers\Front\Auth\RegisterController::class, 'register'])->name('register');
Route::post('register_submit',[App\Http\Controllers\Front\Auth\RegisterController::class, 'registerSubmit'])->name('register.submit');

// Route::get('companies-login-form',[CompaniesController::class,'login_form'])->name('companieslogin.form');
Route::post('login-companies',[CompaniesAuthController::class,'login_functionality'])->name('login.companies');
// });

Route::get('companies/login',[CompaniesAuthController::class,'login_form'])->name('companieslogin.form');
Route::post('companies',[CompaniesAuthController::class,'companies_register'])->name('register.companies');
Route::post('imagesave',[CompaniesAuthController::class, 'image_upload'])->name('saveimage');
// Route::get('companies-logout',[CompaniesController::class,'logout'])->name('companieslogout');

Route::group(['middleware'=>'companie'],function(){

    Route::get('companies-logout',[CompaniesAuthController::class,'logout'])->name('companieslogout');
    // Route::get('companie-dashboard',[CompaniesController::class,'dashboard'])->name('companie.dashboard');
    
    Route::get('companies/dashboard',[CompaniesController::class,'dashboard'])->name('companie.dashboard');

    route::get('company/subcategory/{slug}',[CompaniesController::class,'subcategory'])->name('company.subcategory');
    route::get('company/auction/{slug}',[CompaniesController::class,'auctionactive'])->name('company.auction');

    Route::match(['get', 'post'], 'bid-update', [CompaniesbidController::class, 'update'])->name('bid.update');
    
        Route::match(['get', 'post'],'cosestore',[CompaniesbidController::class,'store'])->name('cosestore');
        
    Route::get('companie/edit',[CompaniesbidController::class,'auctionedit'])->name('auctionedit');
    
    Route::get('companies-bid/{id}',[CompaniesController::class,'bid'])->name('bid');
    Route::get('companies-detaills/{id}',[CompaniesController::class,'detaills'])->name('detaills');

    Route::get('companies/auctions',[CompaniesController::class,'auctions'])->name('auctions');

 


    Route::get('companie-orders/status',[CompaniesController::class,'oders'])->name('companieorders');

    Route::get('auctioncode/{id}',[CompaniesController::class,'auctioncode'])->name('auctioncode');

    Route::post('companie/bit',[CompaniesController::class,'companiebit'])->name('companie_bit');

    Route::post('companie_status',[CompanieslistController::class,'status'])->name('companie_status');
    
       Route::get('companies/auctions/bit',[CompanieslistController::class,'auctionsbit'])->name('auctions.bit');

    Route::match(['get', 'post'],'bid/update',[CompanieslistController::class,'bidupdate'])->name('bidupdate');

    Route::get('auction/update/{id}',[CompanieslistController::class,'auctionupdate'])->name('auctionupdate');

    Route::post('companie/companylist',[CompanieslistController::class,'list'])->name('companylist');
});

// detaills
Route::get('login-form',[ClientauthController::class,'login_form'])->name('clientlogin.form');
Route::post('login-client',[ClientauthController::class,'login_functionality'])->name('login.client');

Route::group(['middleware'=>'client'],function(){
    Route::get('logout',[ClientauthController::class,'logout'])->name('clientlogout');
    //Route::get('dashboard',[ClientauthController::class,'dashboard'])->name('dashboard');
});


Route::get('terms-condition', [App\Http\Controllers\Front\HomeController::class, 'term_condition'])->name('terms-condition');
Route::get('privacy-policy', [App\Http\Controllers\Front\HomeController::class, 'privacy_policy'])->name('privacy-policy');
