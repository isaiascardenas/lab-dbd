<?php

namespace App;

use App\User;
use App\Modulos\ReservaAuto\ReservaAuto;
use App\Modulos\Paquetes\PaqueteVueloAuto;
use App\Modulos\Paquetes\PaqueteVueloHotel;
use App\Modulos\ReservaTraslado\ReservaTraslado;
use App\Modulos\ReservaActividad\ReservaActividad;
use App\Modulos\ReservaHabitacion\ReservaHabitacion;
use App\Modulos\ReservaVuelo\ReservaBoleto;

use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
  protected $table = 'orden_compras';

  protected $fillable = [
    'costo_total',
    'fecha_generado',
    'detalle',
    'user_id'
  ];

  /* Relaciones */

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function reservaTraslado()
  {
    return $this->hasMany(ReservaTraslado::class);
  }

  public function reservaAuto()
  {
    return $this->hasMany(ReservaAuto::class);
  }

  public function reservaActividad()
  {
    return $this->hasMany(ReservaActividad::class);
  }

  public function reservaHabitacion()
  {
    return $this->hasMany(ReservaHabitacion::class);
  }

  public function reservaBoleto()
  {
    return $this->hasMany(ReservaBoleto::class);
  }

  public function paqueteVueloHotel()
  {
    return $this->hasMany(PaqueteVueloHotel::class);
  }

  public function paqueteVueloAuto()
  {
    return $this->hasMany(PaqueteVueloAuto::class);
  }

  /* Funcionalidades */
  public function fechaGenerado()
  {
    return $this->created_at->format('H:i d-m-Y');
  }

  public function costoTotal($formato = FALSE)
  {
    return $formato
              ? '$ '.number_format($this->costo_total, 0, ',', '.')
              : $this->costo_total;
  }

  public function detalle()
  {
    $detalle = '';

    if (count($this->reservaTraslado)) {
      $detalle .= '<p class="card-text"><span class="badge badge-pill badge-info">Traslados</span><br>';
      foreach ($this->reservaTraslado as $reserva) {
        $detalle .= '('.$reserva->traslado->aeropuerto->codigo.') '.$reserva->traslado->aeropuerto->nombre;
        $detalle .= '<i class="fas fa-chevron-left"></i>';
        $detalle .= '<i class="fas fa-chevron-right"></i>';
        $detalle .= $reserva->traslado->hotel->nombre;
        $detalle .= '<span class="float-right">';
        $detalle .= $reserva->traslado->costo();
        $detalle .= '</span>';
      }
      $detalle .= '</p>';
    }

    if (count($this->reservaAuto)) {
      $detalle .= '<p class="card-text"><b>Autos</b><br>';
      foreach ($this->reservaAuto as $reserva) {
        $detalle .= '<p class="card-text"><span class="badge badge-pill badge-secondary">Auto</span>';
        $detalle .= '<br>';
        $detalle .= '<b>Patente</b> '.$reserva->auto->patente;
        $detalle .= '<br/>';
        $detalle .= '<b>Capacidad:</b> '.$reserva->auto->capacidad.' persona(s).';
        $detalle .= '<br/>';
        $detalle .= '<b>Período de Reserva:</b> '. $reserva->fechaInicio().' <i class="fas fa-chevron-right"></i> '.$reserva->fechaTermino();
        $detalle .= '</p>';
      }

      $detalle .= '</p>';
    }

    if (count($this->reservaActividad)) {
      $detalle .= '<p class="card-text"><span class="badge badge-pill badge-info">Actividad</span><br>';
      foreach ($this->reservaActividad as $reserva) {
        $detalle .= $reserva->actividad->titulo.
                     '<br>
                      <b>Ciudad:</b> '.$reserva->actividad->ciudad->nombre.'
                      <br>
                      <b>Período de Reserva:</b> '.$reserva->actividad->fechaInicio().' <i class="fas fa-chevron-right"></i> '. $reserva->actividad->fechaTermino().'
                      <br>
                      <b>Adultos:</b> '.$reserva->capacidad_adultos.'  <b>Niños: </b> '.$reserva->capacidad_ninos;
      }

      $detalle .= '</p>';
    }

    if (count($this->reservaHabitacion)) {
      $detalle .= '<p class="card-text"><span class="badge badge-pill badge-warning">Habitación</span><br>';
      foreach ($this->reservaHabitacion as $reserva) {
        $detalle .= '<b>Hotel:</b> '. $reserva->habitacion->hotel->nombre;
        $detalle .= '<br/>';
        $detalle .= '<b>Período de Reserva:</b> '. $reserva->fechaInicio().' <i class="fas fa-chevron-right"></i> '. $reserva->fechaTermino();
      }

      $detalle .= '</p>';
    }



    if (count($this->reservaBoleto)) {
      $detalle .= '<p class="card-text"><span class="badge badge-pill badge-dark">Vuelo</span><br>';
      foreach ($this->reservaBoleto as $reserva) {
        $detalle .= '<b>Codigo Vuelo</b>: '.$reserva->tramo->codigo;
        $detalle .= '<br/>';
        $detalle .= '<b>Partida:</b> '.$reserva->tramo->horarioPartida().' '.$reserva->tramo->origen->ciudad->nombre . ', ' . $reserva->tramo->origen->ciudad->pais->nombre;
        $detalle .= '<br/>';
        $detalle .= '<b>Llegada:</b> '.$reserva->tramo->horarioLlegada().' '.$reserva->tramo->destino->ciudad->nombre.', '.$reserva->tramo->destino->ciudad->pais->nombre;
        $detalle .= '<br/>';
        $detalle .= '<b>Pasajero:</b> '.$reserva->pasajero->nombre.' / '.$reserva->pasajero->rut;
        $detalle .= '<br/>';
      }

      $detalle .= '</p>';
    }

    if (count($this->paqueteVueloHotel)) {
      $detalle .= '<p class="card-text"><span class="badge badge-pill badge-light">Paquete Vuelo + Hotel</span><br>';

      foreach ($this->paqueteVueloHotel as $reserva) {
        $detalle .= '<p class="card-text">
                      <b>Vuelo</b><br>';

                      foreach($reserva->reservaBoletos as $reservacion){
                        $detalle .= $reservacion->tramo->HorarioPartida();
                        $detalle .= $reservacion->tramo->origen->ciudad->nombre;
                        $detalle .= ' <i class="fas fa-chevron-right"></i> ';
                        $detalle .= $reservacion->tramo->horarioLlegada();
                        $detalle .= $reservacion->tramo->destino->ciudad->nombre;
                        $detalle .= '<br>';
                      }

                      $detalle .= '</p>';
                      $detalle .= '<p class="card-text">';
                      $detalle .= '<b>Reserva Habitación</b>';
                      $detalle .= '<br>';
                      $detalle .= '<b>Hotel</b> '.$reserva->reservaHabitacion->habitacion->hotel->nombre;
                      $detalle .= '</p>';
      }

      $detalle .= '</p>';
    }

    if (count($this->paqueteVueloAuto)) {
        $detalle .= '<p class="card-text"><span class="badge badge-pill badge-dark">Paquete Vuelo + Auto</span><br>';

        foreach ($this->paqueteVueloAuto as $reserva) {
        
          $detalle .= '<p class="card-text">';
          $detalle .= '  <b>Vuelo(s)</b>';
          $detalle .= '  <br>';
          
          foreach($reserva->reservaBoletos as $reservacion){
            $detalle .= $reservacion->tramo->HorarioPartida();
            $detalle .= $reservacion->tramo->origen->ciudad->nombre;
            $detalle .= ' <i class="fas fa-chevron-right"></i> ';
            $detalle .= $reservacion->tramo->horarioLlegada();
            $detalle .= $reservacion->tramo->destino->ciudad->nombre;
            $detalle .= '<br>';
          }

          $detalle .= '</p>';
          $detalle .= '<p class="card-text">';
          $detalle .= '  <b>Reserva Automóvil</b>';
          $detalle .= '  <br>';
          $detalle .= '  <b>Compañia</b> '.$reserva->reservaAuto->auto->sucursal->compania->nombre;
          $detalle .= '</p>';
      }

      $detalle .= '</p>';
    }

    return $detalle;
  }
}
