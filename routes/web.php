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
Route::get('manage/settings', 'App\Http\Controllers\Manage\ManageHomeController@settings')->name('managesettings');
Route::post('manage/settings/update', 'App\Http\Controllers\Manage\ManageHomeController@updatesettings')->name('managesettingsupdate');

Route::get('manage/products', 'App\Http\Controllers\Manage\ManageProductController@index')->name('manageproducts');
Route::get('manage/products/new', 'App\Http\Controllers\Manage\ManageProductController@newproduct')->name('manageproductsnew');
Route::post('manage/products/create', 'App\Http\Controllers\Manage\ManageProductController@createproduct')->name('manageproductscreate');
Route::get('manage/products/edit/{id}', 'App\Http\Controllers\Manage\ManageProductController@editproduct')->name('manageproductsedit');
Route::post('manage/products/edit/{id}', 'App\Http\Controllers\Manage\ManageProductController@updateproduct')->name('manageproductsupdate');
Route::post('manage/products/delete/{id}', 'App\Http\Controllers\Manage\ManageProductController@deleteproduct')->name('manageproductsdelete');

Route::get('manage/categories', 'App\Http\Controllers\Manage\ManageCategoryController@index')->name('managecategories');
Route::get('manage/categories/new', 'App\Http\Controllers\Manage\ManageCategoryController@newcategory')->name('managecategoriesnew');
Route::post('manage/categories/create', 'App\Http\Controllers\Manage\ManageCategoryController@createcategory')->name('managecategoriescreate');
Route::get('manage/categories/edit/{id}', 'App\Http\Controllers\Manage\ManageCategoryController@editcategory')->name('managecategoriesedit');
Route::post('manage/categories/edit/{id}', 'App\Http\Controllers\Manage\ManageCategoryController@updatecategory')->name('managecategoriesupdate');
Route::post('manage/categories/delete/{id}', 'App\Http\Controllers\Manage\ManageCategoryController@deletecategory')->name('managecategoriesdelete');

Route::get('manage/variations', 'App\Http\Controllers\Manage\ManageVariationController@index')->name('managevariations');
Route::post('manage/variations/create', 'App\Http\Controllers\Manage\ManageVariationController@createvariation')->name('managevariationscreate');
Route::post('manage/variations/delete', 'App\Http\Controllers\Manage\ManageVariationController@deletevariation')->name('managevariationsdelete');
Route::get('manage/variations/edit/{id}', 'App\Http\Controllers\Manage\ManageVariationController@editvariation')->name('managevariationsedit');
Route::post('manage/variations/update', 'App\Http\Controllers\Manage\ManageVariationController@updatevariation')->name('managevariationsupdate');

Route::get('manage/options/{id}', 'App\Http\Controllers\Manage\ManageVariationController@options')->name('manageoptions');
Route::get('manage/options/new/{id}', 'App\Http\Controllers\Manage\ManageVariationController@newoption')->name('manageoptionsnew');
Route::post('manage/options/create', 'App\Http\Controllers\Manage\ManageVariationController@createoption')->name('manageoptionscreate');
Route::post('manage/options/delete', 'App\Http\Controllers\Manage\ManageVariationController@deleteoption')->name('manageoptionsdelete');

Route::get('manage/users', 'App\Http\Controllers\Manage\ManageUserController@index')->name('manageusers');

