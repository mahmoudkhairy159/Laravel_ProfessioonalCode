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

Auth::routes(['verify'=>true]);

//facebook socialite
Route::get('redirect/{service}','SocialController@redirect');
Route::get('callback/{service}','SocialController@callback');


Route::group(['prefix'=>LaravelLocalization::setLocale() ,
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
], function (){
    Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
    Route::resource('offers','OfferController');
    //AjAX Routes
    Route::resource('ajaxOffers','AjaxOfferController');

    //Authentication and guards (middleware)
    Route::group(['middleware'=>'checkAge','namespace'=>'Auth'],function (){
        Route::get('adult/','CustomAuthController@adult');
    });

    Route::get('site/','Auth\CustomAuthController@site')->middleware('auth:web')->name('site');
    Route::get('admin/','Auth\CustomAuthController@admin')->middleware('auth:admin')->name('admin');

});
Route::get('admin/login','Auth\CustomAuthController@loginAdmin')->name('admin.login');
Route::post('admin/login','Auth\CustomAuthController@checkAdminLogin')->name('checkAdminLogin');












