@extends('layouts.app')

@section('content')
    <h2>
        <i class="fas fa-map-marker-alt"></i> Reservar Habitación
    </h2>

    <hr>

    @include('layouts.messages')

    <div class="card" style="align-items: center;">
        <img class="card-img-top" src="https://loremflickr.com/320/240/hotel" style="width: 45%; margin-top: 10px;">
        <div class="card-body" style="width: 100%;">
            <h5 class="card-title">Confirma tu reserva</h5>
            <div class="form-group row">
                <label class="col-3"> Desde </label>
                <div class="col-9">{{ session('inicio_reserva') }}</div>
            </div>

            <div class="form-group row">
                <label class="col-3"> Hasta </label>
                <div class="col-9">{{ session('termino_reserva') }}</div>
            </div>

            <div class="form-group row">
                <label class="col-3"> Hotel </label>
                <div class="col-9">{{ $habitacion->hotel->nombre }}</div>
            </div>

            <a href="/hoteles/" class="btn btn-info float-left">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
            <a href="/hoteles/" class="btn btn-info">
                <i class="fas fa-ban"></i> Cancelar
            </a>

            <div class="col-md-3 offset-md-9">
                <form
                    action="{{ action('ReservaHabitacion\ReservaHabitacionesController@store') }}"
                    method="POST"
                    onsubmit="return confirm('¿Esta seguro que desea agregar al carrito?')">

                    {{ csrf_field() }}

                    <input type="hidden" name="habitacion_id" value="{{ $habitacion->id }}">
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
