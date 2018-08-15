<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Tramo extends Model
{
    
  public function horarioPartida()
	{
		return Carbon::createFromFormat('Y-m-d H:i:s', $this->fecha_partida)->format('d-m-Y H:i');
	}

	public function horarioLlegada()
	{
		return Carbon::createFromFormat('Y-m-d H:i:s', $this->fecha_llegada)->format('d-m-Y H:i');
	}

	public function horaPartida()
	{
		return Carbon::createFromFormat('Y-m-d H:i:s', $this->fecha_partida)->format('H:i');
	}

	public function horaLlegada()
	{
		return Carbon::createFromFormat('Y-m-d H:i:s', $this->fecha_llegada)->format('H:i');
	}

	public function duracion()
  {
  	$fechaPartida = Carbon::createFromFormat('Y-m-d H:i:s', $this->fecha_partida);
  	$fechaLlegada = Carbon::createFromFormat('Y-m-d H:i:s', $this->fecha_llegada);

  	$diff = '';

  	$diff .= $fechaLlegada->diffInHours($fechaPartida);
  	$diff .= 'h';
  	$diff .= ' ';
  	$diff .= $fechaLlegada->diffInMinutes($fechaPartida);
  	$diff .= 'm';

  	return $diff;
  }

  public function tiempoEscala(Tramo $tramo)
  {
    $fechaLlegada = Carbon::createFromFormat('Y-m-d H:i:s', $this->fecha_llegada);
    $fechaPartida = Carbon::createFromFormat('Y-m-d H:i:s', $tramo->fecha_partida);

    $diff = '';

    $diff .= $fechaPartida->diffInHours($fechaLlegada);
    $diff .= 'h';
    $diff .= ' ';
    $diff .= $fechaPartida->diffInMinutes($fechaLlegada);
    $diff .= 'm';

    echo $diff;
    return $diff;

  }

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

  public function asientos()
  {
  	return $this->avion->asientos();
  }

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

  public function escalas()
  {
    return random_int(0, 3);
  }

  public function precio($formato = FALSE)
  {
    return $formato ? 
              '$ '.number_format(random_int(10000, 150000), 0, ',', '.')
              : random_int(10000, 150000);
  }

  /* Temporal -  */
  // Retorna array de instancias de clase \App\Modulos\ReservaVuelo\Vuelo
  public static function buscarVuelos($params)
  {

  	$fechaIda = Carbon::createFromFormat('d-m-Y', $params['fecha_ida']);

  	$query = static::where('origen_id', '=', $params['origen_id'])				// origen
  				->where('destino_id', '=', $params['destino_id']);			// destino
  				// ->whereDate('fecha_partida', $fechaIda->format('Y-m-d'));

  	// if ($fechaVuelta = Carbon::createFromFormat('d-m-Y', $params['fecha_vuelta'])) {
  	// 	$query->whereDate('fecha_llegada', $fechaVuelta->format('Y-m-d'));
  	// }

  	// Capacidad
  	// $query->join('reserva_asientos', 'reserva_asientos.id_tramo', '=', 'tramos.id');
  	// $query->where();
  	
  	// Asiento
  	

  	// Tipo Asiento
  	// $query->where('');

  	return $query->get();
  }
}
