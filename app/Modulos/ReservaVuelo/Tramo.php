<?php

namespace App\Modulos\ReservaVuelo;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

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

    return $diff;
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
              ? '$ '.number_format(random_int(10000, 150000), 0, ',', '.')
              : random_int(10000, 150000);
  }

  public function asientosDisponibles()
  {
    $ids = $this->reservaBoleto->pluck('id');

    AsientoAvion::where('tramo_id', '=', $this->id)->whereNotInt('id', $ids);

    return [];
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
   *
   *
   */
  public static function buscarVuelos($params)
  {
    // Validator::make($params, [
    //   'origen_id' => 'required|integer',
    //   'destino_id' => 'required|integer',
    //   'tipo_vuelo' => 'required|integer|between:0,1',
    //   'fecha_ida' => 'required|date',
    //   'fecha_vuelta' => 'required_if:tipo_vuelo,1|date',
    //   'pasajeros_adultos' => 'required|integer',
    //   'pasajeros_ninos' => 'required|integer',
    //   'tipo_pasaje' => 'required|integer|between:1,3'
    // ]);

  	$fechaPartida = Carbon::createFromFormat('d-m-Y', $params['fecha_ida']);

    $tramos = static::all();

    $vuelos = [];
    
    foreach ($tramos as $tramo) {
      $asientosDisponibles = $tramo->asientosDisponibles();
      if ($tramo->fecha_partida == $fechaPartida
          && $tramo->origen_id == $params['origen_id']
          && $tramo->destino_id == $params['destino_id']
          && count($asientosDisponibles) > 0) {
        $vuelos[] = new Vuelo([$tramo]);
      }
    }

    // dijkstra($tramos, $params);

  	return $vuelos;
  }
}
