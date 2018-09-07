@extends('layouts.admin')

@section('content')
  <h2>
    <i class="fas fa-map-marker-alt"></i> Editar habitacion #{{ $habitacion->id }}
  </h2>
  
  <hr>
  
  @include('layouts.messages')

  <form method="post" action="{{ action('ReservaHabitacion\HabitacionesController@update', $habitacion->id) }}" method="post">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PATCH">

    <div class="form-group row">
      
      <label class="col" for="nombre">Capacidad Niño</label>
      <div class="col">
        <input type="number" class="form-control" name="capacidad_nino" id="capacidad_nino" value="{{ $habitacion->capacidad_nino }}">
      </div>
    </div>

    <div class="form-group row">
      
      <label class="col" for="nombre">capacidad Adulto</label>
      <div class="col">
        <input type="number" class="form-control" name="capacidad_adulto" id="capacidad_adulto_id" value="{{ $habitacion->capacidad_adulto }}">
      </div>
    </div>

     <div class="form-group row">
      
      <label class="col" for="nombre">Precio por noche</label>
      <div class="col">
        <input type="number" class="form-control" name="precio_por_noche" id="precio_por_noche_id" value="{{ $habitacion->precio_por_noche }}">
      </div>
    </div>

    <div class="form-group row">
      
      <label class="col" for="nombre">descripcion</label>
      <div class="col">
        <input type="text" class="form-control" name="descripcion" id="descripcion_id" value="{{ $habitacion->descripcion }}">
      </div>
    </div>

    <div class="form-group row">
      
      <label class="col" for="nombre">hotel</label>
      <div class="col">
        <input type="number" class="form-control" name="hotel_id" id="hotel_id" value="{{ $habitacion->hotel->id }}">
        <label class="col" for="nombre">({{$habitacion->hotel->nombre}})</label>
      </div>
    </div>

    <div class="text-right">
      <a href="/habitaciones/" class="btn btn-info float-left">
          <i class="fas fa-arrow-left"></i> Volver
        </a>
      <a href="/habitaciones/{{ $habitacion->id }}" class="btn btn-info">
        <i class="fas fa-ban"></i> Cancelar
      </a>
      <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Actualizar
      </button>
    </div>
  </form>
@endsection