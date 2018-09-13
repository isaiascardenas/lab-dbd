@extends('layouts.app')

@section('content')
    <h2>
        <i class="fas fa-cubes"></i> Paquetes
    </h2>

    <hr>

    @include('layouts.messages')

    <div class="card">
        <div class="card-header">
          <h5 class="card-title">
            Paquete #{{ $paquete->id }}
          </h5>
        </div>
        
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <p class="card-text">
                <b>Descripción</b>
                <br>
                {{ $paquete->descripcion }}
              </p>

              <p class="card-text">
                <b>Descuento</b>
                <br>
                <span class="lead">
                  {{ $paquete->descuentoAplicado() }}
                </span>
              </p>

              <p class="card-text">
                <b>Precio</b>
                <br>
                <span class="lead">
                  {{ $paquete->precio(TRUE) }}
                </span>
              </p>
            </div>
            <div class="col-6">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block" src="https://picsum.photos/600/300?image={{ mt_rand(1, 100) }}" alt="">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block" src="https://picsum.photos/600/300?image={{ mt_rand(1, 100) }}" alt="S">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block" src="https://picsum.photos/600/300?image={{ mt_rand(1, 100) }}" alt="">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
          
          <br>

          <h4>Detalle Vuelos</h4>
          <table class="table">
            <thead>
              <tr>
                <th>Origen</th>
                <th>Destino</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($paquete->reservaBoletos as $reserva)
              <tr>
                <td>
                  {{ $reserva->tramo->horarioPartida() }}
                  -
                  {{ $reserva->tramo->origen->ciudad->nombre }},
                  {{ $reserva->tramo->origen->ciudad->pais->nombre }}
                </td>
                <td>
                  {{ $reserva->tramo->horarioLlegada() }}
                  -
                  {{ $reserva->tramo->destino->ciudad->nombre }},
                  {{ $reserva->tramo->destino->ciudad->pais->nombre }}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          <br>

          @if ($tipo == 1)
            <h4>Detalle Habitación</h4>
            <p class="card-text">
              @for ($i = 0; $i < $paquete->reservaHabitacion->habitacion->hotel->estrellas; $i++)
                <i class="fas fa-star"></i>
              @endfor
              @for ($i = $paquete->reservaHabitacion->habitacion->hotel->estrellas; $i < 5; $i++)
                <i class="far fa-star"></i>
              @endfor

              <b>Hotel</b> {{ $paquete->reservaHabitacion->habitacion->hotel->nombre }}
            </p>
            <p class="card-text">
              {{ $paquete->reservaHabitacion->habitacion->descripcion }}
            </p>
          @else
            <h4>Detalle Auto</h4>
            <p class="card-text">
              <b>Compañía</b> {{ $paquete->reservaAuto->auto->sucursal->compania->nombre }}
              <br>
              <b>Capacidad</b> {{ $paquete->reservaAuto->auto->capacidad }} persona(s)
              <br>
              {{ $paquete->reservaAuto->auto->descripcion }}
            </p>
          @endif
        </div>

        <div class="card-footer text-right">
          <a href="/paquetes/" class="btn btn-link float-left">
              <i class="fas fa-arrow-left"></i> Volver
          </a>
          
          <form
              action="{{ action('Paquetes\PaquetesController@store', [$tipo, $paquete->id]) }}"
              method="POST"
              onsubmit="return confirm('¿Esta seguro que desea agregar al carro?')">

              {{ csrf_field() }}
              <input type="hidden" name="_method" value="POST">
              <button type="submit" class="btn btn-primary">
                  <i class="fas fa-cart-plus"></i> Agregar al carro
              </button>
          </form>
        </div>
    </div>

    </div>
@endsection
