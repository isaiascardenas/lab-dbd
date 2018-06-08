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
 * Reservas de actividades
 */
Route::post('/actividad/', 				'ActividadesController@index');

/**
 * Reservas de hoteles
 */
Route::post('/hotel/', 				'HotelesController@index');

/**
 * Reservas de autos
 */
Route::post('/auto/', 				'AutosController@index');

/**
 *  Reservas vuelos
 */
Route::post('/vuelo/', 				'VuelosController@index');
Route::get('/vuelo/show/{tramo}', 	'VuelosController@show');
Route::post('/vuelo/reserva', 		'VuelosController@reserva');
