<?php

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

Route::group(['prefix' => '/admin'], function () {
    Voyager::routes();
});


Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::get('register', 'App\Http\Controllers\LoginController@register')->name('register');
Route::get('collection/{collection_slug}', 'App\Http\Controllers\HomeController@collection')->name('collection');
Route::get('collections', 'App\Http\Controllers\HomeController@collections')->name('collections');
Route::get('s/{search}', 'App\Http\Controllers\HomeController@search')->name('search');

Route::get('category/{category_slug}', 'App\Http\Controllers\CategoryController@index')->name('category');

Route::get('getOption1', 'App\Http\Controllers\HomeController@getOption1')->name('getOption1');
Route::get('getOption2', 'App\Http\Controllers\HomeController@getOption2')->name('getOption2');
Route::get('getOption2first', 'App\Http\Controllers\HomeController@getOption2first')->name('getOption2first');
Route::get('getProductGallery', 'App\Http\Controllers\HomeController@getProductGallery')->name('getProductGallery');

Route::get('getProduct', 'App\Http\Controllers\HomeController@getProduct')->name('getProduct');
Route::get('product/{product_slug}', 'App\Http\Controllers\ProductController@index')->name('productdetail');

Route::get('basket', 'App\Http\Controllers\CartController@index')->name('basket');
Route::get('addcart', 'App\Http\Controllers\CartController@addcart')->name('addcart');
Route::get('deletecart', 'App\Http\Controllers\CartController@deletecart')->name('deletecart');
Route::post('updatecart', 'App\Http\Controllers\CartController@updatecart')->name('updatecart');

Route::get('manage', 'App\Http\Controllers\Manage\ManageHomeController@index')->name('managehome');
Route::get('manage/products', 'App\Http\Controllers\Manage\ManageProductController@index')->name('manageproducts');
Route::get('manage/products/new', 'App\Http\Controllers\Manage\ManageProductController@newproduct')->name('manageproductsnew');
Route::post('manage/products/create', 'App\Http\Controllers\Manage\ManageProductController@createproduct')->name('manageproductscreate');
