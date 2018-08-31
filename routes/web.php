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

/**
 *  Home
 */
Route::get('/', 'HomeController@index');
Route::get('/cart', 'HomeController@cart');

/* CRUD Usuarios */
Route::resource('users', 'UserController')->except(['create', 'edit']);

/* CRUD Reservas Actividades */
Route::resources([
    'actividades' => 'ReservaActividad\ActividadesController',
    'reservaactividades'    => 'ReservaActividad\ReservaActividadesController',
]);

/* CRUD Reservas Hoteles */
Route::resources([
    'hoteles' => 'ReservaHabitacion\HotelesController',
    'habitaciones' => 'ReservaHabitacion\HabitacionesController',
    'reserva_habitaciones' => 'ReservaHabitacion\ReservaHabitacionesController',
]);

/**
 * Paquetes
 */
Route::resources([
    'PaqueteVueloAuto' => 'Paquetes\PaqueteVueloAutoController',
    'PaqueteVueloHotel' => 'Paquetes\PaqueteVueloHotelController'
]);

/* CRUD Reservas Autos */
Route::resources([
    'autos' => 'ReservaAuto\AutosController',
    'companias' => 'ReservaAuto\CompaniasController',
    'sucursales' => 'ReservaAuto\SucursalesController',
    'reserva_autos' => 'ReservaAuto\ReservaAutosController',
]);

/**
 *  Reservas vuelos
 */
Route::post('/vuelos/',             'ReservaVuelo\VuelosController@index');   // POST => filtros
Route::post('/vuelos/details/',     'ReservaVuelo\VuelosController@show');    // POST => [tramo_1, tramo_2]
Route::post('/vuelos/reserva/',     'ReservaVuelo\VuelosController@reserva'); // POST => [tramo_1, tramo_2] tras confirmacion en /vuelos/details/

/* CRUD Reservas Vuelos */
Route::resources([
  'aerolineas'      => 'ReservaVuelo\AerolineasController',
  'aeropuertos'     => 'ReservaVuelo\AeropuertosController',
  'asientos'        => 'ReservaVuelo\AsientosController',
  'aviones'         => 'ReservaVuelo\AvionesController',
  'pasajeros'       => 'ReservaVuelo\PasajerosController',
  'reserva_boletos' => 'ReservaVuelo\ReservaBoletosController',
  'tipo_asientos'   => 'ReservaVuelo\TipoAsientosController',
  'tramos'          => 'ReservaVuelo\TramosController'
]);

/* CRUD Cuentas de usuario*/
Route::resources([
  'cuentas'      => 'CuentasController',
  'tipocuentas'  => 'TipoCuentasController',
  'banco'        => 'BancosController',
]);

