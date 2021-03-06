@extends('layouts.admin')

@section('content')
    <h2>
        <i class="fas fa-map-marker-alt"></i> Nuevo Auto
    </h2>

    <hr>

    @include('layouts.messages')

    <form method="post" action="{{ action('ReservaAuto\CompaniasController@store') }}">
        {{ csrf_field() }}

        <div class="form-group row">
            <label class="col-3" for="nombre"> Nombre </label>
            <div class="col-9">
                <input type="text" class="form-control" name="nombre" id="nombre">
            </div>
        </div>

        <div class="text-right">
            <a href="/companias/" class="btn btn-info">
                <i class="fas fa-ban"></i> Cancelar
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Guardar
            </button>
        </div>
    </form>
@endsection
