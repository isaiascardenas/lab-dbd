@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">
      <b>{{ $vuelo->origen()->horaPartida() }}</b>
      {{ $vuelo->origen()->origen->localizacion->ciudad }}
      <i class="fas fa-angle-right"></i>
      <b>{{ $vuelo->destino()->horaLlegada() }}</b>
      {{ $vuelo->destino()->destino->localizacion->ciudad }}
		</div>
		<div class="card-body">
			{{-- OTROS DETALLES --}}

			<h3>Itinerario</h3>
			<table class="table table-striped table-hover">
				<tbody>
          @foreach ($vuelo->itinerario() as $tramo)
          <tr>
            <td>
              <b>{{ $tramo->horaPartida() }}</b> {{ $tramo->origen->codigo }}
              <i class="fas fa-angle-right"></i>
              <b>{{ $tramo->horaLlegada() }}</b> {{ $tramo->destino->codigo }}
            </td>
            <td>
              <b>{{ $tramo->codigo }}</b> - Operado por {{ $tramo->avion->aerolinea->nombre }}
            </td>
					</tr>

          @if (next($tramo)):
          <tr>
            <td colspan="2">
              {{ $tramo->tiempoEscala(next($vuelo->itinerario())) }}
            </td>
          </tr>
          @endif;

          @endforeach
        </tbody>
			</table>

			{{-- <ul>
				@foreach ($vuelo->asientos() as $asiento)
					<li>{{ $asiento->tipo . ' - ' .$asiento->codigo_asiento . ' - ' . $asiento->costo }}</li>
				@endforeach
			</ul> --}}

			<button class="btn btn-primary">
				<i class="fas fa-shopping-cart"></i> Agregar al carrito
			</button>
		</div>
	</div>
@endsection