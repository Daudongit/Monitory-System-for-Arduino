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
    // return view('welcome');
    return redirect('/login');
});

Auth::routes();

Route::group(['middleware'=>'auth'], function(){
    Route::get('/map/{device?}', 'MapController@index')->name('map');
    Route::get('/status', 'StatusController@index')->name('status');
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['middleware'=>'guest'], function(){
});

