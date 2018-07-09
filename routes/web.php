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
    return view('main');
});
//
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/{any}', 'SpaController@index')->where('any', '.*');
Route::post('/register', 'SpaController@register');
Route::get('/register', 'SpaController@index');

Route::get('/home', 'HomeController@index');
Route::get('/login', 'AuthController@index');
//Route::get('/admin', 'AdminController@index');
Route::post('/admin', 'AdminController@index');




