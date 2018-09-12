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

Route::get('/test', function(){
    return dd(Auth::user()->id);
});
/**
 * 
 * GUEST
 * 
 */
Route::get('/', 'HomeController@index');
Route::get('/cart', 'HomeController@cart');

/* Proceso de reserva de vuelos */
Route::post('/vuelos/',             'ReservaVuelo\VuelosController@index');   // POST => filtros
Route::get('/vuelos/',             'ReservaVuelo\VuelosController@index');   // POST => filtros
Route::post('/vuelos/details/',     'ReservaVuelo\VuelosController@show');    // POST => [tramo_1, tramo_2]
Route::post('/vuelos/reserva/',     'ReservaVuelo\VuelosController@reserva'); // POST => [tramo_1, tramo_2] tras confirmacion en /vuelos/details/

/* Proceso de reserva de autos */
Route::resource('reserva_autos', 'ReservaAuto\ReservaAutosController');

/* Proceso de reserva de actividades */
Route::get('/reserva_actividades/create/{actividad}', 'ReservaActividad\ReservaActividadesController@create');
Route::resource('reserva_actividades','ReservaActividad\ReservaActividadesController', [
  'parameters' => ['reservaActividades'=>'reservaActividad']
]);
/* Proceso de reserva de habitaciones */
Route::get('/reserva_habitacion/reservar/{habitacion}', 'ReservaHabitacion\ReservaHabitacionesController@reservar');

Route::resource('reserva_habitaciones','ReservaHabitacion\ReservaHabitacionesController', [
  'parameters' => ['reservaHabitaciones'=>'reservaHabitacion']
]);

/**
 * 
 * USER ONLY
 * 
 */
Route::group(['middleware' => 'auth'], function(){
  Route::post('/pay', 'HomeController@pay');
  Route::post('/cart', 'HomeController@deleteFromCart');

  /* CRUD Cuentas de usuario*/
  Route::resources([
    'cuentas'      => 'CuentasController',
    'tipocuentas'  => 'TipoCuentasController',
    'banco'        => 'BancosController',
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
  Route::resources([
      'autos' => 'ReservaAuto\AutosController',
      'companias' => 'ReservaAuto\CompaniasController',
  ]);

  Route::get('reserva_autos/reservar/{auto}', 'ReservaAuto\ReservaAutosController@reservar');

  Route::resource('sucursales', 'ReservaAuto\SucursalesController', [
      'parameters' => ['sucursales' => 'sucursal']
  ]);

  /* CRUD Reservas Actividades */
  // Route::resource('actividades', 'ReservaActividad\ActividadesController', [
  //   'parameters' => ['actividades' => 'actividad']
  // ]);

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
      'PaqueteVueloAuto' => 'Paquetes\PaqueteVueloAutoController',
      'PaqueteVueloHotel' => 'Paquetes\PaqueteVueloHotelController'
  ]);
});

