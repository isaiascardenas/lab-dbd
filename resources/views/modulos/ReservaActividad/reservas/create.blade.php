@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    Lugar
                    <br>
                    <b>{{ $actividad->ciudad->nombre }}</b>
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
            <h4>Información adicional</h4>
            <hr>
            <div class="row">
                <div class="col-6">

                    <div class="form-group">
                        <label>Cantidad Adulos: </label> {{ request()->session()->get('busqueda.actividad.cantidad_adultos')}}
                    </div>

                    <div class="form-group">
                        <label>Cantidad Niños: </label> {{ request()->session()->get('busqueda.actividad.cantidad_ninos')}}
                    </div>

                    <div class="form-group">
                        <label>Costo Total: </label> {{ request()->session()->get('busqueda.actividad.costo')}}
                    </div>
                </div>
            </div>
            <div class="text-right">
                <form method="post" action="{{ action('ReservaActividad\ReservaActividadesController@store') }}" onsubmit="return confirm('¿Está seguro que desea agregar al carrito?')">
                    {{ csrf_field() }}
                    <input type="hidden" name="actividad_id" value="{{ $actividad->id }}">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-shopping-cart"></i> Agregar al carrito
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
