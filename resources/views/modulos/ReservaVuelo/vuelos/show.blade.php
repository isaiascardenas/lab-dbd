@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">
			<b>{{ $vuelo->codigo }}</b> - {{ $vuelo->origen->localizacion->ciudad }} <i class="fas fa-angle-right"></i> {{ $vuelo->destino->localizacion->ciudad }}
		</div>
		<div class="card-body">
			{{-- OTROS DETALLES --}}

			<h3>Itinerario</h3>
			<table class="table table-striped table-hover">
				<tbody>
					<tr>
						<td>{{ $vuelo->horaPartida() }}</td>
						<td>{{ "(" . $vuelo->origen->codigo . ") " . $vuelo->origen->nombre . ", " . $vuelo->origen->localizacion->ciudad }}</td>
					</tr>
					<tr>
						<td>{{ $vuelo->horaLlegada() }}</td>
						<td>{{ "(" . $vuelo->destino->codigo . ") " . $vuelo->destino->nombre . ", " . $vuelo->destino->localizacion->ciudad }}</td>
					</tr>
				</tbody>
			</table>

			{{-- MAS DETALLES AQUI--}}

			<ul>
				@foreach ($vuelo->asientos() as $asiento)
					<li>{{ $asiento->tipo . ' - ' .$asiento->codigo_asiento . ' - ' . $asiento->costo }}</li>
				@endforeach
			</ul>

			<button class="btn btn-primary">
				<i class="fas fa-shopping-cart"></i> Agregar al carrito
			</button>
		</div>
	</div>
@endsection