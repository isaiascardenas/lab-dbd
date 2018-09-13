@extends('layouts.app')

@section('content')
  <h2>
    <i class="fas fa-bus"></i> Selecciona tu Traslado
  </h2>

  @if (count($traslados) > 0)
    <div id="list-accordion">
      @foreach($traslados as $traslado)
      <div class="card">
        <a class="card-header" data-toggle="collapse" href="#traslado-{{ $loop->iteration }}">
          <div class="row text-left">
            <div class="col-6">
              <div class="row">
                <div class="col">
                  <span class="font-weight-bold">{{ $traslado->horaPartida() }}</span>
                  <span class="text-muted">
                  (Hora inicio de traslado)</span>
                </div>

                <div class="col-1">
                  <i class="fas fa-angle-right"></i>
                </div>

                <div class="col">
                  <span class="font-weight-bold">{{ $traslado->horaLlegada() }}</span>
                  <span class="text-muted">
                  (Hora llegada a destino)</span>
                </div>
              </div>
            </div>

            <div class="col-2 text-muted">
                {{$traslado->stringTipoTraslado()}}
            </div>


            <div class="col-2 text-muted">
                
            </div>

            <div class="col-2 text-right font-weight-bold">
                <span class="text-muted">
                  Precio por persona</span>
                $ {{ $traslado->precio_persona}}
            </div>
          </div>
        </a>
          
        <div class="collapse" id="traslado-{{ $loop->iteration }}" data-parent="#list-accordion">
          <div class="card-body">
            <p class="card-text">
              <b>Detalles</b>
              <br>Hotel: {{$traslado->hotel->nombre}}</br>
              <br>Aeropuerto: {{$traslado->aeropuerto->nombre}}, ({{$traslado->aeropuerto->codigo}})</br>
              <br> capacidad maxima : {{$traslado->capacidad}}
              
            </p>
            
            <div class="text-right">
              <form action="/vuelos/details/" method="post">
                {{ csrf_field() }}
        
                <button type="submit" class="btn btn-info btn-sm">
                  <i class="fas fa-check"></i>
                  Seleccionar
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  @else
    <div class="alert alert-danger">
      <b>Whoops</b>
      <br>
      No se han encontrado Traslados para los datos ingresados
      <br>
      <a href="/" class="btn btn-link">
        <i class="fas fa-arrow-left"></i>
        Volver
      </a>
    </div>
  @endif
@endsection
