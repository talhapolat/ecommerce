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

Route::get('category/{category_slug}', 'App\Http\Controllers\CategoryController@index')->name('category');


Route::get('getOption1', 'App\Http\Controllers\HomeController@getOption1')->name('getOption1');
Route::get('getOption2', 'App\Http\Controllers\HomeController@getOption2')->name('getOption2');
Route::get('getOption2first', 'App\Http\Controllers\HomeController@getOption2first')->name('getOption2first');


Route::get('getProduct', 'App\Http\Controllers\HomeController@getProduct')->name('getProduct');

Route::get('product/{product_slug}', 'App\Http\Controllers\ProductController@index')->name('productdetail');






