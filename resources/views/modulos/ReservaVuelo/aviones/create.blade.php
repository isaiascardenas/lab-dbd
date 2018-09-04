@extends('layouts.admin')

@section('content')
	<h2>
    <i class="fas fa-map-marker-alt"></i> Nuevo Avión
  </h2>
	
	<hr>
	
	@include('layouts.messages')

	<form method="post" action="{{ action('ReservaVuelo\AvionesController@store') }}">
		{{ csrf_field() }}
		
		<div class="form-group row">
			<label class="col-3" for="descripcion">Descripción</label>
			<div class="col-9">
				<input type="text" class="form-control" name="descripcion" id="descripcion">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-3" for="aerolinea_id">Aerolínea</label>
			<div class="col-9">
				<select class="form-control" name="aerolinea_id" id="aerolinea_id">
					@foreach($aerolineas as $aerolinea)
					<option value="{{ $aerolinea->id }}">{{ $aerolinea->nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="text-right">
			<a href="/aviones/" class="btn btn-info">
        <i class="fas fa-ban"></i> Cancelar
      </a>
			<button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Guardar
      </button>
		</div>
	</form>
@endsection
