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

Route::get('/', 'HomeController@index')->name('domov');
Route::get('/shop', 'ProductController@index')->name('obchod');
Route::get('/produkt/{product_id}', 'ProductController@show')->name('produkt');
Route::post('/shop', 'ProductController@search')->name('obchod.hladaj');
Route::get('/oblubene', 'PageController@index')->name('oblubene');
Route::get('/produkt/add/{product_id}', 'ProductController@addToFavorites')->name('obchod.oblubene');
Route::get('/produkt/delete/{product_id}', 'ProductController@destroy');


Route::get('/import', 'ImportController@getImport')->name('import');
Route::post('/import_parse', 'ImportController@parseImport')->name('import_parse');
Route::post('/import_process', 'ImportController@processImport')->name('import_process');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
