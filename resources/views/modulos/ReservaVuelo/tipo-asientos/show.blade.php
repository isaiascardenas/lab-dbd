@extends('layouts.admin')

@section('content')
  <h2><i class="fas fa-map-marker-alt"></i> Tipo de Asiento #{{ $tipoAsiento->id }}</h2>
  
  <hr>

  <div class="form-group row">
    <label class="col-3" for="descripcion">Descripción</label>
    <div class="col-9">{{ $tipoAsiento->descripcion }}</div>
  </div>

  <div class="form-group row">
    <label class="col-3" for="factor_costo">Factor Costo</label>
    <div class="col-9">{{ $tipoAsiento->factor_costo }}</div>
  </div>

  <div class="row">
    <div class="col-auto mr-auto">
      <a href="/tipo-asientos/" class="btn btn-info float-left">
        <i class="fas fa-arrow-left"></i> Volver
      </a>
    </div>
  
    <div class="col-auto">
      <a href="/tipo-asientos/{{ $tipoAsiento->id }}/edit" class="btn btn-primary">
        <i class="fas fa-edit"></i> Editar
      </a>
    </div>

    <div class="col-auto">
      <form action="{{ action('ReservaVuelo\TipoAsientosController@destroy', $tipoAsiento->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar el registro?')">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger">
          <i class="fas fa-trash-alt"></i> Eliminar
        </button>
      </form>
    </div>
  </div>
@endsection
