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

Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'categoryshow']);
Route::get('/category/{slug}', [App\Http\Controllers\Front\HomeController::class, 'category'])->name('category');



Route::group(['middleware'=>'auth:web'],function(){
    Route::get('/home', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('home');
    Route::get('about-us', [App\Http\Controllers\Front\HomeController::class, 'about_us'])->name('about-us');

    Route::get('/sub-category/{slug}', [App\Http\Controllers\Front\HomeController::class, 'sub_category'])->name('sub.category');
    Route::get('/orderstatus', [App\Http\Controllers\Front\HomeController::class, 'orderstatus'])->name('orderstatus');
    Route::get('/cancelauction/{id}', [App\Http\Controllers\Front\HomeController::class, 'cancel'])->name('cancelauction');
    Route::get('/category', [App\Http\Controllers\Front\HomeController::class, 'categoryshow'])->name('categoryshow');
    Route::get('/auctioncomplet', [App\Http\Controllers\Front\HomeController::class, 'auctioncomplet'])->name('auctioncomplet');

    Route::post('/imageuplode', [App\Http\Controllers\Front\AuctionController::class, 'imageuplode'])->name('imageuplode');

    Route::post('/auctioncancel', [App\Http\Controllers\Front\AuctionController::class, 'auctioncancel'])->name('auctioncancel');
    Route::post('/finishedauction', [App\Http\Controllers\Front\AuctionController::class, 'finishedauction'])->name('finishedauction');

    Route::post('sub_category',[App\Http\Controllers\Front\AuctionController::class, 'store'])->name('sub_category.store');
    Route::get('state/auction',[App\Http\Controllers\Front\AuctionController::class, 'index'])->name('state.auction');
    Route::match(['get', 'post'],'payments',[App\Http\Controllers\Front\AuctionController::class, 'payments'])->name('payments');

    Route::post('status_list',[App\Http\Controllers\Front\HomeController::class, 'list'])->name('status_list');
    Route::post('companie/cancel',[App\Http\Controllers\Front\HomeController::class, 'cancelauction'])->name('companie_cancel');
    Route::post('companie/finished',[App\Http\Controllers\Front\HomeController::class, 'finished'])->name('companie_finished');

    Route::post('auction/status',[App\Http\Controllers\Front\AuctionlictController::class, 'status'])->name('auction.status');

    Route::get('auction/codeshow/{id}',[App\Http\Controllers\Front\AuctionlictController::class, 'codeshow'])->name('codeshow');

    Route::post('/auctionlist',[App\Http\Controllers\Front\AuctionlictController::class, 'list'])->name('auctionlist');
    

 Route::post('/auctionbit',[App\Http\Controllers\Front\AuctionlictController::class, 'bitlist'])->name('auctionbit');       

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
    Route::get('dashboard',[ClientauthController::class,'dashboard'])->name('dashboard');
});


Route::get('terms-condition', [App\Http\Controllers\Front\HomeController::class, 'term_condition'])->name('terms-condition');
Route::get('privacy-policy', [App\Http\Controllers\Front\HomeController::class, 'privacy_policy'])->name('privacy-policy');
