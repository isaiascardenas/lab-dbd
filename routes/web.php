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

Auth::routes();


Route::get('/', 'HomeController@index');
Route::get('/cart', 'HomeController@cart');

/**
 * Reservas de vuelo
 */
Route::post('/vuelo/list/', 	'VueloController@list');
Route::get('/vuelo/show/{tramo}', 	'VueloController@show');
Route::post('/vuelo/reserva', 	'VueloController@reserva');
