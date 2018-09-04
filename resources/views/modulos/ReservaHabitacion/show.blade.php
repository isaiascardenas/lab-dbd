@extends('layouts.admin')

@section('content')
  <h2>
    <i class="fas fa-map-marker-alt"></i> Hotel #{{ $hotel->id }}
  </h2>
  
  <hr>

  <div class="form-group row">
    <label class="col" for="nombre">Nombre</label>

    <div class="col">{{ $hotel->nombre }}</div>

  </div>

  <div class="form-group row">
    <label class="col" for="estrellas">Estrellas</label>
    <div class="col">{{ $hotel->estrellas }}</div>

  </div>

  <div class="form-group row">
    <label class="col" for="descripcion">Descripcion</label>
    <div class="col">{{ $hotel->descripcion }}</div>
  </div>

  <div class="form-group row">
    <label class="col" for="descripcion">Ciudad</label>
    <div class="col">({{ $hotel->ciudad->id }}) {{ $hotel->ciudad->nombre }} </div>
  </div>
  
  <div class="row">
    <div class="col-auto mr-auto">
      <a href="/hoteles/" class="btn btn-info float-left">
        <i class="fas fa-arrow-left"></i> Volver
      </a>
    </div>
  
    <div class="col-auto">
      <a href="/hoteles/{{ $hotel->id }}/edit" class="btn btn-primary">
        <i class="fas fa-edit"></i> Editar
      </a>
    </div>
    
    <div class="auto">
      <form action="{{ action('ReservaHabitacion\HotelesController@destroy', $hotel->id) }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger">
          <i class="fas fa-trash-alt"></i> Eliminar
        </button>
      </form>
    </div>
      
  </div>
@endsection