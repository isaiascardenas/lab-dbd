@extends('layouts.admin')

@section('content')
  <h2>
    <i class="fas fa-user"></i> Pasajero #{{ $pasajero->id }}
  </h2>
  
  <hr>

  <div class="form-group row">
    <label class="col-3" for="nombre">Nombre</label>
    <div class="col-9">{{ $pasajero->nombre }}</div>
  </div>

  <div class="form-group row">
    <label class="col-3" for="rut">Rut</label>
    <div class="col-9">{{ $pasajero->rut }}</div>
  </div>

  <div class="row">
    <div class="col-auto mr-auto">
      <a href="/pasajeros/" class="btn btn-info float-left">
        <i class="fas fa-arrow-left"></i> Volver
      </a>
    </div>
  
    <div class="col-auto">
      <a href="/pasajeros/{{ $pasajero->id }}/edit" class="btn btn-primary">
        <i class="fas fa-edit"></i> Editar
      </a>
    </div>

    <div class="col-auto">
      <form action="{{ action('ReservaVuelo\PasajerosController@destroy', $pasajero->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar el registro?')">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger">
          <i class="fas fa-trash-alt"></i> Eliminar
        </button>
      </form>
    </div>
  </div>
@endsection
