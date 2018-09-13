@extends('layouts.admin')

@section('content')
  <h2>
    <i class="fas fa-building"></i> Editar Hotel #{{ $hotel->id }}
  </h2>
  
  <hr>
  
  @include('layouts.messages')

  <form method="post" action="{{ action('ReservaHabitacion\HotelesController@update', $hotel->id) }}" method="post">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PATCH">

    <div class="form-group row">
      
      <label class="col" for="nombre">Nombre</label>
      <div class="col">
        <input type="text" class="form-control" name="nombre" id="nombre_id" value="{{ $hotel->nombre }}">
      </div>
    </div>

    <div class="form-group row">
      
      <label class="col" for="nombre">estrellas</label>
      <div class="col">
        <input type="number" class="form-control" name="estrellas" id="estrellas_id" value="{{ $hotel->estrellas }}" max ="5" min = "1">
      </div>
    </div>

    <div class="form-group row">
      
      <label class="col" for="nombre">descripcion</label>
      <div class="col">
        <input type="text" class="form-control" name="descripcion" id="descripcion_id" value="{{ $hotel->descripcion }}">
      </div>
    </div>

    <div class="form-group row">
      
      <label class="col" for="nombre">ciudad</label>
      <div class="col">
        <input type="number" class="form-control" name="ciudad_id" id="ciudad_id" value="{{ $hotel->ciudad->id }}">
        <label class="col" for="nombre">({{$hotel->ciudad->nombre}})</label>
      </div>
    </div>

    <div class="text-right">
      <a href="/hoteles/" class="btn btn-info float-left">
          <i class="fas fa-arrow-left"></i> Volver
        </a>
      <a href="/hoteles/{{ $hotel->id }}" class="btn btn-info">
        <i class="fas fa-ban"></i> Cancelar
      </a>
      <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Actualizar
      </button>
    </div>
  </form>
@endsection