@extends('layouts.admin')

@section('content')
  <h2>
    <i class="fas fa-map-marker-alt"></i> Habitacion #{{ $habitacion->id }}
  </h2>
  
  <hr>

  <div class="form-group row">
    <label class="col" for="nombre">Capacidad nino</label>

    <div class="col">{{ $habitacion->capacidad_nino }}</div>

  </div>

  <div class="form-group row">
    <label class="col" for="estrellas">Capacidad Adulto</label>
    <div class="col">{{ $habitacion->capacidad_adulto }}</div>

  </div>

  <div class="form-group row">
    <label class="col" for="estrellas">Precio por noche</label>
    <div class="col">{{ $habitacion->precio_por_noche }}</div>

  </div>

  <div class="form-group row">
    <label class="col" for="descripcion">Descripcion</label>
    <div class="col">{{ $habitacion->descripcion }}</div>
  </div>

  <div class="form-group row">
    <label class="col" for="descripcion">Hotel</label>
    <div class="col">({{ $habitacion->hotel->id }}) {{ $habitacion->hotel->nombre }} </div>
  </div>
  
  <div class="row">
    <div class="col-auto mr-auto">
      <a href="/habitaciones/" class="btn btn-info float-left">
        <i class="fas fa-arrow-left"></i> Volver
      </a>
    </div>
  
    <div class="col-auto">
      <a href="/habitaciones/{{ $habitacion->id }}/edit" class="btn btn-primary">
        <i class="fas fa-edit"></i> Editar
      </a>
    </div>
    
    <div class="auto">
      <form action="{{ action('ReservaHabitacion\HabitacionesController@destroy', $habitacion->id) }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger">
          <i class="fas fa-trash-alt"></i> Eliminar
        </button>
      </form>
    </div>
      
  </div>
@endsection