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
    return view('welcome');
});


Route::middleware('auth')->group(function (){

    //dashboard route
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('user_list','DashboardController@user_list')->name('user.list');
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


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
