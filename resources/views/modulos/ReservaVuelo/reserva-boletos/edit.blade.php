@extends('layouts.admin')

@section('content')
	<h2>
    <i class="fas fa-ticket-alt"></i> Editar Reserva de Boleto #{{ $reservaBoleto->id }}
  </h2>
	
	<hr>
	
	@include('layouts.messages')

	<form method="post" action="{{ action('ReservaVuelo\ReservaBoletosController@update', $reservaBoleto->id) }}">
		{{ csrf_field() }}
    <input name="_method" type="hidden" value="PATCH">

		<div class="form-group row">
      <label class="col-3" for="fecha_reserva">Fecha Reserva</label>
      <div class="col-9">
        <input class="form-control" name="fecha_reserva" id="fecha_reserva" value="{{ $reservaBoleto->fecha_reserva }}">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-3" for="descuento">Descuento</label>
      <div class="col-9">
        <input class="form-control" name="descuento" id="descuento" value="{{ $reservaBoleto->descuento }}">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-3" for="costo">Costo</label>
      <div class="col-9">
        <input type="text" class="form-control" name="costo" id="costo" value="{{ $reservaBoleto->costo }}">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-3" for="tramo_id">Tramo</label>
      <div class="col-9">
        <select type="text" class="form-control selectpicker" name="tramo_id" id="tramo_id" title="Seleccione Tramo" data-live-search="true">
          @foreach($tramos as $tramo)
          <option value="{{ $tramo->id }}" {{ $reservaBoleto->tramo_id == $tramo->id ? '' : 'selected' }}>
            {{ $tramo->origen->ciudad->nombre .' -> '. $tramo->destino->ciudad->nombre }}
          </option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-3" for="orden_compra_id">Orden de Compra</label>
      <div class="col-9">
        <select type="text" class="form-control selectpicker" name="orden_compra_id" id="orden_compra_id" title="Seleccione Orden de Compra" data-live-search="true">
          @foreach($ordenCompras as $ordenCompra)
          <option value="{{ $ordenCompra->id }}" {{ $reservaBoleto->orden_compra_id == $ordenCompra->id ? '' : 'selected' }}>
            {{ $ordenCompra->id }}
          </option>
          @endforeach
        </select>
      </div>
    </div>

		<div class="text-right">
			<a href="/reserva-boletos/{{ $reservaBoleto->id }}" class="btn btn-info">
        <i class="fas fa-ban"></i> Cancelar
      </a>
			<button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Actualizar
      </button>
		</div>
	</form>
@endsection