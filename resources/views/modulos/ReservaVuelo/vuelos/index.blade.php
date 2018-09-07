@extends('layouts.app')

@section('content')
  <h2>
    <i class="fas fa-plane"></i> Selecciona tu vuelo
  </h2>

  <div id="list-accordion">
    @foreach($vuelos as $vuelo)
    <div class="card">
      <a class="card-header" data-toggle="collapse" href="#vuelo-{{ $loop->iteration }}">
        <div class="row text-left">
          <div class="col-6">
            <div class="row">
              <div class="col">
                <span class="font-weight-bold">{{ $vuelo->origen()->horaPartida() }}</span>
                <span class="text-muted">{{ "(" . $vuelo->origen()->codigo . ") " . $vuelo->origen()->nombre }}</span>
              </div>
              
              <div class="col-1">
                <i class="fas fa-angle-right"></i>
              </div>
              
              <div class="col">
                <span class="font-weight-bold">{{ $vuelo->destino()->horaLlegada() }}</span>
                <span class="text-muted">{{ "(" . $vuelo->destino()->codigo . ") " . $vuelo->destino()->nombre }}</span>
              </div>
            </div>
          </div>

          <div class="col-2 text-muted">
              {{ $vuelo->duracion() }}
          </div>

          <div class="col-2 text-muted">
              {{ $vuelo->numeroEscalas() }} escala(s)
          </div>
          
          <div class="col-2 text-right font-weight-bold">
              {{ $vuelo->precio(TRUE) }}
          </div>
        </div>
      </a>
        
      <div class="collapse" id="vuelo-{{ $loop->iteration }}" data-parent="#list-accordion">
        <div class="card-body">
          <h6 class="card-subtitle mb-2 text-muted">{{ $vuelo->origen()->avion->aerolinea->nombre }}</h6>
          <div class="text-right">
            <form action="/vuelos/details/" method="post">
              {{ csrf_field() }}
              @foreach($vuelo->itinerario() as $tramo)
              <input type="hidden" name="tramos[]" value="{{ $tramo->id }}">
              @endforeach
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
