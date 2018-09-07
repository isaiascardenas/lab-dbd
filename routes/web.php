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
Route::post('/payall', 'HomeController@payAll');
Route::post('/delete_from_cart', 'HomeController@deleteFromCart');

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

Route::resource('reserva_actividades','ReservaActividad\ReservaActividadesController', [
  'parameters' => ['reservaActividades'=>'reservaActividad']
]);

Route::post('/reserva_actividades/create', 'ReservaActividad\ReservaActividadesController@create');


//Route::get(
  //  'reserva_actividades/reservar/{actividad}', 'ReservaActividad\ReservaActividadesController@reservar'
//);



/* CRUD Reservas Hoteles */

Route::resource('hoteles','ReservaHabitacion\HotelesController', [
  'parameters' => ['hoteles'=>'hotel']
]);

Route::resource('habitaciones','ReservaHabitacion\HabitacionesController', [
  'parameters' => ['habitaciones'=>'habitacion']
]);

Route::resource('reserva_habitaciones','ReservaHabitacion\ReservaHabitacionesController', [
  'parameters' => ['reservaHabitaciones'=>'reservaHabitacion']
]);

Route::get('/reserva_habitacion/reservar/{habitacion}', 'ReservaHabitacion\ReservaHabitacionesController@reservar');

/**
 * Paquetes
 */
Route::resources([
    'PaqueteVueloAuto' => 'Paquetes\PaqueteVueloAutoController',
    'PaqueteVueloHotel' => 'Paquetes\PaqueteVueloHotelController'
]);

/**
 * Reservas Autos
 */
Route::get(
    'reserva_autos/reservar/{auto}', 'ReservaAuto\ReservaAutosController@reservar'
);

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
 *  Proceso de reserva de vuelos
 */
Route::post('/vuelos/',             'ReservaVuelo\VuelosController@index');   // POST => filtros
Route::get('/vuelos/',             'ReservaVuelo\VuelosController@index');   // POST => filtros
Route::post('/vuelos/details/',     'ReservaVuelo\VuelosController@show');    // POST => [tramo_1, tramo_2]
Route::post('/vuelos/reserva/',     'ReservaVuelo\VuelosController@reserva'); // POST => [tramo_1, tramo_2] tras confirmacion en /vuelos/details/

/* CRUD Reservas Vuelos */
Route::resources([
  'aerolineas'      => 'ReservaVuelo\AerolineasController',
  'aeropuertos'     => 'ReservaVuelo\AeropuertosController',
  'asientos'        => 'ReservaVuelo\AsientosController',
  'pasajeros'       => 'ReservaVuelo\PasajerosController',
  'reserva-boletos' => 'ReservaVuelo\ReservaBoletosController',
  'tipo-asientos'   => 'ReservaVuelo\TipoAsientosController',
  'tramos'          => 'ReservaVuelo\TramosController'
]);

Route::resource('aviones', 'ReservaVuelo\AvionesController')->parameters(['aviones' => 'avion']);


/* CRUD Cuentas de usuario*/
Route::resources([
  'cuentas'      => 'CuentasController',
  'tipocuentas'  => 'TipoCuentasController',
  'banco'        => 'BancosController',
]);

