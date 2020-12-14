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
Route::post('/callback', 'IndexController@callback')->name('callback');
Route::post('/send', 'IndexController@send')->name('send');
Route::post('/bepartner', 'IndexController@bePartner')->name('bepartner');
//Catalog
Route::get('/catalog', 'ProductController@catalog')->name('catalog');
//Pages
Route::get('/docs', 'DocController@docs')->name('docs');
Route::get('/docs/{slug}', 'DocController@showDoc')->name('showDoc');
//Show product
Route::get('/catalog/{url}', 'ProductController@showProduct')->name('productShow');
Route::post('/productsend', 'ProductController@productSend')->name('productSend');
//Show categories
Route::get('/categories', 'CategoryController@listCategories')->name('categories');
//show product of category
Route::get('/categories/{url}', 'CategoryController@showCategory')->name('categoryShow');
//Show manufacturers
Route::get('/manufacturers', 'ManufacturerController@listManufacturers')->name('manufacturers');
//Show products of manufacturer
Route::get('/manufacturers/{url}', 'ManufacturerController@showManufacturer')->name('manufacturerShow');
//Sitemap
Route::get('sitemap.xml', 'SitemapController@sitemap')->name('sitemap');
Route::get('/presentation', 'IndexController@presentation')->name('presentation');

// Back-end
Auth::routes();
Route::group(['middleware' => 'role:admin'], function() {

    Route::get('/dashboard', 'AdminController@index')->name('admin')->middleware('auth');
    Route::resource('/dashboard/products', 'ProductController')->middleware('auth');
    Route::resource('/dashboard/categories', 'CategoryController')->middleware('auth');
    Route::resource('/dashboard/categories', 'CategoryController')->middleware('auth');
    Route::resource('/dashboard/manufacturers', 'ManufacturerController')->middleware('auth');
    Route::resource('/dashboard/sertificates', 'SertificateController')->middleware('auth');
    Route::get('/dashboard/sertificates/create/{id}', 'SertificateController@create')->middleware('auth')->name('sertificates.create');
    Route::resource('/dashboard/orders', 'OrderController')->middleware('auth');
    Route::resource('/dashboard/users', 'UserController')->middleware('auth');
 
 });



