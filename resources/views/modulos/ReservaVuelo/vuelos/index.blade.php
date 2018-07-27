@extends('layouts.app')

@section('content')
	<h2><i class="fas fa-plane"></i> Selecciona tu vuelo</h2>

	<div id="list-accordion">
		@foreach($data["vuelos"] as $vuelo)
		<div class="card">
			<a class="card-header" data-toggle="collapse" href="#vuelo-{{ $vuelo->id }}" style="font-size: 30px;">
				<div class="row text-center">
					<div class="col-5">
						<span class="font-weight-bold">{{ $vuelo->horaPartida() }}</span>
						<span class="text-muted">{{ "(" . $vuelo->origen->codigo . ") " . $vuelo->origen->nombre }}</span>
						<i class="fas fa-angle-right"></i>
						<span class="font-weight-bold">{{ $vuelo->horaLlegada() }}</span>
						<span class="text-muted">{{ "(" . $vuelo->destino->codigo . ") " . $vuelo->destino->nombre }}</span>
					</div>

					<div class="col-2 text-muted">
						{{ $vuelo->duracion() }}
					</div>

					<div class="col-2 text-muted">
						{{ "--ESCALAS--" }}
					</div>
					
					<div class="col-3 font-weight-bold">
						"-- PRECIO --"
					</div>
				</div>
			</a>
			
			<div class="collapse" id="vuelo-{{ $vuelo->id }}" data-parent="#list-accordion">
				<div class="card-body">
					<h5 class="card-title">{{ $vuelo->codigo }}</h5>
					<h6 class="card-subtitle mb-2 text-muted">{{ $vuelo->avion->aerolinea->nombre }}</h6>
					<div class="text-right">
						<form action="/vuelo/details/" method="post">
							<input type="hidden" name="tramo[]" value="{{ "id_tramo_1" }}">
							<input type="hidden" name="tramo[]" value="{{ "id_tramo_2" }}">
							<button type="submit" class="btn btn-primary">Continuar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
@endsection