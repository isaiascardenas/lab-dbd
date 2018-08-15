@extends('layouts.admin')

@section('content')
	<h2>
    <i class="fas fa-map-marker-alt"></i> Editar Avión #{{ $avion->id }}
  </h2>
	
	<hr>
	
	@include('layouts.messages')

	<form method="post" action="{{ action('ReservaVuelo\AvionesController@update', $avion->id) }}" method="post">
		{{ csrf_field() }}
    <input name="_method" type="hidden" value="PATCH">

		<div class="form-group row">
			<label class="col-3" for="modelo">Modelo</label>
			<div class="col-9">
				<input type="text" class="form-control" name="modelo" id="modelo" value="{{ $avion->modelo }}">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-3" for="aerolinea_id">Aerolínea</label>
			<div class="col-9">
				<select class="form-control" name="aerolinea_id" id="aerolinea_id">
					@foreach($aerolineas as $aerolinea)
					<option value="{{ $aerolinea->id }}" {{ $avion->aerolinea->id == $aerolinea->id?'selected':'' }}>{{ $aerolinea->nombre }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="text-right">
			<a href="/aviones/{{ $avion->id }}" class="btn btn-info">
        <i class="fas fa-ban"></i> Cancelar
      </a>
			<button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Actualizar
      </button>
		</div>
	</form>
@endsection