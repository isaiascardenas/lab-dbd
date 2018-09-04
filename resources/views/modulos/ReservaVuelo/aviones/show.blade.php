@extends('layouts.admin')

@section('content')
  <h2><i class="fas fa-map-marker-alt"></i> Avión #{{ $avion->id }}</h2>
  
  <hr>

  <div class="form-group row">
    <label class="col-3" for="descripcion">Descripción</label>
    <div class="col-9">{{ $avion->descripcion }}</div>
  </div>

  <div class="form-group row">
    <label class="col-3" for="aerolinea_id">Aerolínea</label>
    <div class="col-9">{{ $avion->aerolinea->nombre }}</div>
  </div>

  <div class="row">
    <div class="col-auto mr-auto">
      <a href="/aviones/" class="btn btn-info float-left">
        <i class="fas fa-arrow-left"></i> Volver
      </a>
    </div>
  
    <div class="col-auto">
      <a href="/aviones/{{ $avion->id }}/edit" class="btn btn-primary">
        <i class="fas fa-edit"></i> Editar
      </a>
    </div>

    <div class="col-auto">
      <form action="{{ action('ReservaVuelo\AvionesController@destroy', $avion->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar el registro?')">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger">
          <i class="fas fa-trash-alt"></i> Eliminar
        </button>
      </form>
    </div>
  </div>
@endsection