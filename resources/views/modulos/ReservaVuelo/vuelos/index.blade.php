@extends('layouts.app')

@section('content')
	<h2><i class="fas fa-plane"></i> Selecciona tu vuelo</h2>

	<div id="list-accordion">
		@foreach($vuelos as $vuelo)
		<div class="card">
			<a class="card-header" data-toggle="collapse" href="#vuelo-{{ $vuelo->id }}">
				<div class="row text-left">
					<div class="col-7">
            <div class="row">
              <div class="col">
						    <span class="font-weight-bold">{{ $vuelo->horaPartida() }}</span>
						    <span class="text-muted">{{ "(" . $vuelo->origen->codigo . ") " . $vuelo->origen->nombre }}</span>
              </div>
						  <div class="col-1">
                <i class="fas fa-angle-right"></i>
              </div>
              <div class="col">
						    <span class="font-weight-bold">{{ $vuelo->horaLlegada() }}</span>
						    <span class="text-muted">{{ "(" . $vuelo->destino->codigo . ") " . $vuelo->destino->nombre }}</span>
              </div>
            </div>
					</div>

					<div class="col-2 text-muted">
						{{ $vuelo->duracion() }}
					</div>

					<div class="col-1 text-muted">
						{{ $vuelo->escalas() }}
					</div>
					
					<div class="col-2 text-right font-weight-bold">
						{{ $vuelo->precio(TRUE) }}
					</div>
				</div>
			</a>
			
			<div class="collapse" id="vuelo-{{ $vuelo->id }}" data-parent="#list-accordion">
				<div class="card-body">
					<h5 class="card-title">{{ $vuelo->codigo }}</h5>
					<h6 class="card-subtitle mb-2 text-muted">{{ $vuelo->avion->aerolinea->nombre }}</h6>
					<div class="text-right">
						<form action="/vuelos/details/" method="post">
              {{ csrf_field() }}
							<input type="hidden" name="tramo[]" value="{{ random_int(0,100) }}">
							<input type="hidden" name="tramo[]" value="{{ random_int(0,100) }}">
							<button type="submit" class="btn btn-primary">Continuar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
@endsection