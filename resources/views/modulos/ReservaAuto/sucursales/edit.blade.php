@extends('layouts.admin')

@section('content')
    <h2>
        <i class="fas fa-map-marker-alt"></i> Editar Sucursal #{{ $sucursal->id }}
    </h2>

    <hr>

    @include('layouts.messages')

    <form method="post" action="{{ action('ReservaAuto\SucursalesController@update', $sucursal->id) }}">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">

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
            <a href="/sucursales/{{ $sucursal->id }}" class="btn btn-info">
                <i class="fas fa-ban"></i> Cancelar
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Actualizar
            </button>
        </div>
    </form>
@endsection
