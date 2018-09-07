@extends('layouts.admin')

@section('content')
  <h2>
    <i class="fas fa-map-marker-alt"></i> Reservar Habitacion
  </h2>
  
  <hr>
  
  @include('layouts.messages')

  <form method="post" action="{{ action('ReservaHabitacion\ReservaHabitacionesController@store') }}">
    {{ csrf_field() }}
    
    <div class="form-group row">
      <label class="col" for="nombre">Desde</label>
      <div class="col">
        <input type="number" class="form-control" name="desde_date" id="desde_date">
      </div>
    </div>

    <div class="form-group row">
      <label class="col" for="nombre">Hasta</label>
      <div class="col">
        <input type="number" class="form-control" name="hasta_date" id="hasta_date">
      </div>
    </div>

    <div class="form-group row">
      <label class="col" for="nombre">Costo Total</label>
      <div class="col">
        <input type="number" class="form-control" name="costo_total" id="costo_total">
      </div>
    </div>

    <div class="form-group row">
      <label class="col" for="nombre">Descuento</label>
      <div class="col">
        <input type="text" class="form-control" name="descuento" id="descuento">
      </div>
    </div>

    <div class="form-group row">
      <label class="col" for="nombre">Hotel</label>
      <div class="col">
        <input type="text" class="form-control" name="hotel" id="hotel">
      </div>
    </div>


    <div class="text-right">

      <a href="/hoteles/" class="btn btn-info float-left">
          <i class="fas fa-arrow-left"></i> Volver
        </a>
      <a href="/hoteles/" class="btn btn-info">
        <i class="fas fa-ban"></i> Cancelar
      </a>
      <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Reservar
      </button>
    </div>
  </form>
@endsection
