@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">
			<b>{{ $vuelo->codigo }}</b> - {{ $vuelo->ciudad_origen }} <i class="fas fa-angle-right"></i> {{ $vuelo->ciudad_destino }}
		</div>
		<div class="card-body">
			{{-- OTROS DETALLES --}}

			<h3>Itinerario</h3>
			<table class="table table-striped table-hover">
				<tbody>
					<tr>
						<td>-hora-</td>
						<td>-aeropuerto-</td>
					</tr>
				</tbody>
			</table>

			{{-- MAS DETALLES AQUI--}}

			<button class="btn btn-primary">
				<i class="fas fa-shopping-cart"></i>
				Agregar al carrito
			</button>
		</div>
	</div>
@endsection