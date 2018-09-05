@extends('layouts.admin')

@section('content')
    <h2>
        <i class="fas fa-map-marker-alt"></i> Nueva Sucursal
    </h2>

    <hr>

    @include('layouts.messages')

    <form method="post" action="{{ action('ReservaAuto\SucursalesController@store') }}">
        {{ csrf_field() }}

        <div class="form-group row">
            <select id="compania" name="compania_id" class="form-control selectpicker" title="Compania" data-live-search="true">
                @foreach ($companias as $compania)
                    <option value="{{ $compania->id }}">
                    {{ $compania->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group row">
            <select id="ciudad" name="ciudad_id" class="form-control selectpicker" title="Ciudad" data-live-search="true">
                @foreach ($ciudades as $ciudad)
                    <option value="{{ $ciudad->id }}">
                    {{ $ciudad->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="text-right">
            <a href="/sucursales/" class="btn btn-info">
                <i class="fas fa-ban"></i> Cancelar
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Guardar
            </button>
        </div>
    </form>
@endsection
