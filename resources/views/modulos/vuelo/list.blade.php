@extends('layouts.app')

@section('content')
	<h2><i class="fas fa-plane"></i> Selecciona tu vuelo</h2>

	<div id="list-accordion">
		@foreach($data["vuelos"] as $vuelo)
		<div class="card">
			<a class="card-header" data-toggle="collapse" href="#vuelo-{{ $vuelo["id"] }}" style="font-size: 30px;">
				<div class="row text-center">
					<div class="col-5">
						<span class="font-weight-bold">{{ $vuelo["hora_partida"] }}</span>
						<span class="text-muted">{{ $vuelo["aeropuerto_origen"] }}</span>
						<i class="fas fa-angle-right"></i>
						<span class="font-weight-bold">{{ $vuelo["hora_llegada"] }}</span>
						<span class="text-muted">{{ $vuelo["aeropuerto_destino"] }}</span>
					</div>

					<div class="col-2 text-muted">
						{{ $vuelo["duracion"] }}
					</div>

					<div class="col-2 text-muted">
						{{ $vuelo["escalas"] }}
					</div>
					
					<div class="col-3 font-weight-bold">
						{{ $vuelo["precio"] }}
					</div>
				</div>
			</a>
			
			<div class="collapse" id="vuelo-{{ $vuelo["id"] }}" data-parent="#list-accordion">
				<div class="card-body">
					<h5 class="card-title">{{ $vuelo["codigo"] }}</h5>
					<h6 class="card-subtitle mb-2 text-muted">{{ $vuelo["aerolinea"] }}</h6>
					<div class="text-right">
						<a href="/vuelo/show/{{ $vuelo["id"] }}" class="btn btn-primary">Continuar</a>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
@endsection