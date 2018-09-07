@extends('layouts.app')

@section('content')
    @if (count($reservas) == 0)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Tu carrito esta vacío</h4>
            <p>
            Para buscar productos y agregarlos a tu carrito de compras haz click <a href="/"> aqui </a>
            </p>
            <hr>
            <p class="mb-0">Debes buscar productos de tu interés y agregarlos a tu carrito de compras para poder pagar.</p>
        </div>
    @else
        <div class="card">
          <div class="card-header">
            Carrito de compras
          </div>
          <ul class="list-group list-group-flush">
          @foreach ($reservas as $key => $reserva)
            <li class="list-group-item">
              <div class="row">
                @if ($reserva['tipo'] == 'auto')
                  <div class="col-1">
                    <span class="badge badge-secondary badge-pill">
                      Auto
                    </span>
                  </div>
                  <div class="col">
                    <p class="card-text">
                      Patente: {{ $reserva['reserva']['detalle']->auto->patente }}
                      <br/>
                      Descripción: {{ $reserva['reserva']['detalle']->auto->descripcion }}
                      <br/>
                      Capacidad: {{ $reserva['reserva']['detalle']->auto->capacidad }}
                      <br/>
                      Fecha reserva: {{ $reserva['reserva']['detalle']->fecha_reserva }}
                      <br/>
                      Fecha inicio reserva: {{ $reserva['reserva']['detalle']->fecha_inicio }}
                      <br/>
                      Fecha termino reserva: {{ $reserva['reserva']['detalle']->fecha_termino }}
                      <br/>
                      <span> Costo: {{ $reserva['reserva']['detalle']->precio(TRUE) }} </span>
                    </p>

                  @elseif ($reserva['tipo'] == 'hotel')
                    <div class="col-1">
                      <span class="badge badge-warning badge-pill">
                        Hotel
                      </span>
                    </div>
                    <div class="col">
                      <p class="card-text">
                        Hotel: {{ $reserva['reserva']['detalle']->habitacion->hotel->nombre }}
                        <br/>
                        Estrellas: {{ $reserva['reserva']['detalle']->habitacion->hotel->estrellas }}
                        <br/>
                        Descripción: {{ $reserva['reserva']['detalle']->habitacion->descripcion }}
                        <br/>
                        Fecha reserva: {{ $reserva['reserva']['detalle']->fecha_reserva }}
                        <br/>
                        Fecha inicio reserva: {{ $reserva['reserva']['detalle']->fecha_inicio }}
                        <br/>
                        Fecha termino reserva: {{ $reserva['reserva']['detalle']->fecha_termino }}
                        <br/>
                        <span> Costo: {{ $reserva['reserva']['detalle']->precio(TRUE) }} </span>
                      </p>
                  
                  @elseif ($reserva['tipo'] == 'vuelo')
                    <div class="col-1">
                      <span class="badge badge-dark badge-pill">
                        Vuelo
                      </span>
                    </div>
                    <div class="col">
                      <p class="card-text">
                        Codigo Vuelo: {{ $reserva['reserva']['detalle']->tramo->codigo }}
                        <br/>
                        Partida: {{ $reserva['reserva']['detalle']->tramo->horarioPartida() }}
                        <br/>

                        Partida: {{ $reserva['reserva']['detalle']->tramo->origen->ciudad->nombre . ', ' . $reserva['reserva']['detalle']->tramo->origen->ciudad->pais->nombre }}
                        <br/>

                        Llegada: {{ $reserva['reserva']['detalle']->tramo->horarioLlegada() }}
                        <br/>

                        Destino: {{ $reserva['reserva']['detalle']->tramo->destino->ciudad->nombre . ', ' . $reserva['reserva']['detalle']->tramo->destino->ciudad->pais->nombre }}
                        <br/>

                        Costo: {{ $reserva['reserva']['detalle']->tramo->precio(TRUE) }}
                        <br/>

                        Pasajero: {{ $reserva['reserva']['extra']->nombre . ' / ' . $reserva['reserva']['extra']->rut}}
                        <br/>
                      </p>              
                 
                  @elseif ($reserva['tipo'] == 'actividad')
                    <div class="col-1">
                      <span class="badge badge-info badge-pill">
                        Actividad
                      </span>
                    </div>
                    <div class="col">
                      <p class="card-text">
                        
                      </p>
                  @endif
                </div>
                <div class="col-2">
                  <form
                      action="{{ action('HomeController@deleteFromCart') }}"
                      method="POST"
                      onsubmit="return confirm('Esta seguro de que desea eliminar el producto del carrito?')">

                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="POST">
                      <input type="hidden" name="reserva_id" value="{{ $key }}">
                      <button type="submit" class="btn btn-danger">
                          <i class="fas fa-cart-arrow-down"></i> Eliminar
                      </button>
                  </form>
                </div>
              </div>
            </li>
          @endforeach
          </ul>
          <div class="card-footer">
            <div class="text-right">
              <a href="{{ url('/') }}" class="btn btn-success float-left">
                <i class="fas fa-arrow-left"></i>
                Seguir comprando
              </a>
              <form
                  action="{{ action('HomeController@payAll') }}"
                  method="POST"
                  onsubmit="return confirm('¿Esta seguro que desea realizar el pago de los productos en el carrito?')">

                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="POST">
                  <button type="submit" class="btn btn-primary">
                      <i class="fas fa-cart-arrow-down"></i> Pagar
                  </button>
              </form>
            </div>
          </div>
        </div>


    @endif
@endsection
