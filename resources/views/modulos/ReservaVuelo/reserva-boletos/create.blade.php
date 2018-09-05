@extends('layouts.admin')

@section('content')
	<h2>
    <i class="fas fa-ticket-alt"></i> Reserva Boleto
  </h2>
	
	<hr>
	
	@include('layouts.messages')

	<form method="post" action="{{ action('ReservaVuelo\ReservaBoletosController@store') }}">
		{{ csrf_field() }}

		<div class="form-group row">
			<label class="col-3" for="fecha_reserva">Fecha Reserva</label>
			<div class="col-9">
				<input class="form-control" name="fecha_reserva" id="fecha_reserva">
			</div>
		</div>

    <div class="form-group row">
      <label class="col-3" for="descuento">Descuento</label>
      <div class="col-9">
        <input class="form-control" name="descuento" id="descuento">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-3" for="costo">Costo</label>
      <div class="col-9">
        <input type="text" class="form-control" name="costo" id="costo">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-3" for="tramo_id">Tramo</label>
      <div class="col-9">
        <select type="text" class="form-control selectpicker" name="tramo_id" id="tramo_id" title="Seleccione Tramo" data-live-search="true">
          @foreach($tramos as $tramo)
          <option value="{{ $tramo->id }}">
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
          <option value="{{ $ordenCompra->id }}">
            {{ $ordenCompra->id }}
          </option>
          @endforeach
        </select>
      </div>
    </div>

		<div class="text-right">
			<a href="/reserva-boletos/" class="btn btn-info">
        <i class="fas fa-ban"></i> Cancelar
      </a>
			<button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Guardar
      </button>
		</div>
	</form>
@endsection
