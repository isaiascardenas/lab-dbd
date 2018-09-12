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
 * 
 * GUEST
 * 
 */
Route::get('/', 'HomeController@index');

/* Cart */
Route::get('/cart', 'CartController@index');
Route::delete('/cart', 'CartController@delete');

/* Proceso de reserva de vuelos */
Route::post('/vuelos/',         'ReservaVuelo\VuelosController@index');   // POST => filtros
Route::post('/vuelos/details/', 'ReservaVuelo\VuelosController@show');    // POST => [tramo_1, tramo_2]
Route::post('/vuelos/reservar/', 'ReservaVuelo\VuelosController@store'); // POST => [tramo_1, tramo_2] tras confirmacion en /vuelos/details/

/* Proceso de reserva de autos */
Route::post('/reserva-autos/', 'ReservaAuto\ReservaAutosController@index');
Route::get('/reserva-autos/reservar/{auto}', 'ReservaAuto\ReservaAutosController@create');
Route::post('/reserva-autos/reservar/{auto}', 'ReservaAuto\ReservaAutosController@store');

/* Proceso de reserva de actividades */
Route::post('/reserva-actividades/', 'ReservaActividad\ReservaActividadesController@index');
Route::get('/reserva-actividades/reservar/{actividad}', 'ReservaActividad\ReservaActividadesController@create');
Route::post('/reserva-actividades/reservar/{actividad}', 'ReservaActividad\ReservaActividadesController@store');

/* Proceso de reserva de habitaciones */
Route::post('/reserva-habitaciones','ReservaHabitacion\ReservaHabitacionesController@index');
Route::get('/reserva-habitaciones/reservar/{habitacion}','ReservaHabitacion\ReservaHabitacionesController@create');
Route::post('/reserva-habitaciones/reservar/{habitacion}','ReservaHabitacion\ReservaHabitacionesController@store');


/**
 * 
 * USER ONLY
 * 
 */
Route::group(['middleware' => 'auth'], function(){
  Route::post('/pay', 'CartController@pay');

  /* CRUD Cuentas de usuario*/
  Route::resources([
    'cuentas' => 'CuentasController',
    'tipo-cuentas' => 'TipoCuentasController',
    'bancos' => 'BancosController',
  ]);
});


/**
 * 
 * ADMIN ONLY
 * 
 */

Route::group(['middleware' => 'admin'], function(){

  /* CRUD Usuarios */
  Route::resource('users', 'UserController');

  /* CRUD Reservas Autos */
  Route::resource('companias', 'ReservaAuto\CompaniasController');

  Route::resource('sucursales', 'ReservaAuto\SucursalesController', [
      'parameters' => ['sucursales' => 'sucursal']
  ]);

  /* CRUD Reservas Actividades */
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

  /* CRUD Paquetes */
  Route::resources([
      'paquete-auto' => 'Paquetes\PaqueteVueloAutoController',
      'paquete-hotel' => 'Paquetes\PaqueteVueloHotelController'
  ]);
});

