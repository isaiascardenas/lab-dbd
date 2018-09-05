@extends('layouts.admin')

@section('content')
    <h2>
        <i class="fas fa-map-marker-alt"></i> Nuevo Auto
    </h2>

    <hr>

    @include('layouts.messages')

    <form method="post" action="{{ action('ReservaAuto\AutosController@store') }}">
        {{ csrf_field() }}

        <div class="form-group row">
            <label class="col-3" for="patente"> Patente </label>
            <div class="col-9">
                <input type="text" class="form-control" name="patente" id="patente">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-3" for="descripcion"> Descripcion </label>
            <div class="col-9">
                <input type="text" class="form-control" name="descripcion" id="descripcion">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-3" for="precio_hora"> Precio hora </label>
            <div class="col-9">
                <input type="text" class="form-control" name="precio_hora" id="precio_hora">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-3" for="capacidad"> Capacidad </label>
            <div class="col-9">
                <input type="text" class="form-control" name="capacidad" id="capacidad">
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
            <a href="/autos/" class="btn btn-info">
                <i class="fas fa-ban"></i> Cancelar
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Guardar
            </button>
        </div>
    </form>
@endsection
