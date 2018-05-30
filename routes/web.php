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
Route::get('/home', 'HomeController@index');


/**
 * Reservas de vuelo
 */
Route::get('/vuelo/', 			'VueloController@index');
Route::post('/vuelo/list/', 	'VueloController@list');
Route::get('/vuelo/show/', 		'VueloController@show');
Route::post('/vuelo/reserva', 	'VueloController@reserva');
