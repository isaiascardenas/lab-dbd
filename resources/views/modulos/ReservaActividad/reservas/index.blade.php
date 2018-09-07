@extends('layouts.app')

@section('content')
  <h2>
    <i class="fas fa-plane"></i> Selecciona tu actividad
  </h2>

  <div id="list-accordion">
    @foreach($actividades as $actividad)
    <div class="card">
      <a class="card-header" data-toggle="collapse" href="#actividad-{{ $loop->iteration }}">
        <div class="row text-left">
          <div class="col-6">
            <div class="row">
              <div class="col">
                <span class="font-weight-bold">{{ $actividad->fecha_inicio }}</span>
              </div>

              <div class="col-1">
                <i class="fas fa-angle-right"></i>
              </div>

              <div class="col">
                <span class="text-muted">{{ $actividad->fecha_termino }}</span>
              </div>
            </div>
          </div>

          {{-- <div class="col-2 text-muted"> --}}
              {{-- {{ $actividad->costo_aduto}} --}}
          {{-- </div> --}}

          <div class="col-2 text-muted">
              {{ $actividad->ciudad->nombre }}
          </div>

          <div class="col-2 text-right font-weight-bold">
              ${{ $actividad->costo_adulto }}
          </div>
        </div>
      </a>

      <div class="collapse" id="actividad-{{ $loop->iteration }}" data-parent="#list-accordion">
        <div class="card-body">
          <h6 class="card-subtitle mb-2 text-muted">
              {{ $actividad->descripcion }}
          </h6>
          <p class="card-text">
              <span class="col-2 text-right font-weight-bold">
                  Precio Adulto: ${{ $actividad->costo_adulto }}
              </span >
              <br/>
              <span class="col-2 text-right font-weight-bold">
                  Max cantidad adulto: {{ $actividad->max_adultos }}
              </span >
              <br/>
              <br/>
              <span class="col-2 text-right font-weight-bold">
                  Precio Niño: ${{ $actividad->costo_nino }}
              </span >
              <br/>
              <span class="col-2 text-right font-weight-bold">
                  Max cantidad niños: {{ $actividad->max_ninos }}
              </span >
          </p>
          <div class="text-right">
            <form action="/actividad/details/" method="post">
              {{ csrf_field() }}
              {{-- <input type="hidden" name="tramos[]" value="{{ $tramo->id }}"> --}}
              <button type="submit" class="btn btn-primary">
                Continuar
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endsection
