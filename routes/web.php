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
use App\Post;

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
// Route::get('/admin','PostController@index');
// Route::resource('posts','PostController');
Route::group(['prefix'=>'/adminview','middleware'=>'adminLogin'],function(){
	Route::get('','CrudController@create');
	Route::resource('cruds','CrudController');
	Route::resource('booktype','BookTypeControll');
});
Route::get('login','LoginController@getlogin')->name('getlogin');
Route::post('login', 'LoginController@postLogin')->name('postLogin');
Route::get('logout','LoginController@getlogout')->name('namelogin');

Route::get('thu', function(){
	$post = Post::find(1)->booktype->toArray();

	var_dump($post);
});
