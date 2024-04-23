<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{UserController,AdminController,CategoryController,OrderstatusController,CompanybitController,SiteSettingController, PriceController, Sub_categoryController,CityController , CompanieController,ActiveauctionsController,StateController,CanceledAuctionsController,FinishedAuctionsController,AuctionCompletController,WithDrawController,TransactionController, WalletHistoryController};

use App\Http\Controllers\Admin\Auth\LoginController;


Route::get('/clear-cache', function() {
    Artisan::call('optimize:clear');
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
});


Route::get('/admin', function () {
    return redirect()->route('dashboard');
})->name('admin');

Route::group(['middleware'=>'guest:admin',  'prefix' => 'admin', 'as' => 'admin.'],function(){
  
Route::get('/',[LoginController::class,'login_form']);
Route::get('login',[LoginController::class,'login_form'])->name('adminlogin.form');
Route::post('login-functionality',[LoginController::class,'login_functionality'])->name('login.functionality');
});

Route::group(['middleware'=>'auth:admin',  'prefix' => 'admin', 'as' => 'admin.'],function(){

        //login 
        Route::get('dashboard',[LoginController::class,'dashboard'])->name('dashboard'); 
        Route::get('logout',[LoginController::class,'logout'])->name('logout');


        //admin
    Route::group(['prefix' => 'admins', 'as' => 'admins.'],function(){
        Route::get('/',[AdminController::class, 'index'])->name('admins');
        Route::post('list',[AdminController::class, 'list'])->name('list');
        Route::get('create',[AdminController::class, 'add'])->name('add');
        Route::post('store',[AdminController::class, 'store'])->name('store');
        Route::get('edit/{id}',[AdminController::class, 'edit'])->name('edit');
        Route::get('update',[AdminController::class, 'update'])->name('update');
        Route::get('destroy/{id}',[AdminController::class, 'destroy'])->name('destroy');
        Route::post('saveimage',[AdminController::class, 'imageupload'])->name('saveimage');
        Route::get('profile/{id}',[AdminController::class, 'adminProfile'])->name('adminProfile');
        Route::post('profile',[AdminController::class, 'profileAdmin'])->name('profileAdmin');
        Route::post('admin_profile',[AdminController::class, 'adminProfileImage'])->name('adminProfileImage');
        Route::post('update',[AdminController::class, 'adminProfileUpdate'])->name('adminProfileUpdate');
        Route::post('edit_password',[AdminController::class, 'editPassword'])->name('editPassword');
        Route::post('update_password',[AdminController::class, 'updatePassword'])->name('updatePassword');
            
    });
        //user 

    Route::group(['prefix' => 'customer', 'as' => 'customer.'],function(){

        Route::get('/',[UserController::class, 'index'])->name('user');
        Route::post('list',[UserController::class, 'list'])->name('list');
        Route::get('add',[UserController::class, 'add'])->name('add');
        Route::post('store',[UserController::class, 'store'])->name('store');
        Route::get('edit/{id}',[UserController::class, 'edit'])->name('edit');
        Route::post('update',[UserController::class, 'update'])->name('update');
        Route::get('destroy/{id}',[UserController::class, 'destroy'])->name('destroy');
        Route::post('get-state', [UserController::class, 'userStateData'])->name('userStateData');
        Route::get('customer-favorite/{id}', [UserController::class, 'customerFavorite'])->name('customerFavorite');
        Route::get('appointment/{id}', [UserController::class, 'customerAppointment'])->name('customerAppointment');
        Route::post('appointment-list', [UserController::class, 'customerAppointmentList'])->name('customerAppointmentList');
        Route::get('appointment-details', [UserController::class, 'customerAppointmentDetails'])->name('customerAppointmentDetails');
        Route::post('status',[UserController::class, 'status'])->name('status');
        Route::post('imagesave',[UserController::class, 'imageupload'])->name('saveimage');
        

    });

     //state

     Route::group(['prefix' => 'state', 'as' => 'state.'],function(){
        Route::get('/',[StateController::class, 'index'])->name('state');
        Route::post('list',[StateController::class, 'list'])->name('list');
        Route::get('add',[StateController::class, 'add'])->name('add');
        Route::post('store',[StateController::class, 'store'])->name('store');
        Route::post('status',[StateController::class, 'status'])->name('status');
        Route::get('edit/{id}',[StateController::class, 'edit'])->name('edit');
        Route::post('update',[StateController::class, 'update'])->name('update');
        Route::get('destory/{id}',[StateController::class, 'destroy'])->name('destroy');
    });

    // Companies
    Route::group(['prefix' => 'companie', 'as' => 'companie.'],function(){
        // echo 1;die;
        Route::get('/',[CompanieController::class, 'index'])->name('companie');
       
        Route::post('list',[CompanieController::class, 'list'])->name('list');
       
        Route::get('add',[CompanieController::class, 'add'])->name('add');
        Route::post('store',[CompanieController::class, 'store'])->name('store');
        Route::get('edit/{id}',[CompanieController::class, 'edit'])->name('edit');
        Route::post('update',[CompanieController::class, 'update'])->name('update');
        Route::get('destroy/{id}',[CompanieController::class, 'destroy'])->name('destroy');
        Route::post('imagesave',[CompanieController::class, 'imageupload'])->name('saveimage');
        Route::post('imagepdf',[CompanieController::class, 'imagepdfuplode'])->name('imagepdf');
        Route::post('status',[CompanieController::class, 'status'])->name('status');
        Route::post('add-commission',[CompanieController::class, 'addCommission'])->name('add-commission');

    });

        //category
    Route::group(['prefix' => 'category', 'as' => 'category.'],function(){

        Route::get('/',[CategoryController::class, 'index'])->name('category');
        Route::post('list',[CategoryController::class, 'list'])->name('list');
        Route::get('add',[categoryController::class, 'create'])->name('add');
        Route::post('store',[CategoryController::class, 'store'])->name('store');
        Route::post('status',[CategoryController::class, 'status'])->name('status');
        Route::get('edit/{id}',[CategoryController::class, 'edit'])->name('edit');
        Route::post('update',[ClientController::class, 'update'])->name('update');
        Route::get('destory/{id}',[CategoryController::class, 'destroy'])->name('destroy');
        Route::post('imagesave',[CategoryController::class, 'imageupload'])->name('saveimage');
   });

      //services
    Route::group(['prefix' => 'sub_category', 'as' => 'sub_category.'],function(){

        Route::get('sub_category',[Sub_categoryController::class, 'index'])->name('sub_category');
        Route::post('list',[Sub_categoryController::class, 'list'])->name('list');
        Route::get('add',[Sub_categoryController::class, 'create'])->name('add');
        Route::post('store',[Sub_categoryController::class, 'store'])->name('store');
        Route::post('status',[Sub_categoryController::class, 'status'])->name('status');
        Route::get('edit/{id}',[Sub_categoryController::class, 'edit'])->name('edit');
        Route::post('update',[Sub_categoryController::class, 'update'])->name('update');
        Route::get('destory/{id}',[Sub_categoryController::class, 'destroy'])->name('destroy');
        Route::post('imagesave',[Sub_categoryController::class, 'imageupload'])->name('saveimage');
        Route::get('metainputs/{id}',[Sub_categoryController::class, 'metaInputs'])->name('metainputs');
        Route::get('removeinput/{id}',[Sub_categoryController::class, 'metaRemove'])->name('removeinput');
        Route::post('savemetainputs',[Sub_categoryController::class, 'saveMetaInputs'])->name('savemetainputs');
   
});

Route::group(['prefix' => 'city', 'as' => 'city.'],function(){

    Route::get('/',[CityController::class, 'index'])->name('city');
    Route::post('list',[CityController::class, 'list'])->name('list');
    Route::get('add',[CityController::class, 'add'])->name('add');
    Route::post('store',[CityController::class, 'store'])->name('store');
    Route::post('status',[CityController::class, 'status'])->name('status');
    Route::get('edit/{id}',[CityController::class, 'edit'])->name('edit');
    Route::post('update',[CityController::class, 'update'])->name('update');
    Route::get('destory/{id}',[CityController::class, 'destroy'])->name('destroy');

});

Route::group(['prefix' => 'auctions', 'as' => 'auctions.'],function(){

    Route::get('/',[ActiveauctionsController::class, 'index'])->name('auctions');
    Route::post('list',[ActiveauctionsController::class, 'list'])->name('list');
    Route::get('view/{id}',[ActiveauctionsController::class, 'view'])->name('view');
    Route::post('store',[ActiveauctionsController::class, 'store'])->name('store');
    Route::post('status',[ActiveauctionsController::class, 'status'])->name('status');
    Route::get('edit/{id}',[ActiveauctionsController::class, 'edit'])->name('edit');
    Route::post('update',[ActiveauctionsController::class, 'update'])->name('update');
    Route::get('destory/{id}',[ActiveauctionsController::class, 'destroy'])->name('destroy');
    Route::post('categoryOptions',[ActiveauctionsController::class, 'subCatagoryData'])->name('categoryOptions');

});

 //site_setting

        Route::group(['prefix' => 'sitesetting', 'as' => 'sitesetting.'],function(){ 
         
                Route::get('/',[SiteSettingController::class, 'index'])->name('sitesetting');
           
                Route::post('list',[SiteSettingController::class, 'list'])->name('list');
                Route::get('add',[SiteSettingController::class, 'add'])->name('add');
               
                Route::post('store',[SiteSettingController::class, 'store'])->name('store');
                Route::get('edit/{id}',[SiteSettingController::class, 'edit'])->name('edit');
                Route::post('update',[SiteSettingController::class, 'update'])->name('update');
                Route::get('destory/{id}',[SiteSettingController::class, 'destroy'])->name('destroy');
                Route::post('imagesave',[SiteSettingController::class, 'imageupload'])->name('saveimage');
                Route::get('sitesetting/{id}',[SiteSettingController::class, 'adminSite'])->name('adminSite');
                Route::post('sitesetting',[SiteSettingController::class, 'sitesettingAdmin'])->name('sitesettingAdmin');
                Route::post('site_setting',[SiteSettingController::class, 'siteSettingImage'])->name('siteSettingImage');
                Route::post('site_update',[SiteSettingController::class, 'siteSettingUpdate'])->name('siteSettingUpdate');   
    
        });  
        
        Route::group(['prefix' => 'orders', 'as' => 'orders.'],function(){

            Route::get('/',[OrderstatusController::class, 'index'])->name('orders');
            Route::post('list',[OrderstatusController::class, 'list'])->name('list');
            Route::get('view/{id}',[OrderstatusController::class, 'view'])->name('view');

        });


        Route::group(['prefix' => 'transaction', 'as' => 'transaction.'],function(){

            Route::get('/',[TransactionController::class, 'index'])->name('transaction');
            Route::post('list',[TransactionController::class, 'list'])->name('list');
            Route::get('view/{id}',[TransactionController::class, 'view'])->name('view');

        });


        Route::group(['prefix' => 'withdraw', 'as' => 'withdraw.'],function(){

            Route::get('/',[WithDrawController::class, 'index'])->name('withdraw');
            Route::post('withdraw',[WithDrawController::class, 'list'])->name('list');
            Route::post('accept',[WithDrawController::class, 'accept'])->name('accept');
            Route::post('reject',[WithDrawController::class, 'reject'])->name('reject');
        
        });

        Route::group(['prefix' => 'wallet-history', 'as' => 'wallet-history.'],function(){

            Route::get('/',[WalletHistoryController::class, 'index'])->name('wallet-history');
            Route::post('wallet-history',[WalletHistoryController::class, 'list'])->name('list');
        
        });

        Route::group(['prefix' => 'companybit', 'as' => 'companybit.'],function(){

            Route::get('/',[CompanybitController::class, 'index'])->name('companybit');
            Route::post('list',[CompanybitController::class, 'list'])->name('list');
            Route::get('view/{id}',[CompanybitController::class, 'view'])->name('view');
        
        });


        Route::group(['prefix' => 'canceled', 'as' => 'canceled.'],function(){

            Route::get('/',[CanceledAuctionsController::class, 'index'])->name('auctions');
            Route::post('list',[CanceledAuctionsController::class, 'list'])->name('list');

        });

        Route::group(['prefix' => 'finished', 'as' => 'finished.'],function(){

            Route::get('/',[FinishedAuctionsController::class, 'index'])->name('auctions');
            Route::post('list',[FinishedAuctionsController::class, 'list'])->name('list');
        });


        Route::group(['prefix' => 'auction', 'as' => 'auction.'],function(){

            Route::get('/',[AuctionCompletController::class, 'index'])->name('complet');
            Route::post('list',[AuctionCompletController::class, 'list'])->name('list');

        });

});

