<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/


/*
-----------------------------
Frontend Routes
-----------------------------
*/


//home and product routes
use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index')->name('home');
Route::get('product/{id}','Front\ProductController@details')->name('product.details');
Route::get('products/{id?}','Front\ProductController@index')->name('front.product.index');
Route::get('brand/{id?}','Front\ProductController@brand')->name('front.product.brand');
Route::get('search','Front\ProductController@find')->name('front.product.find');



//cart view routes
Route::get('cart','Front\ProductController@cart')->name('cart');
Route::get('clear-cart','Front\ProductController@clear')->name('clear.cart');

//guest store and payment route
Route::post('customer/store','CustomerController@store')->name('customer.store');
Route::get('payment/{customerId}/{orderId}','Front\CheckoutController@payment')->name('payment');

//checkout page route
Route::get('checkout','Front\CheckoutController@index')->name('checkout')->middleware('customer');

//add to cart route
Route::get('ajax/add-to-cart/{product_id}','Front\AjaxController@addToCart')->name('ajax.addToCart');
Route::get('remove-cart/{product_id}','Front\AjaxController@delete')->name('remove.cart');
Route::post('update-cart/{product_id}','Front\AjaxController@update')->name('update.cart');


//testing routes
Route::get('test',function (){
    return Auth::guard('customer')->user()->id;
});
Route::get('llogin',function (){
    return view('not_found');
});
//testing routes


//Customer multi-auth routes
Route::get('registration', 'Customer\RegisterController@showRegistrationForm')->name('user.register');
Route::post('registration', 'CustomerController@create')->name('user.register.submit');
Route::get('account', 'CustomerController@view')->name('user.view')->middleware('customer');
Route::get('account/info', 'CustomerController@show')->name('user.details')->middleware('customer');
Route::get('account/{id}/edit', 'CustomerController@edit')->name('user.info.edit')->middleware('customer');
Route::put('account/{id}','CustomerController@update')->name('user.info.update')->middleware('customer');

Route::get('signin', 'Customer\LoginController@showLoginForm')->name('user.login');
Route::post('signin', 'Customer\LoginController@login')->name('user.login.submit');
Route::get('signout', 'Customer\LoginController@logout')->name('user.logout');
Route::get('reset', 'Customer\ForgotPasswordController@showLinkRequestForm')->name('user.password.request');
Route::post('reset/pass', 'Customer\ForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
Route::get('pass/reset/{token}', 'Customer\ResetPasswordController@showResetForm')->name('user.password.reset');
Route::post('pass/reset', 'Customer\ResetPasswordController@reset')->name('user.password.update');
//Customer multi-auth routes



/*
-----------------------------
Dashboard Route Group Start
-----------------------------
*/
Route::middleware('auth')->prefix('admin')->group(function (){

//dashboard route
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('test','DashboardController@test')->name('test');

//category routes
    Route::resource('category','CategoryController');
    Route::post('category/{id}/restore','CategoryController@restore')->name('category.restore');
    Route::delete('category/{id}/delete','CategoryController@delete')->name('category.delete');

//brand routes
    Route::resource('brand','BrandController');
    Route::post('brand/{id}/restore','BrandController@restore')->name('brand.restore');
    Route::delete('brand/{id}/delete','BrandController@delete')->name('brand.delete');

//product routes
    Route::resource('product','ProductController');
    Route::post('product/{id}/restore','ProductController@restore')->name('product.restore');
    Route::delete('product/{id}/delete','ProductController@delete')->name('product.delete');
    Route::get('product/{image_id}/delete','ProductController@delete_image')->name('product.delete.image');

//Coupon routes
    Route::resource('coupon','CouponController');
    Route::post('coupon/{id}/restore','CouponController@restore')->name('coupon.restore');
    Route::delete('coupon/{id}/delete','CouponController@delete')->name('coupon.delete');

//Campaign routes
    Route::resource('campaign','CampaignController');
    Route::post('campaign/{id}/restore','CampaignController@restore')->name('campaign.restore');
    Route::delete('campaign/{id}/delete','CampaignController@delete')->name('campaign.delete');

//User routes
    Route::resource('user','UserController');
    Route::post('user/{id}/restore','UserController@restore')->name('user.restore');
    Route::delete('user/{id}/delete','UserController@delete')->name('user.delete');

});

Auth::routes();

/* End of Dashboard Route Group */
