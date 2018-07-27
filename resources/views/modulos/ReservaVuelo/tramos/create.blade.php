@extends('layouts.admin')

@section('content')
	<h2><i class="fas fa-map-marker-alt"></i> Nuevo Tramo</h2>
	
	<hr>
	
	@include('layouts.messages')

	<form method="post" action="/tramos/" method="post">
		{{ csrf_field() }}
		
		<div class="form-group row">
			<label class="col-3" for="codigo">Código</label>
			<div class="col-9">
				<input type="text" class="form-control" name="codigo" id="codigo">
			</div>
		</div>

		<div id="fechas_vuelo">
			<div class="form-group row">
				<label class="col-3" for="fecha_partida">Fecha Partida</label>
				<div class="col-9">
					<input type="text" class="form-control" name="fecha_partida" id="fecha_partida">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-3" for="fecha_llegada">Fecha Llegada</label>
				<div class="col-9">
					<input type="text" class="form-control" name="fecha_llegada" id="fecha_llegada">
				</div>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-3" for="aerolinea_id">Aerol&iacute;nea</label>
			<div class="col-9">
				<select class="form-control" name="aerolinea_id" id="aerolinea_id">
					<option>Seleccione Aerol&iacute;nea</option>
					@foreach($aerolineas as $aerolinea)
					<option value="{{ $aerolinea->id }}">{{ $aerolinea->nombre }}</option>
					@endforeach
				</select>
			</div>
		</div>
				
		<div class="form-group row">
			<label class="col-3" for="avion_id">Avi&oacute;n</label>
			<div class="col-9">
				<select class="form-control selectpicker" name="avion_id" id="avion_id">
					<option>Seleccione Avi&oacute;n</option>
					@foreach($aviones as $avion)
					<option value="{{ $avion->id }}" data-aerolinea-id="{{ $avion->aerolinea->id }}">{{ $avion->modelo }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-3" for="origen_id">Aeropuerto Origen</label>
			<div class="col-9">
				<select class="form-control selectpicker" name="origen_id" id="origen_id">
					<option>Seleccione Aeropuerto Origen</option>
					@foreach($aeropuertos as $aeropuerto)
					<option value="{{ $aeropuerto->id }}">{{ $aeropuerto->nombre }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-3" for="destino_id">Aeropuerto Destino</label>
			<div class="col-9">
				<select class="form-control selectpicker" name="destino_id" id="destino_id">
					<option>Seleccione Aeropuerto Destino</option>
					@foreach($aeropuertos as $aeropuerto)
					<option value="{{ $aeropuerto->id }}">{{ $aeropuerto->nombre }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="text-right">
			<a href="/tramos/" class="btn btn-info"><i class="fas fa-ban"></i> Cancelar</a>
			<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
		</div>
	</form>
@endsection

@section('script')
<script>
	$('select.selectpicker').selectpicker({
    	noneSelectedText: 'No se ha seleccionado nada',
    	noneResultsText: 'Ningún resultado coincide con {0}',
		selectOnTab: true
    });

    $('#fechas_vuelo').datepicker({
    	autoclose: true,
    	clearBtn: true,
    	endDate: '',
    	format: 'dd-mm-yyyy',
    	inputs: $('.datepicker'),
    	todayHighlight: true
    });
</script>
@endsection
