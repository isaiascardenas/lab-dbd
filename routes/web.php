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
Route::resource('users', 'UserController');

/* CRUD Reservas Actividades */
//Route::resources([
    //'actividades' => 'ReservaActividad\ActividadesController',
    //'reservaactividades'    => 'ReservaActividad\ReservaActividadesController',
//]);

Route::resource('actividades', 'ReservaActividad\ActividadesController', [
  'parameters' => ['actividades' => 'actividad']
  ]);

/* CRUD Reservas Hoteles */



Route::resource('hoteles','ReservaHabitacion\HotelesController', [
  'parameters' => ['hoteles'=>'hotel']
]);

Route::resource('habitaciones','ReservaHabitacion\HabitacionesController', [
  'parameters' => ['habitaciones'=>'habitacion']
]);

Route::resource('reservaHabitaciones','ReservaHabitacion\ReservaHabitacionesController', [
  'parameters' => ['reservaHabitaciones'=>'reservaHabitacion']
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
    'reserva_autos' => 'ReservaAuto\ReservaAutosController',
]);

Route::resource('sucursales', 'ReservaAuto\SucursalesController', [
    'parameters' => ['sucursales' => 'sucursal']
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

