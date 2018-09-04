@extends('layouts.admin')

@section('content')
    <h2>
        <i class="fas fa-map-marker-alt"></i> Editar Usuario #{{ $user->id }}
    </h2>

    <hr>

    @include('layouts.messages')

    <form method="post" action="{{ action('UserController@update', $user->id) }}">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">

        <div class="form-group row">
            <label class="col-3" for="nombre"> Nombre </label>
            <div class="col-9">
                <input type="text" class="form-control" name="nombre" id="nombre">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-3" for="rut"> Rut </label>
            <div class="col-9">
                <input type="text" class="form-control" name="rut" id="rut">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-3" for="email"> Email </label>
            <div class="col-9">
                <input type="text" class="form-control" name="email" id="email">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-3" for="password"> Contraseña </label>
            <div class="col-9">
                <input type="text" class="form-control" name="password" id="password">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-3" for="password_confirm"> Confirmar contraseña </label>
            <div class="col-9">
                <input type="text" class="form-control" name="password_confirm" id="password_confirm">
            </div>
        </div>

        <div class="text-right">
            <a href="/users/{{ $user->id }}" class="btn btn-info">
                <i class="fas fa-ban"></i> Cancelar
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Actualizar
            </button>
        </div>
    </form>
@endsection
