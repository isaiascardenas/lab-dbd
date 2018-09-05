@extends('layouts.admin')

@section('content')
	<h2>
    <i class="fas fa-map-marker-alt"></i> Nuevo Tipo de Asiento
  </h2>
	
	<hr>
	
	@include('layouts.messages')

	<form method="post" action="{{ action('ReservaVuelo\TipoAsientosController@store') }}">
		{{ csrf_field() }}
		
		<div class="form-group row">
			<label class="col-3" for="descripcion">Descripción</label>
			<div class="col-9">
				<input type="text" class="form-control" name="descripcion" id="descripcion">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-3" for="factor_costo">Factor Costo</label>
			<div class="col-9">
				<input class="form-control" name="factor_costo" id="factor_costo" value="1.0">
			</div>
		</div>

		<div class="text-right">
			<a href="/tipo-asientos/" class="btn btn-info">
        <i class="fas fa-ban"></i> Cancelar
      </a>
			<button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Guardar
      </button>
		</div>
	</form>
@endsection
