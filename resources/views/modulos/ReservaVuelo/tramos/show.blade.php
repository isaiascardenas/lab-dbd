@extends('layouts.admin')

@section('content')
  <h2><i class="fas fa-map-marker-alt"></i> Tramo #{{ $tramo->id }}</h2>
  
  <hr>

  <div class="form-group row">
    <label class="col-3" for="codigo">Código</label>
    <div class="col-9">{{ $tramo->codigo }}</div>
  </div>

  <div class="form-group row">
    <label class="col-3" for="fecha_partida">Fecha Partida</label>
    <div class="col-9">{{ $tramo->horarioPartida() }}</div>
  </div>

  <div class="form-group row">
    <label class="col-3" for="fecha_llegada">Fecha Llegada</label>
    <div class="col-9">{{ $tramo->horarioLlegada() }}</div>
  </div>

  <div class="form-group row">
    <label class="col-3" for="avion_id">Aerolinea</label>
    <div class="col-9">{{ $tramo->avion->aerolinea->nombre }}</div>
  </div>

  <div class="form-group row">
    <label class="col-3" for="origen_id">Aeropuerto Origen</label>
    <div class="col-9">
      {{ '(' . $tramo->origen->ciudad->pais->nombre .', ' . $tramo->origen->ciudad->nombre .') '. $tramo->origen->nombre }}
    </div>
  </div>

  <div class="form-group row">
    <label class="col-3" for="destino_id">Aeropuerto Destino</label>
    <div class="col-9">
      {{ '(' . $tramo->destino->ciudad->pais->nombre .', ' . $tramo->destino->ciudad->nombre .') '. $tramo->destino->nombre }}
    </div>
  </div>

  <div class="row">
    <div class="col-auto mr-auto">
      <a href="/tramos" class="btn btn-info float-left">
        <i class="fas fa-arrow-left"></i> Volver
      </a>
    </div>
  
    <div class="col-auto">
      <a href="/tramos/{{ $tramo->id }}/edit" class="btn btn-primary">
        <i class="fas fa-edit"></i> Editar
      </a>
    </div>

    <div class="col-auto">
      <form action="{{ action('ReservaVuelo\TramosController@destroy', $tramo->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar el registro?')">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger">
          <i class="fas fa-trash-alt"></i> Eliminar
        </button>
      </form>
    </div>
  </div>
@endsection