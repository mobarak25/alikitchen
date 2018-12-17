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
Route::post('/reservation','ReservationController@reserv')->name('reservation.reserv');

Auth::routes();

/*
	N.B: See This.
	Route::get('dashboard','Admin\DashboardController@index')->name('admin.dashboard');
*/


Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'Admin'],function(){
	Route::get('dashboard','DashboardController@index')->name('admin.dashboard');
	Route::resource('sliders', 'SlidersController');
	Route::resource('category', 'CategoryController');
	Route::resource('item', 'ItemController');
	Route::get('reservation', 'ReservationController@index')->name('reservation.index');
	Route::get('reservation-statue/{id}', 'ReservationController@status')->name('reservation.status');
});
