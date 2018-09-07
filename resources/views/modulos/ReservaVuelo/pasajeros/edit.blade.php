@extends('layouts.admin')

@section('content')
	<h2>
    <i class="fas fa-user"></i> Editar Pasajero #{{ $pasajero->id }}
  </h2>
	
	<hr>
	
	@include('layouts.messages')

	<form method="post" action="{{ action('ReservaVuelo\PasajerosController@update', $pasajero->id) }}">
		{{ csrf_field() }}
    <input name="_method" type="hidden" value="PATCH">

		<div class="form-group row">
			<label class="col-3" for="nombre">Nombre</label>
			<div class="col-9">
				<input type="text" class="form-control" name="nombre" id="nombre" value="{{ $pasajero->nombre }}">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-3" for="rut">Rut</label>
			<div class="col-9">
				<input type="text" class="form-control" name="rut" id="rut" value="{{ $pasajero->rut }}">
			</div>
		</div>

		<div class="text-right">
			<a href="/pasajeros/{{ $pasajero->id }}" class="btn btn-info">
        <i class="fas fa-ban"></i> Cancelar
      </a>
			<button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Actualizar
      </button>
		</div>
	</form>
@endsection