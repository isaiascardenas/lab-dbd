@extends('layouts.admin')

@section('content')
	<h2><i class="fas fa-map-marker-alt"></i> Aerol&iacute;nea #{{ $aerolinea->id }}</h2>
	
	<hr>

	<div class="form-group row">
		<label class="col-3" for="nombre">Nombre</label>
		<div class="col-9">{{ $aerolinea->nombre }}</div>
	</div>
	
	<div class="text-right">
		<a href="{{ url()->previous() }}" class="btn btn-info float-left"><i class="fas fa-arrow-left"></i> Volver</a>

		<a href="/aerolineas/{{ $aerolinea->id }}/edit" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a>
		<form action="{{ action('ReservaVuelo\AerolineasController@destroy', $aerolinea->id) }}" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="DELETE">
			<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</button>
		</form>
	</div>
@endsection