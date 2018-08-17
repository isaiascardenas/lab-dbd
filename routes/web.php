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

Route::resource('users', 'UserController')->except(['create', 'edit']);

/**
 * Reservas de actividades
 */
Route::resources([
	'actividades'			=> 'ReservaActividad\ActividadesController',
	'reservaactividades'	=> 'ReservaActividad\ReservaActividadesController'
]);



/**
 * Reservas de hoteles
 */
Route::resources([
    'hoteles' => 'ReservaHabitacion\HotelesController',
    'habitaciones' => 'ReservaHabitacion\HabitacionesController',
    'Reserva_habitaciones' => 'ReservaHabitacion\ReservaHabitacionesController',
    
]);
/*
Route::get('hoteles','ReservaHabitacion\HotelesController@index');
Route::get('hoteles/{id}','ReservaHabitacion\HotelesController@show');
Route::put('hoteles/{id}','ReservaHabitacion\HotelesController@update');
Route::delete('hoteles/{id}','ReservaHabitacion\HotelesController@destroy');
Route::post('hoteles','ReservaHabitacion\HotelesController@store');
*/

/**
 * Paquetes
 */
Route::resources([
    'PaqueteVueloAuto' => 'Paquetes\PaqueteVueloAutoController',
    'PaqueteVueloHotel' => 'Paquetes\PaqueteVueloHotelController'
]);





/**
 * Reservas de autos
 */
Route::resources([
    'autos' => 'ReservaAuto\AutosController',
    'companias' => 'ReservaAuto\AutosController',
    'sucursales' => 'ReservaAuto\AutosController',
    // 'reserva', 'ReservaAuto\AutosController',
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
  'tramos'          => 'ReservaVuelo\TramosController',
]);


/* CRUD Cuentas de usuario*/
Route::resources([
  'cuentas'      => 'CuentasController',
  'tipocuentas'  => 'TipoCuentasController',
  'banco'        => 'BancosController',
]);


// Route::get('/aerolineas/',         'AerolineasController@index');
// Route::get('/aerolineas/create',         'AerolineasController@index');













