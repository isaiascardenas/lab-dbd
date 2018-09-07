@extends('layouts.admin')

@section('content')
	<h2>
    <i class="fas fa-map-marker-alt"></i> Nuevo Aeropuerto
  </h2>
	
	<hr>
	
	@include('layouts.messages')

	<form method="post" action="{{ action('ReservaVuelo\AeropuertosController@store') }}">
		{{ csrf_field() }}
		
		<div class="form-group row">
			<label class="col-3" for="codigo">C&oacute;digo</label>
			<div class="col-9">
				<input type="text" class="form-control" name="codigo" id="codigo">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-3" for="nombre">Nombre</label>
			<div class="col-9">
				<input type="text" class="form-control" name="nombre" id="nombre">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-3" for="direccion">Direcci&oacute;n</label>
			<div class="col-9">
				<input type="text" class="form-control" name="direccion" id="direccion">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-3" for="ciudad_id">Ciudad</label>
			<div class="col-9">
				<select class="form-control" name="ciudad_id" id="ciudad_id">
					@foreach($ciudades as $ciudad)
					<option value="{{ $ciudad->id }}">{{ $ciudad->nombre .', '. $ciudad->pais->nombre }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="text-right">
			<a href="/aeropuertos/" class="btn btn-info">
        <i class="fas fa-ban"></i> Cancelar
      </a>
			<button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Guardar
      </button>
		</div>
	</form>
@endsection
