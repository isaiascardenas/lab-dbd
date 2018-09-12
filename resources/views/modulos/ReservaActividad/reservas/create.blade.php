@extends('layouts.app')

@section('content')
  <div class="card">
      <div class="card-header">
        <h5 class="card-title">
          {{ $actividad->titulo }}
        </h5>
      </div>
      
      <div class="card-body">
        <div class="row">
          <div class="col-6">
            <p class="card-text">
              <b>Lugar</b>
              <br>
              {{ $actividad->ciudad->nombre }}, {{ $actividad->ciudad->pais->nombre }}
            </p>

            <p class="card-text">
              <b>Horarios</b>

              <table class="table text-center">
                <thead>
                  <tr>
                    <th>Inicio</th>
                    <th>Termino</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      {{ $actividad->fechaInicio() }}
                    </td>
                    <td>
                      {{ $actividad->fechaTermino() }}
                    </td>
                    </td>
                  </tr>
                </tbody>
              </table>
            </p>
          
            <p class="card-text">
              <b>Descripción</b>
              <br>
              {{ $actividad->descripcion }}
            </p>

            <p class="card-text">
              <b>Capacidad</b>

              <table class="table">
                <thead>
                  <tr>
                    <th></th>
                    <th>Reservas</th>
                    <th>Costo</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Adulto</td>                  
                    <td class="text-center">
                      {{ request()->session()->get('busqueda.actividad.cantidad_adultos') }}
                    </td>
                    <td class="text-right">
                      {{ $actividad->precioAdulto(TRUE) }}
                    </td>
                    </td>
                  </tr>
                  <tr>
                    <td>Niños</td>
                    <td class="text-center">
                      {{ request()->session()->get('busqueda.actividad.cantidad_ninos') }}
                    </td>
                    <td class="text-right">
                      {{ $actividad->precioNino(TRUE) }}
                    </td>
                  </tr>
                </tbody>
                <tfooter>
                  <tr>
                    <td></td>
                    <td></td>
                    <td class="text-right">
                      {{ request()->session()->get('busqueda.actividad.costo')}}
                    </td>
                  </tr>
                </tfooter>
              </table>
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
        
        <form method="post" action="{{ action('ReservaActividad\ReservaActividadesController@store', $actividad->id) }}" onsubmit="return confirm('¿Está seguro que desea agregar al carro?')">
            {{ csrf_field() }}
            <input type="hidden" name="actividad_id" value="{{ $actividad->id }}">
            <input type="hidden" name="_method" value="POST">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-cart-plus"></i> Agregar al carro
            </button>
        </form>
      </div>
    </div>
@endsection
