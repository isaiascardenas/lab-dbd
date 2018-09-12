@extends('layouts.app')

@section('content')
    <h2>
        <i class="fas fa-car"></i> Reservar Auto
    </h2>

    <hr>

    @include('layouts.messages')

    <div class="card">
        <div class="card-header">
          <h5 class="card-title">
            Auto {{ $auto->patente }}
          </h5>
        </div>
        
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <p class="card-text">
                <b>Descripción</b>
                <br>
                {{ $auto->descripcion }}
              </p>

              <p class="card-text">
                <b>Capacidad</b>
                <br>
                {{ $auto->capacidad }} pasajeros
              </p>

              <p class="card-text">
                <b>Precio por hora</b>
                <br>
                {{ $auto->precio(TRUE) }}
              </p>

              <p class="card-text">
                <b>Compañia</b>
                <br>
                {{ $auto->sucursal->compania->nombre }}, {{ $auto->sucursal->ciudad->nombre }}
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
        </div>

        <div class="card-footer text-right">
          <a href="/" class="btn btn-link float-left">
              <i class="fas fa-arrow-left"></i> Volver
          </a>
          
          <form
              action="{{ action('ReservaAuto\ReservaAutosController@store', $auto->id) }}"
              method="POST"
              onsubmit="return confirm('¿Esta seguro que desea agregar al carro?')">

              {{ csrf_field() }}

              <input type="hidden" name="auto_id" value="{{ $auto->id }}">
              <input type="hidden" name="_method" value="POST">
              <button type="submit" class="btn btn-primary">
                  <i class="fas fa-cart-plus"></i> Agregar al carro
              </button>
          </form>
        </div>
    </div>

    </div>
@endsection
