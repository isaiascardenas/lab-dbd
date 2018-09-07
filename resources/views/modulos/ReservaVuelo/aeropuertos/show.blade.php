@extends('layouts.admin')

@section('content')
  <h2>
    <i class="fas fa-map-marker-alt"></i> Aeropuerto #{{ $aeropuerto->id }}
  </h2>
  
  <hr>

  <div class="form-group row">
    <label class="col-3" for="codigo">C&oacute;digo</label>
    <div class="col-9">{{ $aeropuerto->codigo }}</div>
  </div>

  <div class="form-group row">
    <label class="col-3" for="nombre">Nombre</label>
    <div class="col-9">{{ $aeropuerto->nombre }}</div>
  </div>

  <div class="form-group row">
    <label class="col-3" for="direccion">Direcci&oacute;n</label>
    <div class="col-9">{{ $aeropuerto->direccion }}</div>
  </div>

  <div class="form-group row">
    <label class="col-3" for="localizacion_id">Nombre</label>
    <div class="col-9">{{ $aeropuerto->ciudad->nombre .', '. $aeropuerto->ciudad->pais->nombre }}</div>
  </div>

  <div class="row">
    <div class="col-auto mr-auto">
      <a href="/aeropuertos/" class="btn btn-info float-left">
        <i class="fas fa-arrow-left"></i> Volver
      </a>
    </div>
  
    <div class="col-auto">
      <a href="/aeropuertos/{{ $aeropuerto->id }}/edit" class="btn btn-primary">
        <i class="fas fa-edit"></i> Editar
      </a>
    </div>

    <div class="col-auto">
      <form action="{{ action('ReservaVuelo\AeropuertosController@destroy', $aeropuerto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar este registro?');">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger">
          <i class="fas fa-trash-alt"></i> Eliminar
        </button>
      </form>
    </div>
  </div>
@endsection