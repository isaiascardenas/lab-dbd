@extends('layouts.admin')

@section('content')
    <h2>
        <i class="fas fa-map-marker-alt"></i> Editar Auto #{{ $auto->id }}
    </h2>

    <hr>

    @include('layouts.messages')

    <form method="post" action="{{ action('ReservaAuto\AutosController@update', $auto->id) }}">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">

        <div class="form-group row">
            <label class="col-3" for="patente"> Patente </label>
            <div class="col-9">
                <input type="text" class="form-control" name="patente" id="patente" value="{{ $auto->patente }}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-3" for="descripcion"> Descripción </label>
            <div class="col-9">
                <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ $auto->descripcion }}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-3" for="precio_hora"> Precio hora </label>
            <div class="col-9">
                <input type="text" class="form-control" name="precio_hora" id="precio_hora" value="{{ $auto->precio_hora }}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-3" for="capacidad"> Capacidad </label>
            <div class="col-9">
                <input type="text" class="form-control" name="capacidad" id="capacidad" value="{{ $auto->capacidad }}">
            </div>
        </div>

        <div class="form-group row">
            <select id="sucursal" name="sucursal_id" class="form-control selectpicker" title="Sucursal" data-live-search="true">
                @foreach ($sucursales as $sucursal)
                    <option value="{{ $sucursal->id }}">
                    {{ $sucursal->compania->nombre }}, {{$sucursal->ciudad->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="text-right">
            <a href="/autos/{{ $auto->id }}" class="btn btn-info">
                <i class="fas fa-ban"></i> Cancelar
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Actualizar
            </button>
        </div>
    </form>
@endsection
