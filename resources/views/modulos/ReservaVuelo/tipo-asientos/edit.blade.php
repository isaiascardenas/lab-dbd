@extends('layouts.admin')

@section('content')
	<h2>
    <i class="fas fa-map-marker-alt"></i> Editar Tipo de Asiento #{{ $tipoAsiento->id }}
  </h2>
	
	<hr>
	
	@include('layouts.messages')

	<form method="post" action="{{ action('ReservaVuelo\TipoAsientosController@update', $tipoAsiento->id) }}">
		{{ csrf_field() }}
    <input name="_method" type="hidden" value="PATCH">

		<div class="form-group row">
			<label class="col-3" for="descripcion">Descripción</label>
			<div class="col-9">
				<input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ $tipoAsiento->descripcion }}">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-3" for="factor_costo">Factor Costo</label>
			<div class="col-9">
				<input type="text" class="form-control" name="factor_costo" id="factor_costo" value="{{ $tipoAsiento->factor_costo }}">
			</div>
		</div>

		<div class="text-right">
			<a href="/tipo-asientos/{{ $tipoAsiento->id }}" class="btn btn-info">
        <i class="fas fa-ban"></i> Cancelar
      </a>
			<button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Actualizar
      </button>
		</div>
	</form>
@endsection