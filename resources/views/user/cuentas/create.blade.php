@extends('layouts.app')

@section('content')

    @include('layouts.messages')

    <div class="card create-cuenta-card">
        <div class="card-body">

            <h2 class="card-title">
                <i class="fas fa-map-marker-alt"></i> Agregar cuenta bancaria
            </h2>

            <hr>

            <div class="row">
                <div class="col-md-6 offset-2">

                    <form method="post" id="create-cuenta-form" action="{{ action('CuentasController@store') }}">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="POST">

                        <div class="form-group row">
                            <label class="col-3" for="banco-select"> Banco </label>
                            <div class="col-9">

                                <select id="banco-select" name="banco_id" class="form-control" title="Banco">
                                    @foreach ($bancos as $banco)
                                        <option value="{{ $banco->id }}">
                                        {{ $banco->nombre }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-3" for="tipo-cuenta-select"> Tipo de cuenta </label>
                            <div class="col-9">

                                <select id="tipo-cuenta-select" name="tipo_cuenta_id" class="form-control" title="Tipo cuenta">
                                    @foreach ($tipoCuentas as $tipo)
                                        <option value="{{ $tipo->id }}">
                                        {{ $tipo->descripcion }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-3" for="nuemero_cuenta"> Número de cuenta </label>
                            <div class="col-9">
                                <input type="number" class="form-control" name="numero_cuenta" id="nuemero_cuenta">
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-auto mr-auto">
                    <a href="/cuentas" class="btn btn-info float-left">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>

                <div class="col-auto">
                    <a
                        class="btn btn-primary"
                        href="/cuentas"
                        onclick="event.preventDefault();
                        document.getElementById('create-cuenta-form').submit();">
                        <i class="fas fa-save"></i> Guardar
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
