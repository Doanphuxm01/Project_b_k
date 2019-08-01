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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => '/adminview', 'middleware' => 'adminLogin'], function () {
    Route::get('', 'CrudController@index');
    Route::get('search', 'CrudController@search');
    Route::resource('cruds', 'CrudController');
    Route::resource('booktype', 'BookTypeControll');
});
Route::get('login', 'LoginController@getlogin')->name('getlogin');
Route::post('login', 'LoginController@postLogin')->name('postLogin');
Route::get('logout', 'LoginController@getlogout')->name('namelogin');
