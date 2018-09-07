@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">
      <div class="row">
        <div class="col">
          <b>IDA</b>
          <br>
          {{ $vuelo->diaPartida() }}  
        </div>

        <div class="col">
          {{ $vuelo->origen()->origen->ciudad->nombre . ', ' . $vuelo->origen()->origen->ciudad->pais->nombre }}
          <br>
          ({{ $vuelo->origen()->origen->codigo }}) <b>{{ $vuelo->origen()->horaPartida() }}</b>
        </div>

        {{-- <i class="fas fa-angle-right"></i> --}}
        <div class="col">
          {{ $vuelo->destino()->destino->ciudad->nombre . ', ' . $vuelo->destino()->destino->ciudad->pais->nombre }}
          <br>
          ({{ $vuelo->destino()->destino->codigo }}) <b>{{ $vuelo->destino()->horaLlegada() }}</b>
        </div>
      </div>
		</div>
		<div class="card-body">
			<h3>Itinerario</h3>

			<table class="table table-striped">
				<tbody>
          @foreach ($vuelo->itinerario() as $tramo)
            <tr>
              <td>
                <b>{{ $tramo->horaPartida() }}</b> {{ $tramo->origen->codigo }}
              </td>
              <td>
                <i class="fas fa-angle-right"></i>
              </td>
              <td>
                <b>{{ $tramo->horaLlegada() }}</b> {{ $tramo->destino->codigo }}
              </td>
            </tr>
            <tr>
              <td colspan="3">
                <b>{{ $tramo->codigo }}</b> - Operado por <b>{{ $tramo->avion->aerolinea->nombre }}</b>
              </td>
  					</tr>

            @if (!$loop->last)
            <tr>
              <td colspan="2">
                Espera de {{ $vuelo->tiempoEscala($loop->iteration) }} en {{ $tramo->destino->ciudad->nombre }}
              </td>
            </tr>
            @endif
          @endforeach
        </tbody>
			</table>

      <h3>Agregar pasajero(s)</h3>
      <form method="post" action="{{ action('ReservaVuelo\VuelosController@reserva') }}" onsubmit="return confirm('¿Está seguro que desea agregar al carrito?')">
          {{ csrf_field() }}
        <div class="row">
          @for($i = 1; $i <= intval($paramsVuelo['pasajeros_adultos']) + intval($paramsVuelo['pasajeros_ninos']); $i++)
          <div class="col-6">
            <h5>Pasajero #{{ $i }}</h5>
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" class="form-control" name="pasajero_nombre[]" value="A{{ $i }}">
            </div>

            <div class="form-group">
              <label>Rut</label>
              <input type="text" class="form-control" name="pasajero_rut[]" value="{{ $i }}">
            </div>
          </div>
          @endfor
        </div>
        <div class="text-right">
            @foreach ($vuelo->itinerario() as $tramo)
            <input type="hidden" name="tramos[]" value="{{ $tramo->id }}">
            @endforeach

      			<button type="submit" class="btn btn-primary">
      				<i class="fas fa-shopping-cart"></i> Agregar al carrito
      			</button>
        </div>
      </form>
		</div>
	</div>
@endsection