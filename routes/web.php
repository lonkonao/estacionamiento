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

Route::group(['middleware' => 'auth'], function () {

    Route::resource('parking','ParkingController');


    //datatables
    Route::get('/datatables','ParkingController@getIndex');
    Route::get('/anyData','ParkingController@anyData')->name('datatables.data');

    //datatables todos
    Route::get('/listado','ParkingController@listado');
    Route::get('/listadoJson','ParkingController@listadoJson')->name('listado.jason');




});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

