<?php

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

Route::get('/', function () {
    return view('frontend.homepages.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Route cho admin
 */
Route::prefix('admin')->group(function (){
    //Gom nhom cac route cho phan admin
    Route::get('/','AdminController@index')->name('admin.dashboard');
    //Route dang nhap thanh cong
    Route::get('/dasboard','AdminController@index')->name('admin.dashboard');
    //tra ve view dang ki tk
    Route::get('/register','AdminController@create')->name('admin.register');
    //
    Route::post('register','AdminController@store')->name('admin.register.store');
    //Route tra ve view dang nhap
    Route::get('login','Auth\Admin\LoginController@login')->name('admin.auth.login');
    //Method: post
    Route::post('login','Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');
    //Route tra ve view dang xuat
    Route::post('logout','Auth\Admin\LoginController@logout')->name('admin.auth.logout');

    //--------Route admin shopping--------
    //------------------------------------
    //------------------------------------
    Route::get('shop/category','Admin\ShopCategoryController@index');
    Route::get('shop/category/create','Admin\ShopCategoryController@create');
    Route::get('shop/category/{id}/edit','Admin\ShopCategoryController@edit');
    Route::get('shop/category/{id}/delete','Admin\ShopCategoryController@delete');

    Route::post('shop/category','Admin\ShopCategoryController@store');
    Route::post('shop/category/{id}','Admin\ShopCategoryController@update');
    Route::post('shop/category/{id}/delete','Admin\ShopCategoryController@destroy');


    //--------Route admin shopping product--------
    //------------------------------------
    //------------------------------------
    Route::get('shop/product','Admin\ShopProductController@index');
    Route::get('shop/product/create','Admin\ShopProductController@create');
    Route::get('shop/product/{id}/edit','Admin\ShopProductController@edit');
    Route::get('shop/product/{id}/delete','Admin\ShopProductController@delete');

    Route::post('shop/product','Admin\ShopProductController@store');
    Route::post('shop/product/{id}','Admin\ShopProductController@update');
    Route::post('shop/product/{id}/delete','Admin\ShopProductController@destroy');


    Route::get('shop/order',function (){
        return view('admin.content.shop.order.index');
    });
    Route::get('shop/review',function (){
        return view('admin.content.shop.review.index');
    });
    Route::get('shop/customer',function (){
        return view('admin.content.shop.customer.index');
    });
    Route::get('shop/brand',function (){
        return view('admin.content.shop.brand.index');
    });
    Route::get('shop/statistic',function (){
        return view('admin.content.shop.statistic.index');
    });
    Route::get('shop/product/order',function (){
        return view('admin.content.shop.adminorder.index');
    });

    //--------Route admin content--------
    //------------------------------------
    Route::get('content/category','Admin\ContentCategoryController@index');
    Route::get('content/category/create','Admin\ContentCategoryController@create');
    Route::get('content/category/{id}/edit','Admin\ContentCategoryController@edit');
    Route::get('content/category/{id}/delete','Admin\ContentCategoryController@delete');

    Route::post('content/category','Admin\ContentCategoryController@store');
    Route::post('content/category/{id}','Admin\ContentCategoryController@update');
    Route::post('content/category/{id}/delete','Admin\ContentCategoryController@destroy');

    // Content post

    Route::get('content/post','Admin\ContentPostController@index');
    Route::get('content/post/create','Admin\ContentPostController@create');
    Route::get('content/post/{id}/edit','Admin\ContentPostController@edit');
    Route::get('content/post/{id}/delete','Admin\ContentPostController@delete');

    Route::post('content/post','Admin\ContentPostController@store');
    Route::post('content/post/{id}','Admin\ContentPostController@update');
    Route::post('content/post/{id}/delete','Admin\ContentPostController@destroy');

    Route::get('content/page',function (){
        return view('admin.content.content.page.index');
    });
    Route::get('content/tag',function (){
        return view('admin.content.content.tag.index');
    });

    //--------Route admin menu--------
    //------------------------------------
    //------------------------------------
    Route::get('menu',function (){
        return view('admin.content.menu.index');
    });
    Route::get('menuitems',function (){
        return view('admin.content.menuitem.index');
    });

    //--------Route admin users--------
    //------------------------------------
    //------------------------------------
    Route::get('users',function (){
        return view('admin.content.users.index');
    });

    //--------Route admin media--------
    //------------------------------------
    //------------------------------------
    Route::get('media',function (){
        return view('admin.content.media.index');
    });

    //--------Route admin config--------
    //------------------------------------
    //------------------------------------
    Route::get('config',function (){
        return view('admin.content.config.index');
    });

    //--------Route admin newletters--------
    //------------------------------------
    //------------------------------------
    Route::get('newletters',function (){
        return view('admin.content.newletters.index');
    });

    //--------Route admin banners--------
    //------------------------------------
    //------------------------------------
    Route::get('banners',function (){
        return view('admin.content.banners.index');
    });

    //--------Route admin contacts--------
    //------------------------------------
    //------------------------------------
    Route::get('contact',function (){
        return view('admin.content.contacts.index');
    });

    //--------Route admin email--------
    //------------------------------------
    //------------------------------------
    Route::get('email/inbox',function (){
        return view('admin.content.email.index');
    });
    Route::get('email/draft',function (){
        return view('admin.content.email.draft');
    });
    Route::get('email/send',function (){
        return view('admin.content.email.send');
    });
});

/**
 * route cho các nhà cung cấp
 */

Route::prefix('seller')->group(function (){
    //Gom nhom cac route cho phan admin
    Route::get('/','SellerController@index')->name('seller.dashboard');
    //Route dang nhap thanh cong
    Route::get('/dasboard','SellerController@index')->name('seller.dashboard');
    //tra ve view dang ki tk
    Route::get('register','SellerController@create')->name('seller.register');
    //
    Route::post('register','SellerController@store')->name('seller.register.store');
    //Route tra ve view dang nhap
    Route::get('login','Auth\Seller\LoginController@login')->name('seller.auth.login');
    //Method: post
    Route::post('login','Auth\Seller\LoginController@loginSeller')->name('seller.auth.loginSeller');
    //Route tra ve view dang xuat
    Route::post('logout','Auth\Seller\LoginController@logout')->name('seller.auth.logout');
});

/**
 * route cho các nhà cung cấp
 */

Route::prefix('shipper')->group(function () {
    //Gom nhom cac route cho phan admin
    Route::get('/','ShipperController@index')->name('shipper.dashboard');
    //Route dang nhap thanh cong
    Route::get('/dasboard','ShipperController@index')->name('shipper.dashboard');
    //tra ve view dang ki tk
    Route::get('register','ShipperController@create')->name('shipper.register');
    //
    Route::post('register','ShipperController@store')->name('shipper.register.store');
    //Route tra ve view dang nhap
    Route::get('login','Auth\Shipper\LoginController@login')->name('shipper.auth.login');
    //Method: post
    Route::post('login','Auth\Shipper\LoginController@loginShipper')->name('shipper.auth.loginShipper');
    //Route tra ve view dang xuat
    Route::get('logout','Auth\Shipper\LoginController@logout')->name('shipper.auth.logout');
});