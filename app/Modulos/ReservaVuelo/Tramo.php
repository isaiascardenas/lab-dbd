<?php

namespace App\Modulos\ReservaVuelo;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tramo extends Model
{
  protected $table = 'tramos';

  protected $fillable = [
    'codigo',
    'fecha_partida',
    'fecha_llegada',
    'avion_id',
    'origen_id',
    'destino_id'
  ];

  /* Relaciones */

  public function origen()
  {
    return $this->belongsTo(Aeropuerto::class);
  }

  public function destino()
  {
    return $this->belongsTo(Aeropuerto::class);
  }

  public function avion()
  {
    return $this->belongsTo(Avion::class);
  }

  public function reservaBoleto()
  {
    return $this->hasMany(ReservaBoleto::class);
  }

  public function asientos()
  {
   return $this->avion->asientos();
  }

  /* Atributos en fomato 'humano' */

  public function horarioPartida()
	{
		return Carbon::parse($this->fecha_partida)->format('d-m-Y H:i');
	}

	public function horarioLlegada()
	{
		return Carbon::parse($this->fecha_llegada)->format('d-m-Y H:i');
	}

	public function horaPartida()
	{
		return Carbon::parse($this->fecha_partida)->format('H:i');
	}

	public function horaLlegada()
	{
		return Carbon::parse($this->fecha_llegada)->format('H:i');
	}

	public function duracion()
  {
  	$fechaPartida = Carbon::parse($this->fecha_partida);
  	$fechaLlegada = Carbon::parse($this->fecha_llegada);

  	return $fechaLlegada->diff($fechaPartida)->format('%Hh %im');
  }

  /* Funcionalidades */
  public function printPlane()
  {
  	$plane = '';

  	$plane .= '<table class="table table-bordered">';
  	$plane .= '	<tbody>';
  	
  	$asientos = $this->asientos;
  	$a = 0;
  	for ($i=0; $i < 5; $i++) {
  		$plane .= '<tr>';
  		for ($j=0; $j < 4; $j++) { 
  			$asiento = $asientos[$a++];
  		
    		$bg = $asiento->disponible($this->id) ? '' : 'bg-info';

    		$plane .= '<td class="'.$bg.'">'.$asiento->codigo_asiento.'</td>';
    	}
    	$plane .= '</tr>';
  	}
  	
  	$plane .= '	</tbody>';
  	$plane .= '</table>';

  	return $plane;
  }

  public function precio($formato = FALSE)
  {
    return $formato
              ? '$ '.number_format($this->costo, 0, ',', '.')
              : $this->costo;
  }

  public function asientosDisponibles()
  {
    $totales = $this->asientos->pluck('id')->toArray();
    $reservados = $this->reservaBoleto->pluck('id')->toArray();

    return array_diff($totales, $reservados);
  }

  private static function buscarConEscala($tramoOrigen, $params)
  {
    /* array de Vuelo's */
    $escalas = [];

    return $escalas;
  }

  /* Temporal -  */
  // Retorna array de instancias de clase \App\Modulos\ReservaVuelo\Vuelo
  /**
   * 
   * $params = [
   *    'origen_id',        # aeropuerto de origen
   *    'destino_id',       # aeropuerto de destino
   *    'tipo_vuelo',       # 
   *    'fecha_ida',        # fecha de ida
   *    'fecha_vuelta',     # fecha de retorno
   *    'pasajeros_adultos',# 
   *    'pasajeros_ninos',  # 
   *    'tipo_pasaje',      #
   * ];
   */
  public static function buscarVuelos($params)
  {

  	$fechaPartida = Carbon::createFromFormat('d-m-Y', $params['fecha_ida']);

    $tramos = static::where('origen_id', '=', $params['origen_id'])
                      ->whereDate('fecha_partida', '=', $fechaPartida->format('Y-m-d'))
                      ->get();

    $vuelos = [];
    
    $pasajeros = intval($params['pasajeros_adultos']) + intval($params['pasajeros_ninos']);

    foreach ($tramos as $tramo) {
      if ($tramo->destino_id == $params['destino_id']) {
        $asientosDisponibles = $tramo->asientosDisponibles();

        if (count($asientosDisponibles) > $pasajeros) {
          $vuelos[] = new Vuelo([$tramo->id]);
        }
      }
      else {
        $conEscalas = static::buscarConEscala($tramo, $params);

        $vuelos = array_merge($vuelos, $conEscalas);
      }
    }

  	return $vuelos;
  }
}
