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
Route::post('/actividad/', 			'ActividadesController@index');

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
Route::post('/vuelos/', 			'ReservaVuelo\VuelosController@index');		// POST => filtros
Route::post('/vuelos/details/', 	'ReservaVuelo\VuelosController@show');		// POST => [tramo_1, tramo_2]
Route::post('/vuelos/reserva/', 	'ReservaVuelo\VuelosController@reserva');	// POST => [tramo_1, tramo_2] tras confirmacion en /vuelos/details/
// CRUD Tramos
Route::get('/tramos/', 				'ReservaVuelo\TramosController@index');
Route::get('/tramos/create/', 		'ReservaVuelo\TramosController@create');
Route::post('/tramos/', 			'ReservaVuelo\TramosController@store');
Route::get('/tramos/{id}', 			'ReservaVuelo\TramosController@show');
Route::get('/tramos/{id}/edit', 	'ReservaVuelo\TramosController@edit');
Route::patch('/tramos/{id}', 		'ReservaVuelo\TramosController@update');
Route::delete('/tramos/{id}', 		'ReservaVuelo\TramosController@destroy');
// CRUD Aerolineas
Route::get('/aerolineas/', 			'ReservaVuelo\AerolineasController@index');
Route::get('/aerolineas/create/', 	'ReservaVuelo\AerolineasController@create');
Route::post('/aerolineas/', 		'ReservaVuelo\AerolineasController@store');
Route::get('/aerolineas/{id}', 		'ReservaVuelo\AerolineasController@show');
Route::get('/aerolineas/{id}/edit', 'ReservaVuelo\AerolineasController@edit');
Route::patch('/aerolineas/{id}', 	'ReservaVuelo\AerolineasController@update');
Route::delete('/aerolineas/{id}', 	'ReservaVuelo\AerolineasController@destroy');
// CRUD Aeropuerto
Route::get('/aeropuertos/', 		'ReservaVuelo\AeropuertosController@index');
Route::get('/aeropuertos/create/', 	'ReservaVuelo\AeropuertosController@create');
Route::post('/aeropuertos/', 		'ReservaVuelo\AeropuertosController@store');
Route::get('/aeropuertos/{id}', 	'ReservaVuelo\AeropuertosController@show');
Route::get('/aeropuertos/{id}/edit','ReservaVuelo\AeropuertosController@edit');
Route::patch('/aeropuertos/{id}', 	'ReservaVuelo\AeropuertosController@update');
Route::delete('/aeropuertos/{id}', 	'ReservaVuelo\AeropuertosController@destroy');
// CRUD Aviones
Route::get('/aviones/', 			'ReservaVuelo\AvionesController@index');
Route::get('/aviones/create/', 		'ReservaVuelo\AvionesController@create');
Route::post('/aviones/', 			'ReservaVuelo\AvionesController@store');
Route::get('/aviones/{id}', 		'ReservaVuelo\AvionesController@show');
Route::get('/aviones/{id}/edit',	'ReservaVuelo\AvionesController@edit');
Route::patch('/aviones/{id}', 		'ReservaVuelo\AvionesController@update');
Route::delete('/aviones/{id}', 		'ReservaVuelo\AvionesController@destroy');
