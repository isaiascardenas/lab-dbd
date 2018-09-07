@extends('layouts.app')

@section('content')
    @if (count($reservas) == 0)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Tu carrito esta vacío</h4>
            <p>
            Para buscar productos y agregarlos a tu carrito de compras haz click <a href="/"> aqui </a>
            </p>
            <hr>
            <p class="mb-0">Debes buscar productos de tu interés y agregarlos a tu carrito de compras para poder pagar.</p>
        </div>
    @else

        @foreach ($reservas as $reserva)
            @if ($reserva['tipo'] == 'auto')
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"> Tu Auto </h5>
                        <p class="card-text">
                        Patente: {{ $reserva['reserva']->auto->patente }}
                        <br/>
                        Descripción: {{ $reserva['reserva']->auto->descripcion }}
                        <br/>
                        Capacidad: {{ $reserva['reserva']->auto->capacidad }}
                        <br/>
                        Fecha reserva: {{ $reserva['reserva']->fecha_reserva }}
                        <br/>
                        Fecha inicio reserva: {{ $reserva['reserva']->fecha_inicio }}
                        <br/>
                        Fecha termino reserva: {{ $reserva['reserva']->fecha_termino }}
                        <br/>
                        <span> Costo: {{ session('costo') }} </span>
                        </p>
                        <form
                            action="{{ action('HomeController@deleteFromCart') }}"
                            method="POST"
                            onsubmit="return confirm('Esta seguro de que desea eliminar el producto del carrito?')">

                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="POST">
                            <input type="hidden" name="reserva_id" value="{{ $reserva['reserva']->id }}">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-cart-arrow-down"></i> Eliminar del carrito
                            </button>
                        </form>
                    </div>
                </div>
            @elseif ($reserva->tipo == 'otro_tipo')
            @endif
        @endforeach

        <div class="col-md-3 offset-md-9">
            <form
                action="{{ action('HomeController@payAll') }}"
                method="POST"
                onsubmit="return confirm('¿Esta seguro que desea realizar el pago de los productos en el carrito?')">

                {{ csrf_field() }}
                <input type="hidden" name="_method" value="POST">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-cart-arrow-down"></i> Pagar
                </button>
            </form>
        </div>

    @endif
@endsection
