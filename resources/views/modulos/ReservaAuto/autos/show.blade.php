@extends('layouts.admin')

@section('content')
    <h2>
        <i class="fas fa-map-marker-alt"></i> Auto #{{ $auto->id }}
    </h2>

    <hr>

    <div class="form-group row">
        <label class="col-3" for="patente"> Patente </label>
        <div class="col-9">{{ $auto->patente }}</div>
    </div>

    <div class="form-group row">
        <label class="col-3" for="descripcion"> Descripcion </label>
        <div class="col-9">{{ $auto->descripcion }}</div>
    </div>

    <div class="form-group row">
        <label class="col-3" for="precio_hora"> Precio hora </label>
        <div class="col-9">{{ $auto->precio_hora }}</div>
    </div>

    <div class="form-group row">
        <label class="col-3" for="precio_hora"> Compañia </label>
        <div class="col-9">{{ $auto->sucursal->compania->nombre }} ({{ $auto->sucursal->ciudad->nombre }})</div>
    </div>

    <div class="row">
        <div class="col-auto mr-auto">
            <a href="/autos/" class="btn btn-info float-left">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>

        <div class="col-auto">
            <a href="/autos/{{ $auto->id }}/edit" class="btn btn-primary">
                <i class="fas fa-edit"></i> Editar
            </a>
        </div>

        <div class="auto">
            <form action="{{ action('ReservaAuto\AutosController@destroy', $auto->id) }}" method="POST" onsubmit="return confirm('¿Esta seguro que desea eliminar?')">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i> Eliminar
                </button>
            </form>
        </div>

    </div>
@endsection
