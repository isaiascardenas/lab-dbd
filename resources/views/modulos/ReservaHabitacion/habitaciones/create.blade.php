@extends('layouts.admin')

@section('content')
	<h2>
    <i class="fas fa-map-marker-alt"></i> Nueva habitacion
  </h2>
	
	<hr>
	
	@include('layouts.messages')

	<form method="post" action="{{ action('ReservaHabitacion\HabitacionesController@store') }}">
		{{ csrf_field() }}
		
		<div class="form-group row">
			<label class="col" for="nombre">Capacidad niño</label>
			<div class="col">
				<input type="number" class="form-control" name="capacidad_nino" id="capacidad_nino">
			</div>
		</div>

		<div class="form-group row">
			<label class="col" for="nombre">Capacidad adulto</label>
			<div class="col">
				<input type="number" class="form-control" name="capacidad_adulto" id="capacidad_adulto">
			</div>
		</div>

		<div class="form-group row">
			<label class="col" for="nombre">Precio por noche</label>
			<div class="col">
				<input type="number" class="form-control" name="precio_por_noche" id="precio_por_noche">
			</div>
		</div>

		<div class="form-group row">
			<label class="col" for="nombre">descripcion</label>
			<div class="col">
				<input type="text" class="form-control" name="descripcion" id="descripcion">
			</div>
		</div>

		<div class="form-group row">
      <label class="col" for="nombre">Hotel</label>
      <div class="col">
          <select id="hotel" name="hotel_id" class="form-control selectpicker" title="hotel" data-live-search="true">
              @foreach ($hoteles as $hotel)
                  <option value="{{ $hotel->id }}">
                  {{ $hotel->nombre }}
                  </option>
              @endforeach
          </select>
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
