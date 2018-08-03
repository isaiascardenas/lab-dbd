@extends('layouts.admin')

@section('content')
	<h2><i class="fas fa-map-marker-alt"></i> Editar Tramo #{{ $tramo->id }}</h2>
	
	<hr>
	
	@include('layouts.messages')

	<form method="post" action="{{ action('ReservaVuelo\TramosController@update', $tramo->id) }}" method="post">
		{{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">

		<div class="form-group row">
			<label class="col-3" for="codigo">Código</label>
			<div class="col-9">
				<input type="text" class="form-control" name="codigo" id="codigo" value="{{ $tramo->codigo }}">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-3" for="fecha_partida">Fecha Partida</label>
			<div class="col-9">
				<input type="text" class="form-control" name="fecha_partida" id="fecha_partida" value="{{ $tramo->fecha_partida }}">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-3" for="fecha_llegada">Fecha Llegada</label>
			<div class="col-9">
				<input type="text" class="form-control" name="fecha_llegada" id="fecha_llegada" value="{{ $tramo->fecha_llegada }}">
			</div>
		</div>
	
		<div class="form-group row">
			<label class="col-3" for="aerolinea_id">Aerol&iacute;nea</label>
			<div class="col-9">
				<select class="form-control" name="aerolinea_id" id="aerolinea_id">
					<option>Seleccione Aerol&iacute;nea</option>
					@foreach($aerolineas as $aerolinea)
					<option value="{{ $aerolinea->id }}" {{ $aerolinea->id == $tramo->avion->aerolinea->id?'selected':'' }}>{{ $aerolinea->nombre }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-3" for="avion_id">Avi&oacute;n</label>
			<div class="col-9">
				<select class="form-control" name="avion_id" id="avion_id">
					@foreach($aviones as $avion)
					<option value="{{ $avion->id }}" {{ $avion->id == $tramo->avion_id?'selected':'' }}>{{ $avion->modelo }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-3" for="origen_id">Aeropuerto Origen</label>
			<div class="col-9">
				<select class="form-control" name="origen_id" id="origen_id">
					@foreach($aeropuertos as $aeropuerto)
					<option value="{{ $aeropuerto->id }}" {{ $aeropuerto->id == $tramo->origen->id?'selected':'' }}>{{ $aeropuerto->nombre }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-3" for="destino_id">Aeropuerto Destino</label>
			<div class="col-9">
				<select class="form-control" name="destino_id" id="destino_id">
					@foreach($aeropuertos as $aeropuerto)
					<option value="{{ $aeropuerto->id }}" {{ $aeropuerto->id == $tramo->destino->id?'selected':'' }}>{{ $aeropuerto->nombre }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="text-right">
			<a href="{{ url()->previous() }}" class="btn btn-info"><i class="fas fa-ban"></i> Cancelar</a>
			<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
		</div>
	</form>

	<script>
		$(function(){

		});
	</script>
@endsection