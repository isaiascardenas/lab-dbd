@extends('layouts.admin')

@section('content')
  <h2>
    <i class="fas fa-ticket-alt"></i> Reserva de Boletos #{{ $reservaBoleto->id }}
  </h2>
  
  <hr>

  <div class="form-group row">
    <label class="col-3" for="fecha_reserva">Fecha de Reserva</label>
    <div class="col-9">{{ $reservaBoleto->fecha_reserva }}</div>
  </div>

  <div class="form-group row">
    <label class="col-3" for="descuento">Descuento</label>
    <div class="col-9">{{ $reservaBoleto->descuento }}</div>
  </div>

  <div class="form-group row">
    <label class="col-3" for="costo">Costo</label>
    <div class="col-9">{{ $reservaBoleto->costo }}</div>
  </div>

  <div class="form-group row">
    <label class="col-3" for="tramo_id">Tramo</label>
    <div class="col-9">{{ $reservaBoleto->tramo->codigo }}</div>
  </div>

  <div class="row">
    <div class="col-auto mr-auto">
      <a href="/reserva-boletos/" class="btn btn-info float-left">
        <i class="fas fa-arrow-left"></i> Volver
      </a>
    </div>
  
    <div class="col-auto">
      <a href="/reserva-boletos/{{ $reservaBoleto->id }}/edit" class="btn btn-primary">
        <i class="fas fa-edit"></i> Editar
      </a>
    </div>

    <div class="col-auto">
      <form action="{{ action('ReservaVuelo\ReservaBoletosController@destroy', $reservaBoleto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar el registro?')">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger">
          <i class="fas fa-trash-alt"></i> Eliminar
        </button>
      </form>
    </div>
  </div>
@endsection
