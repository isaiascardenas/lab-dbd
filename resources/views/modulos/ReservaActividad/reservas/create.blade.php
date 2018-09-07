@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <b>Lugar</b>
                    <br>
                    {{ $actividad->ciudad->nombre }}
                </div>

                <div class="col">
                    Fecha Inicio
                    <br>
                    <b>{{ $actividad->fecha_inicio }}</b>
                </div>

                <div class="col">
                    Fecha Termino
                    <br>
                    <b>{{ $actividad->fecha_termino }}</b>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h3>Actividad</h3>

            <div class="row">
                <div class="col-6">
                    <h4>Información adicional</h4>
                    <div class="form-group">
                        <label>Cantidad Adulos: </label> {{$actividad->max_adultos}}
                    </div>

                    <div class="form-group">
                        <label>Cantidad Niños: </label> {{$actividad->max_niños}}
                    </div>
                </div>
            </div>
            <div class="text-right">
                <form method="post" action="{{ action('ReservaVuelo\VuelosController@reserva') }}" onsubmit="return confirm('¿Está seguro que desea agregar al carrito?')">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-shopping-cart"></i> Agregar al carrito
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
