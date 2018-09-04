@extends('layouts.admin')

@section('content')
	<h2>
    <i class="fas fa-map-marker-alt"></i> Nuevo hotel
  </h2>
	
	<hr>
	
	@include('layouts.messages')

	<form method="post" action="{{ action('ReservaHabitacion\HotelesController@store') }}">
		{{ csrf_field() }}
		
		<div class="form-group row">
			<label class="col" for="nombre">Nombre</label>
			<div class="col">
				<input type="text" class="form-control" name="nombre" id="nombre">
			</div>
		</div>

		<div class="form-group row">
			<label class="col" for="nombre">estrellas</label>
			<div class="col">
				<input type="number" class="form-control" name="estrellas" id="estrellas">
			</div>
		</div>

		<div class="form-group row">
			<label class="col" for="nombre">descripcion</label>
			<div class="col">
				<input type="text" class="form-control" name="descripcion" id="descripcion">
			</div>
		</div>

		<div class="form-group row">
			<label class="col" for="nombre">ciudad</label>
			<div class="col">
				<input type="number" class="form-control" name="ciudad_id" id="ciudad ">
			</div>
		</div>

		<div class="text-right">

			<a href="/hoteles/" class="btn btn-info float-left">
          <i class="fas fa-arrow-left"></i> Volver
        </a>
			<a href="/hoteles/" class="btn btn-info">
        <i class="fas fa-ban"></i> Cancelar
      </a>
			<button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Guardar
      </button>
		</div>
	</form>
@endsection
