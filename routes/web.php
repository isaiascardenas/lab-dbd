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

Route::resource('user', 'UserController')->except(['create', 'edit']);

/**
 * Reservas de actividades
 */
Route::post('/actividad/',      'ActividadesController@index');

/**
 * Reservas de hoteles
 */
Route::post('/hotel/',        'HotelesController@index');

/**
 * Reservas de autos
 */
Route::resource('autos', 'ReservaAuto\AutosController')->except(['create', 'edit']);
Route::resource('compania', 'ReservaAuto\CompaniasController')->except(['create', 'edit']);

/**
 *  Reservas vuelos
 */
Route::post('/vuelos/',             'ReservaVuelo\VuelosController@index');   // POST => filtros
Route::post('/vuelos/details/',     'ReservaVuelo\VuelosController@show');    // POST => [tramo_1, tramo_2]
Route::post('/vuelos/reserva/',     'ReservaVuelo\VuelosController@reserva'); // POST => [tramo_1, tramo_2] tras confirmacion en /vuelos/details/
/* CRUD Tramos */
Route::resource('tramos', 'ReservaVuelo\TramosController');
/* CRUD Aerolineas */
Route::resource('aerolineas', 'ReservaVuelo\AerolineasController');
/* CRUD Aeropuerto */
Route::resource('aeropuertos', 'ReservaVuelo\AeropuertosController');
/* CRUD Aviones */
Route::resource('aviones', 'ReservaVuelo\AvionesController');
