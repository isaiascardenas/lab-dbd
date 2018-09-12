@extends('layouts.app')

@section('content')
    <h2>
        <i class="fas fa-calendar-alt"></i> Selecciona tu traslado
    </h2>

    <div id="list-accordion">
        @foreach($traslados as $traslado)
            <div class="card">
                <a class="card-header" data-toggle="collapse" href="#traslado-{{ $loop->iteration }}">
                    {{ $traslado->titulo }}
                    <div class="text-right float-right">
                        {{ $traslado->precioAdulto(TRUE) }} / adulto
                    </div>
                </a>

                <div class="collapse" id="traslado-{{ $loop->iteration }}" data-parent="#list-accordion">
                    <div class="card-body">
                        <p>
                        <b>Descripción</b>
                        <br>
                        {{ $traslado->descripcion }}
                        </p>
                        <p class="card-text">
                        <span class="text-right font-weight-bold">
                            Precio Adulto: {{ $traslado->precioAdulto(TRUE) }}
                        </span >
                        <br/>
                        <span class="text-right font-weight-bold">
                            Max cantidad adulto: {{ $traslado->max_adultos }}
                        </span >
                        <br/>
                        <br/>
                        <span class="text-right font-weight-bold">
                            Precio Niño: {{ $traslado->precioNino(TRUE) }}
                        </span >
                        <br/>
                        <span class="text-right font-weight-bold">
                            Max cantidad niños: {{ $traslado->max_ninos }}
                        </span >
                        </p>
                        <div class="text-right">
                            <a class="btn btn-sm btn-info" href="/reserva-traslados/reservar/{{ $traslado->id }}">
                                <i class="fas fa-cart-plus"></i> Agregar al carro
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
