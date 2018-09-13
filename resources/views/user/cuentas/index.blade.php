@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">

            <h2 class="card-title">
                <i class="fas fa-money-check-alt"></i> Cuentas y Saldos
            </h2>

            <br>

            @if (count($cuentas) > 0)
                <div id="list-accordion">
                    @foreach ($cuentas as $cuenta)
                        <div class="card">
                            <a class="card-header" data-toggle="collapse" href="#cuenta-{{ $loop->iteration }}">

                                <div class="row text-left">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col">
                                                <span class="font-weight-bold">Número cuenta</span>
                                                <br>
                                                <span class="text-muted">
                                                    {{ $cuenta->numero_cuenta }}
                                                </span>
                                            </div>

                                            <div class="col">
                                                <span class="font-weight-bold">Tipo de cuenta</span>
                                                <br>
                                                <span class="text-muted">
                                                    {{ $cuenta->tipoCuenta->descripcion }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <span class="font-weight-bold">Banco</span>
                                        <br>
                                        <span class="text-muted">
                                            {{ $cuenta->banco->nombre }}
                                        </span>
                                    </div>

                                    <div class="col-2 text-right">
                                        <span class="font-weight-bold">Saldo</span>
                                        <br>
                                        <span class="font-weight-bold">
                                            $ {{ $cuenta->saldo }}
                                        </span>
                                    </div>

                                    <div class="col-1 offset-1">
                                        <i class="fas fa-angle-down"></i>
                                    </div>

                                </div>
                            </a>

                            <div class="collapse" id="cuenta-{{ $loop->iteration }}" data-parent="#list-accordion">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-1 offset-8">
                                            <form action="/cuentas/{{ $cuenta->id }}/edit/" method="get">
                                                <button type="submit" class="btn btn-info btn-sm">
                                                    <i class="fas fa-money-bill-alt"></i>
                                                    Abonar
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-md-1">
                                            <form
                                                method="post"
                                                action="{{ action('CuentasController@destroy', $cuenta->id) }}"
                                                onsubmit="return confirm('Si elimina esta cuenta perderá el saldo ¿Esta seguro?')">
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash-alt"></i>
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="row" style="margin-top: 15px;">

                    <div class="col-auto mr-auto">
                        <a href="/" class="btn btn-info float-left">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                    </div>
                    <div class="col-auto">
                        <a
                            class="btn btn-primary"
                            href="/cuentas/create">
                            <i class="fas fa-plus"></i> Agregar cuenta
                        </a>
                    </div>

                </div>
            @else
                <div class="alert alert-danger">
                    <b>Whoops</b>
                    <br>
                    No se han encontrado cuenta para los datos ingresados
                    <br>
                    <a href="/" class="btn btn-link">
                        <i class="fas fa-arrow-left"></i>
                        Volver
                    </a>
                </div>
            @endif

        </div>
    </div>
@endsection
