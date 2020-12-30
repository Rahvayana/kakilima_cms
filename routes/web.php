<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'HomeController@user')->name('user');
Route::get('/seller', 'HomeController@seller')->name('seller');
Route::get('/getPointMap', 'HomeController@getPointMap')->name('getPointMap');
Route::get('/post', 'HomeController@post')->name('post');
Route::get('/admin', 'HomeController@admin')->name('admin');
Route::get('/addAdmin', 'HomeController@addAdmin')->name('add-admin');
Route::post('/save-admin', 'HomeController@saveAdmin')->name('save-admin');
Route::get('/edit-admin/{id}', 'HomeController@editAdmin')->name('edit-admin');
Route::post('/store-admin/{id}', 'HomeController@storeAdmin')->name('store-admin');
Route::post('/deleteAdmin/{id}', 'HomeController@deleteAdmin')->name('delete-admin');
Route::get('/post/{id}', 'HomeController@postDetail')->name('detail-post');
Route::get('/user/{id}', 'HomeController@userDetail')->name('user-detail');
Route::get('/seller/{id}', 'HomeController@sellerDetail')->name('seller-detail');
