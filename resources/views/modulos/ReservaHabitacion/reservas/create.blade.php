@extends('layouts.app')

@section('content')
  <h2>
      <i class="fas fa-map-marker-alt"></i> Reservar Habitación
  </h2>

  <hr>

  @include('layouts.messages')

  <div class="card">
    <div class="card-header">
      <h5 class="card-title">
        Hotel {{ $habitacion->hotel->nombre }}
      </h5>
    </div>

    <div class="card-body">
      <div class="row">
        <div class="col-6">
          <p class="card-text">
            @for ($i = 0; $i < $habitacion->hotel->estrellas; $i++)
              <i class="fas fa-star"></i>
            @endfor
            @for ($i = $habitacion->hotel->estrellas; $i < 5; $i++)
              <i class="far fa-star"></i>
            @endfor
          </p>
          <p class="card-text">
            <b>Locación</b>
            <br>
            {{ $habitacion->hotel->ciudad->nombre .', ' . $habitacion->hotel->ciudad->pais->nombre }}
          </p>
          <p class="card-text">
            <b>Capacidad Niño</b>
            {{ $habitacion->capacidad_nino }}
          </p>
          <p class="card-text">
            <b>Capacidad Adulto</b>
            {{ $habitacion->capacidad_adulto }}
          </p>
          <p class="card-text">
            <b>Precio por noche</b>
            {{ $habitacion->precioPorNoche(TRUE) }}
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
                <img class="d-block" src="https://picsum.photos/600/300?image=0" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block" src="https://picsum.photos/600/300?image=1" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block" src="https://picsum.photos/600/300?image=2" alt="Third slide">
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
      <p class="card-text">
        <b>Descripción</b>
        <br>
        {{ $habitacion->descripcion }}
      </p>
    </div>
    <div class="card-footer text-right">
        <a href="/" class="btn btn-link float-left">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
        
        <form
            action="{{ action('ReservaHabitacion\ReservaHabitacionesController@store', $habitacion->id) }}"
            method="POST"
            onsubmit="return confirm('¿Esta seguro que desea agregar al carro?')">

            {{ csrf_field() }}

            <input type="hidden" name="habitacion_id" value="{{ $habitacion->id }}">
            <input type="hidden" name="_method" value="POST">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-cart-arrow-down"></i> Agregar al carro
            </button>
        </form>
      
    </div>
  </div>
@endsection
