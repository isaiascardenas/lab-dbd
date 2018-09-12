@extends('layouts.app')

@section('content')
  <h2>
    <i class="fas fa-calendar-alt"></i> Selecciona tu actividad
  </h2>

  <div id="list-accordion">
    @foreach($actividades as $actividad)
    <div class="card">
      <a class="card-header" data-toggle="collapse" href="#actividad-{{ $loop->iteration }}">
        {{ $actividad->titulo }}
        <div class="text-right float-right">
            {{ $actividad->precioAdulto(TRUE) }} / adulto
        </div>
      </a>

      <div class="collapse" id="actividad-{{ $loop->iteration }}" data-parent="#list-accordion">
        <div class="card-body">
          <p>
            <b>Descripción</b>
            <br>
            {{ $actividad->descripcion }}
          </p>
          <p class="card-text">
              <span class="text-right font-weight-bold">
                  Precio Adulto: {{ $actividad->precioAdulto(TRUE) }}
              </span >
              <br/>
              <span class="text-right font-weight-bold">
                  Max cantidad adulto: {{ $actividad->max_adultos }}
              </span >
              <br/>
              <br/>
              <span class="text-right font-weight-bold">
                  Precio Niño: {{ $actividad->precioNino(TRUE) }}
              </span >
              <br/>
              <span class="text-right font-weight-bold">
                  Max cantidad niños: {{ $actividad->max_ninos }}
              </span >
          </p>
          <div class="text-right">
              <a class="btn btn-sm btn-info" href="/reserva-actividades/reservar/{{ $actividad->id }}">
                  <i class="fas fa-cart-plus"></i> Agregar al carro
              </a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endsection
