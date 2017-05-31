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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=> 'web'],function(){
});

Route::group(['middleware'=> 'web'],function(){
});
//admin_user Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('admin_user','\App\Http\Controllers\Admin_userController');
  Route::post('admin_user/{id}/update','\App\Http\Controllers\Admin_userController@update');
  Route::get('admin_user/{id}/delete','\App\Http\Controllers\Admin_userController@destroy');
  Route::get('admin_user/{id}/deleteMsg','\App\Http\Controllers\Admin_userController@DeleteMsg');
});
