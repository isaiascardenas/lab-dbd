@extends('layouts.admin')

@section('content')
	<h2><i class="fas fa-map-marker-alt"></i> Editar Aerol&iacute;nea #{{ $aerolinea->id }}</h2>
	
	<hr>
	
	@include('layouts.messages')

	<form method="post" action="{{ action('ReservaVuelo\AerolineasController@update', $aerolinea->id) }}" method="post">
		{{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">

		<div class="form-group row">
			<label class="col-3" for="nombre">Nombre</label>
			<div class="col-9">
				<input type="text" class="form-control" name="nombre" id="nombre" value="{{ $aerolinea->nombre }}">
			</div>
		</div>

		<div class="text-right">
			<a href="{{ url()->previous() }}" class="btn btn-info"><i class="fas fa-ban"></i> Cancelar</a>
			<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
		</div>
	</form>
@endsection