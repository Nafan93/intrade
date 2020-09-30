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
// Front-end routs
//Homepage
Route::get('/', 'IndexController@index')->name('index');
//Catalog
Route::get('/catalog', 'ProductController@catalog')->name('catalog');
//Show product
Route::get('/catalog/{url}', 'ProductController@showProduct')->name('productShow');
//Show categories
Route::get('/categories', 'CategoryController@listCategories')->name('categories');
//show product of category
Route::get('/categories/{url}', 'CategoryController@showCategory')->name('categoryShow');
//Show manufacturers
Route::get('/manufacturers', 'ManufacturerController@listManufacturers')->name('manufacturers');
//Show products of manufacturer
Route::get('/manufacturers/{url}', 'ManufacturerController@showManufacturer')->name('manufacturerShow');
// Back-end
Auth::routes();
Route::get('/dashboard', 'AdminController@index')->name('admin')->middleware('auth');
Route::resource('/dashboard/products', 'ProductController')->middleware('auth');
Route::resource('/dashboard/categories', 'CategoryController')->middleware('auth');
Route::resource('/dashboard/categories', 'CategoryController')->middleware('auth');
Route::resource('/dashboard/manufacturers', 'ManufacturerController')->middleware('auth');
Route::resource('/dashboard/sertificates', 'SertificateController')->middleware('auth');
Auth::routes();
/*Route::get('/dashboard/product-list', 'AdminController@list')->name('adminProductList');


