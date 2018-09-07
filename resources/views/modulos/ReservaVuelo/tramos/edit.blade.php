@extends('layouts.admin')

@section('content')
	<h2><i class="fas fa-map-marker-alt"></i> Editar Tramo #{{ $tramo->id }}</h2>
	
	<hr>
	
	@include('layouts.messages')

	<form method="post" action="{{ action('ReservaVuelo\TramosController@update', $tramo->id) }}">
		{{ csrf_field() }}
    <input name="_method" type="hidden" value="PATCH">

		<div class="form-group row">
			<label class="col-3" for="codigo">Código</label>
			<div class="col-9">
				<input type="text" class="form-control" name="codigo" id="codigo" value="{{ $tramo->codigo }}">
			</div>
		</div>

    <div class="form-group row">
      <label class="col-3" for="avion_id">Avión</label>
      <div class="col-9">
        <select class="form-control selectpicker" name="avion_id" id="avion_id" title="Seleccione Avión (Aerolínea)" data-live-search="true">
          @foreach($aviones as $avion)
          <option value="{{ $avion->id }}" {{ $tramo->avion->id == $avion->id?'selected':'' }}>
            {{ $avion->descripcion .' ('. $avion->aerolinea->nombre .')' }}
          </option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-group form-row align-items-end fechas-vuelo">
  		<div class="col">
  			<label for="fecha_partida">Fecha Partida</label>
  			<div class="input-group">
          <input type="text" id="fecha_partida" name="fecha_partida" class="form-control text-center datepicker" readonly="readonly" value="{{ $tramo->fecha_partida }}">
          <span class="input-group-append">
              <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
          </span>
        </div>
  		</div>

      <div class="col-1 text-center">
        <i class="fas fa-arrow-right fa-2x vuelo-vuelta"></i>
      </div>

      <div class="col">
          <label for="fecha_llegada" class="vuelo-vuelta">Fecha Llegada</label>
          <div class="input-group">
              <input type="text" id="fecha_llegada" name="fecha_llegada" class="form-control text-center datepicker vuelo-vuelta" readonly="readonly" value="{{ $tramo->fecha_llegada }}">
              <span class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
              </span>
          </div>
      </div>
    </div>

    <div class="form-group form-row align-items-end">
		  <div class="col">
  			<label for="origen_id">Aeropuerto Origen</label>
  			<div class="input-group">
  				<select class="form-control selectpicker" name="origen_id" id="origen_id" title="Aeropuerto de Origen" data-live-search="true">
  					@foreach($aeropuertos as $aeropuerto)
  					<option value="{{ $aeropuerto->id }}" {{ $aeropuerto->id == $tramo->origen->id?'selected':'' }}>
              {{ '('. $aeropuerto->ciudad->pais->nombre .', '.$aeropuerto->ciudad->nombre.') ' . $aeropuerto->nombre }}
            </option>
  					@endforeach
  				</select>
  			</div>
  		</div>

      <div class="col-1 text-center">
        <i class="fas fa-arrow-right fa-2x"></i>
      </div>

  		<div class="col">
  			<label for="destino_id">Aeropuerto Destino</label>
  			<div class="input-group">
  				<select class="form-control selectpicker" name="destino_id" id="destino_id" title="Aeropuerto de Destino" data-live-search="true">
  					@foreach($aeropuertos as $aeropuerto)
  					<option value="{{ $aeropuerto->id }}" {{ $aeropuerto->id == $tramo->destino->id?'selected':'' }}>
              {{ '('. $aeropuerto->ciudad->pais->nombre .', '.$aeropuerto->ciudad->nombre.') ' . $aeropuerto->nombre }}
            </option>
  					@endforeach
  				</select>
  			</div>
  		</div>
    </div>

		<div class="text-right">
			<a href="/tramos/{{ $tramo->id }}" class="btn btn-info">
        <i class="fas fa-ban"></i> Cancelar
      </a>
			
      <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Actualizar
      </button>
		</div>
	</form>
@endsection