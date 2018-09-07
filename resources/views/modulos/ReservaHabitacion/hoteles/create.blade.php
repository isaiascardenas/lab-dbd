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
				<input type="number" class="form-control" name="estrellas" id="estrellas" max ="5" min = "1">
			</div>
		</div>

		<div class="form-group row">
			<label class="col" for="nombre">descripcion</label>
			<div class="col">
				<input type="text" class="form-control" name="descripcion" id="descripcion">
			</div>
		</div>

		<div class="form-group row">
            <select id="ciudad" name="ciudad_id" class="form-control selectpicker" title="Ciudad" data-live-search="true">
                @foreach ($ciudades as $ciudad)
                    <option value="{{ $ciudad->id }}">
                    {{ $ciudad->nombre }}, {{$ciudad->pais->nombre }}
                    </option>
                @endforeach
            </select>
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
