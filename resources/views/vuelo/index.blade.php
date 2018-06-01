@extends('layouts.app')

@section('content')
	<h1>Reserva tu vuelo</h1>
	<form action="/vuelo/list" method="post">
		<div class="form-group form-row">
			<div class="col">
				<label for="id_origen">Origen</label>
				<select id="id_origen" name="id_origen" class="form-control" placeholder="Origen">
					@foreach ($ciudades as $ciudad)
					<option value="{{ $ciudad["id"] }}">{{ $ciudad["pais"] . ", " . $ciudad["nombre"] }}</option>
					@endforeach
				</select>
			</div>
			<div class="col">
				<label for="id_destino">Destino</label>
				<select id="id_destino" name="id_destino" class="form-control" placeholder="Destino">
					@foreach ($ciudades as $ciudad)
					<option value="{{ $ciudad["id"] }}">{{ $ciudad["pais"] . ", " . $ciudad["nombre"] }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group form-row">
			<div class="form-check form-check-inline">
				<input type="radio" class="form-check-input">
				<label for="" class="form-check-label">Ida y vuelta</label>
			</div>
			<div class="form-check form-check-inline">
				<input type="radio" class="form-check-input">
				<label for="" class="form-check-label">Solo ida</label>
			</div>
		</div>
		<div class="form-group form-row">
			<div class="col">
				<label for="">Fecha Ida</label>
				<input type="text" class="form-control gijgo-datepicker">
			</div>
			<div class="col">
				<label for="">Fecha Vuelta</label>
				<input type="text" class="form-control gijgo-datepicker">
			</div>
		</div>
		<div class="form-group form-row">
			<div class="col">
				<label for="">Pasajeros</label>
				<input type="text" class="form-control">
			</div>
			<div class="col">
				<label for="">Tipo Pasaje</label>
				<select name="tipo_pasaje" class="form-control">
					<option value="1">Economico</option>
					<option value="2">Turista</option>
					<option value="3">Ejecutivo</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-lg btn-block">Buscar tu vuelo</button>
		</div>
	</form>
@endsection

@section('script')
	<script>
		$(".gijgo-datepicker").datepicker({
			uiLibrary: 'bootstrap4'
		});
	</script>
@endsection
