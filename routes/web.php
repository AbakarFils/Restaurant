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
Route::get('/','HomeController@index')->name('welcome');

Route::post('/reservation','ReservationController@reserve')->name('reservation.reserve');

Route::post('/contact','ContactController@sendMessage')->name('contact.send');

Auth::routes();

Route::group(['prefix '=>'admin','middleware'=>'auth','namespace'=>'admin'],function() {

    Route::get('admin/dashboard','DashboardController@index')->name('admin.dashboard');

    Route::resource('admin/slider','SliderController');
    Route::resource('admin/category','CategoryController');
    Route::resource('admin/item','ItemController');

    Route::get('admin/reservation','ReservationController@index')->name('reservation.index');
    Route::post('admin/reservation/{id}','ReservationController@status')->name('reservation.status');
    Route::delete('admin/reservation/{id}','ReservationController@destory')->name('reservation.destory');

    Route::get('admin/contact','ContactController@index')->name('contact.index');
    Route::get('admin/contact/{id}','ContactController@show')->name('contact.show');
    Route::delete('admin/contact/{id}','ContactController@destroy')->name('contact.destroy');
});
