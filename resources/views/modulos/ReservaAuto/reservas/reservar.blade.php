@extends('layouts.app')

@section('content')
    <h2>
        <i class="fas fa-map-marker-alt"></i> Reservar Auto
    </h2>

    <hr>

    @include('layouts.messages')

    <div class="card" style="align-items: center;">
        <img class="card-img-top" src="https://loremflickr.com/320/240/car" style="width: 45%; margin-top: 10px;">
        <div class="card-body" style="width: 100%;">
            <h5 class="card-title">Confirma tu reserva</h5>
            <div class="form-group row">
                <label class="col-3" for="patente"> Patente </label>
                <div class="col-9">{{ $auto->patente }}</div>
            </div>

            <div class="form-group row">
                <label class="col-3" for="descripcion"> Descripcion </label>
                <div class="col-9">{{ $auto->descripcion }}</div>
            </div>

            <div class="form-group row">
                <label class="col-3" for="capacidad"> Capacidad </label>
                <div class="col-9">{{ $auto->capacidad }} Pasajeros </div>
            </div>

            <div class="form-group row">
                <label class="col-3" for="precio_hora"> Precio hora </label>
                <div class="col-9">{{ $auto->precio_hora }}</div>
            </div>

            <div class="form-group row">
                <label class="col-3" for="precio_hora"> Compañia </label>
                <div class="col-9">{{ $auto->sucursal->compania->nombre }} ({{ $auto->sucursal->ciudad->nombre }})</div>
            </div>

            <div class="col-md-3 offset-md-9">
                <form
                    action="{{ action('ReservaAuto\ReservaAutosController@store', $auto->id) }}"
                    method="POST"
                    onsubmit="return confirm('¿Esta seguro que desea agregar al carrito?')">

                    {{ csrf_field() }}

                    <input type="hidden" name="auto_id" value="{{ $auto->id }}">
                    <input type="hidden" name="_method" value="POST">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-cart-arrow-down"></i> Agregar al carrito
                    </button>
                </form>
            </div>
        </div>
    </div>

    </div>
@endsection
