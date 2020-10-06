<?php

use Illuminate\Support\Facades\Route;


Auth::routes();
Auth::routes(['register' => false]);


Route::group(['prefix' => 'admin'], function(){
    // Route::get('/dashboard','AdminController@index')->name('admin.dashboard');
    Route::get('/generate-coupon','AdminController@coupon')->name('admin.coupon');
    Route::post('/generate-coupon','AdminController@store')->name('admin.coupon.store');
});
Route::get('/log-out','AdminController@getLogOut');
Auth::routes();

Route::get('/',function(){
    return redirect('/login');
});
// Route::get('/home', 'HomeController@index')->name('home');

