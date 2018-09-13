@extends('layouts.app')

@section('content')

    @include('layouts.messages')

    <div class="card abonar-cuenta-card">
        <div class="card-header">
            <i class="fas fa-money-check-alt"></i> Abonar a tu cuenta
        </div>
        <div class="card-body">
            <h4 class="card-title">
                Información de tu cuenta
            </h4>

            <br>

            <form>
                <div class="form-group row">
                    <label class="col-3"> Número cuenta </label>
                    <div class="col-9">{{ $cuenta->numero_cuenta }}</div>
                </div>
                <div class="form-group row">
                    <label class="col-3"> Tipo Cuenta </label>
                    <div class="col-9">{{ $cuenta->tipoCuenta->descripcion }}</div>
                </div>
                <div class="form-group row">
                    <label class="col-3"> Banco </label>
                    <div class="col-9">{{ $cuenta->banco->nombre}}</div>
                </div>
                <div class="form-group row">
                    <label class="col-3"> Saldo </label>
                    <div class="col-9 font-weight-bold">{{ $cuenta->saldo(TRUE) }}</div>
                </div>
            </form>

            <hr>

            <form
                id="abonar-cuenta-form"
                method="post"
                action="{{ action('CuentasController@abonar', $cuenta->id) }}"
                onsubmit="return confirm('¿Esta seguro que el monto es correcto?')">

                {{ csrf_field() }}
                <input name="_method" type="hidden" value="POST">
                <div class="form-group row">
                    <label class="col-3" for="nombre"> Abono </label>
                    <div class="input-group mb-3 col-9">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="number" class="form-control" name="abono" id="abono">
                    </div>
                </div>
            </form>


            <div class="row">
                <div class="col-auto mr-auto">
                    <a href="/cuentas" class="btn btn-primary float-left">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>

                <div class="col-auto">
                    <a
                        class="btn btn-info"
                        href="/cuentas/abonar/{{ $cuenta->id }}"
                        onclick="event.preventDefault();
                        document.getElementById('abonar-cuenta-form').submit();">
                        <i class="fas fa-money-check-alt"></i> Abonar
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
