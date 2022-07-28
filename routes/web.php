<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DealController;

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

Route::get('imprter','App\Http\Controllers\AdminController@importer')->name('imprter');
Route::post('importer/save','App\Http\Controllers\AdminController@importerSave')->name('importer.save');

Route::group(['namespace' =>'App\Http\Controllers' ], function() {

    Route::get('/', [

        'uses' => 'AdminController@login',
        'as' => 'login'

    ]);

    Route::get('/index', [

        'uses' => 'AdminController@index',
        'as' => 'index'

    ]);

    Route::post('/check-login', [

        'uses' => 'AdminController@checkLogin',
        'as' => 'checkLogin'

    ]);

    Route::get('logoutadmin', [

        'uses' => 'AdminController@logoutadmin',
        'as' => 'logoutadmin'

    ]);

    Route::get('/my-account', [

        'uses' => 'AdminController@account',
        'as' => 'myaccount'

    ]);

    Route::post('/my-account/update-password', [

        'uses' => 'AdminController@changeadminpass',
        'as' => 'changeadminpass'

    ]);

    Route::post('/my-account/update-account', [

        'uses' => 'AdminController@updateaccountdetails',
        'as' => 'updateaccountdetails'

    ]);

    Route::get('/pages', [

        'uses' => 'AdminController@pages',
        'as' => 'pages'

    ]);

    Route::post('/pages/save-term-of-use/save', [

        'uses' => 'AdminController@savetermofuse',
        'as' => 'savetermofuse'

    ]);

    Route::get('/pages/terms-of-us/delete/{id}', [

        'uses' => 'AdminController@deletetermofuse',
        'as' => 'deletetermofuse'

    ]);

    Route::get('/pages/privacy-policy/edit', [

        'uses' => 'AdminController@editprivacypolicy',
        'as' => 'editprivacypolicy'

    ]);

    Route::post('/pages/privacy-policy/update', [

        'uses' => 'AdminController@saveprivacypolicy',
        'as' => 'saveprivacypolicy'

    ]);

    Route::get('/pages/cookie-policy/edit', [

        'uses' => 'AdminController@cookiepolicy',
        'as' => 'cookiepolicy'

    ]);

    Route::post('/pages/cookie-policy/save', [

        'uses' => 'AdminController@savecookiepolicy',
        'as' => 'savecookiepolicy'

    ]);

    Route::get('/pages/referral-program/edit', [

        'uses' => 'AdminController@referralprogram',
        'as' => 'referralprogram'

    ]);

    Route::post('/pages/referal-program/update', [

        'uses' => 'AdminController@savereferalprogram',
        'as' => 'savereferalprogram'

    ]);

    Route::get('/pages/terms-of-us', [

        'uses' => 'AdminController@termsofuse',
        'as' => 'termsofuse'

    ]);

    Route::get('/slides', [

        'uses' => 'SliderController@index',
        'as' => 'slides'

    ]);

    Route::post('/save-slide', [

        'uses' => 'SliderController@saveslide',
        'as' => 'saveslide'

    ]);

    Route::get('/deleteslide/{id}', [

        'uses' => 'SliderController@deleteslide',
        'as' => 'deleteslide'

    ]);

    Route::get('/middle-slides', [

        'uses' => 'SliderController@middleslides',
        'as' => 'middleslides'

    ]);

    Route::post('/middle-slides/save', [

        'uses' => 'SliderController@savemiddleslide',
        'as' => 'savemiddleslide'

    ]);

    Route::get('/middle-slides/delete/{id}', [

        'uses' => 'SliderController@deletemiddleslide',
        'as' => 'deletemiddleslide'

    ]);

    Route::get('/categories', [

        'uses' => 'CategoryController@index',
        'as' => 'categories'

    ]);

    Route::get('/categories/create', [

        'uses' => 'CategoryController@create',
        'as' => 'createcategory'

    ]);

    Route::post('/categories/store', [

        'uses' => 'CategoryController@store',
        'as' => 'storecategory'

    ]);

    Route::get('/categories/edit/{id}', [

        'uses' => 'CategoryController@edit',
        'as' => 'editcategory'

    ]);

    Route::post('/categories/update/{id}', [

        'uses' => 'CategoryController@update',
        'as' => 'updatecategory'

    ]);

    Route::get('/categories/delete/{id}', [

        'uses' => 'CategoryController@destroy',
        'as' => 'deletecategory'

    ]);

    Route::get('/category/types', [

        'uses' => 'CategoryTypeController@index',
        'as' => 'categorytypes'

    ]);

    Route::get('/category/types/create', [

        'uses' => 'CategoryTypeController@create',
        'as' => 'createcategorytype'

    ]);

    Route::post('/category/types/store', [

        'uses' => 'CategoryTypeController@save',
        'as' => 'storecategorytype'

    ]);

    Route::get('/category/type/edit/{id}', [

        'uses' => 'CategoryTypeController@edit',
        'as' => 'editcategorytype'

    ]);

    Route::post('/category/type/update', [

        'uses' => 'CategoryTypeController@update',
        'as' => 'updatecategorytype'

    ]);

    Route::get('/category/type/delete/{id}', [

        'uses' => 'CategoryTypeController@delete',
        'as' => 'deletecategorytype'

    ]);

    Route::get('/category/type/sub-categories', [

        'uses' => 'SubCategoryController@index',
        'as' => 'subcategories'

    ]);

    Route::get('/category/type/sub-category/create', [

        'uses' => 'SubCategoryController@create',
        'as' => 'createsubcategory'

    ]);

    Route::post('/category/type/sub-category/store', [

        'uses' => 'SubCategoryController@save',
        'as' => 'storesubcategory'

    ]);

    Route::get('/category/type/sub-category/edit', [

        'uses' => 'SubCategoryController@edit',
        'as' => 'editsubcategory'

    ]);

    Route::get('/category/type/sub-category/delete/{id}', [

        'uses' => 'SubCategoryController@delete',
        'as' => 'deletesubcategory'

    ]);

    Route::get('/businesses', [

        'uses' => 'BusinessController@index',
        'as' => 'businesses'

    ]);

    Route::get('/business/detail/{id}', [

        'uses' => 'BusinessController@detail',
        'as' => 'viewbusinessdetails'

    ]);

    Route::get('/business/edit/{id}', [

        'uses' => 'BusinessController@editbusiness',
        'as' => 'editbusiness'

    ]);

    Route::post('/business/update', [

        'uses' => 'BusinessController@updatenewbusiness',
        'as' => 'updatenewbusiness'

    ]);

    Route::get('/business/remove/{id}', [

        'uses' => 'BusinessController@deletebusiness',
        'as' => 'deletebusiness'

    ]);

    Route::get('/business/create', [

        'uses' => 'BusinessController@create',
        'as' => 'addnewbusiness'

    ]);

    Route::post('/business/save', [

        'uses' => 'BusinessController@savenewbusiness',
        'as' => 'savenewbusiness'

    ]);

    Route::put('business/remove-custom-icon/{business}', [
        'uses' => 'BusinessController@removeCustomIcon',
        'as' => 'removeCustomIcon'
    ]);

    Route::put('business/business-approve/{business}', [
        'uses' => 'BusinessController@approveBusiness',
        'as' => 'business-approve'
    ]);

    Route::put('business/business-hide/{business}', [
        'uses' => 'BusinessController@hideBusiness',
        'as' => 'business-hide'
    ]);

    // TOP 10 BUSINESSES
    Route::get('/business/top-businesses', 'BusinessController@topBusinesses')->name('businesses.top');
    Route::put('/business/remove-top-business/{business}', 'BusinessController@removeTopBusiness')->name('remove-top-business');

    // Route::post('/business/top-businesses', 'BusinessController@searchBusiness')->name('businesses.search');
    Route::get('/business/edit-top-business/{id}/{address_line_1?}/{location?}/{latitude?}/{longitude?}', 'BusinessController@editTopBusiness')->name('editTopBusiness');
    Route::post('/business/store-top-business/', 'BusinessController@storeTopBusiness')->name('business.storeTopBusiness');

    Route::get('/brands', [

        'uses' => 'BrandsController@index',
        'as' => 'brands'

    ]);

    Route::get('/brand-feeds', [

        'uses' => 'BrandFeedController@index',
        'as' => 'brandfeeds'

    ]);

    Route::get('/website/notifications', [

        'uses' => 'NotificationsController@index',
        'as' => 'notifications'

    ]);

    Route::get('/website/notifications/create', [

        'uses' => 'NotificationsController@create',
        'as' => 'createnotification'

    ]);

    Route::post('/website/notification/save', [

        'uses' => 'NotificationsController@save',
        'as' => 'savenotification'

    ]);

    Route::get('/website/notification/edit/{id}', [

        'uses' => 'NotificationsController@edit',
        'as' => 'editnotification'

    ]);

    Route::post('/website/notification/update', [

        'uses' => 'NotificationsController@update',
        'as' => 'updatenotification'

    ]);

    Route::get('/website/notifications/delete/{id}', [

        'uses' => 'NotificationsController@delete',
        'as' => 'deletenotification'

    ]);

    Route::get('/strains', [

        'uses' => 'PostsController@strains',
        'as' => 'strains'

    ]);

    Route::get('/strains/create', [

        'uses' => 'PostsController@addstrain',
        'as' => 'addstrain'

    ]);

    Route::post('strains/save', [

        'uses' => 'PostsController@savestrain',
        'as' => 'savestrain'

    ]);

    Route::get('/strain/edit/{id}', [

        'uses' => 'PostsController@editstrain',
        'as' => 'editstrain'

    ]);

    Route::post('/strain/update', [

        'uses' => 'PostsController@updatestrain',
        'as' => 'updatestrain'

    ]);

    Route::get('/strains/delete/{id}', [

        'uses' => 'PostsController@deletestrain',
        'as' => 'deletestrain'

    ]);

    Route::get('/genetics', [

        'uses' => 'PostsController@genetic',
        'as' => 'genetics'

    ]);

    Route::get('/genetic/create', [

        'uses' => 'PostsController@creategenetic',
        'as' => 'creategenetic'

    ]);

    Route::post('/genetic/save', [

        'uses' => 'PostsController@savegenetic',
        'as' => 'savegenetic'

    ]);

    Route::get('/genetic/edit/{id}', [

        'uses' => 'PostsController@editgenetic',
        'as' => 'editgenetic'

    ]);

    Route::post('/genetic/update', [

        'uses' => 'PostsController@updategenetic',
        'as' => 'updategenetic'

    ]);

    Route::get('/genetic/delete/{id}', [

        'uses' => 'PostsController@deletegenetic',
        'as' => 'deletegenetic'

    ]);

    Route::get('/posts', [

        'uses' => 'PostsController@allposts',
        'as' => 'allposts'

    ]);

    Route::get('/posts/create', [

        'uses' => 'PostsController@createstrainpost',
        'as' => 'createstrainpost'

    ]);

    Route::post('/posts/save', [

        'uses' => 'PostsController@savestrainpost',
        'as' => 'savestrainpost'

    ]);

    Route::post('/posts/update', [

        'uses' => 'PostsController@updatestrainpost',
        'as' => 'updatestrainpost'

    ]);

    Route::get('/posts/edit/{id}', [

        'uses' => 'PostsController@editstrainpost',
        'as' => 'editstrainpost'

    ]);

    // DEAL SLIDES
    Route::resource('dealslides','DealSlideController');

    // DEALS
   Route::resource("deals", 'DealController');

   Route::get('/deals/claimed/list', 'DealController@dealsClaimed')->name('deals.claimed');

   // DEALS
   Route::get('/deals/products/list', [
    'uses' => 'DealProductController@index',
    'as' => 'deal-product.index'
   ]);

   // ALL PRODUCTS OF BUSINESS

   Route::get('/deals/products/getAllProductsOfBusiness', 'DealController@getAllProductsOfBusiness')->name('deal-business-products');

    // TRANSACTIONS
   Route::get('/transaction/menu', 'TransactionController@menuTransaction')->name('transaction.menu');
   Route::get('/transaction/deals', 'TransactionController@dealsTransaction')->name('transaction.deals');

   // DELIVERY BANNER
   Route::get('/delivery-banner', 'DeliveryBannerController@index')->name('delivery-banner.index');
   Route::post('/delivery-banner/update', 'DeliveryBannerController@update')->name('delivery-banner.update');

   // STRAIN BANNER
   Route::get('/strain-banner', 'StrainBannerController@index')->name('strain-banner.index');
   Route::post('/strain-banner/update', 'StrainBannerController@update')->name('strain-banner.update');

   Route::get('/edit-business-details/{business}', 'BusinessController@editBusinessDetails')->name('edit-business-details');

   Route::put('/update-business-details/{business}', 'BusinessController@updateBusinessDetails')->name('update-business-details');

   // SITE SETTINGS
   Route::get('/site-settings', 'SiteSettingsController@index')->name('site-settings.index');
   Route::post('/site-settings/store', 'SiteSettingsController@store')->name('site-settings.store');

});
