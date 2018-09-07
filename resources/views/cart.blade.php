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
          @foreach ($reservas as $reserva)
            <li class="list-group-item">
              @if ($reserva['tipo'] == 'auto')
                <p class="card-text">
                  Patente: {{ $reserva['reserva']->auto->patente }}
                  <br/>
                  Descripción: {{ $reserva['reserva']->auto->descripcion }}
                  <br/>
                  Capacidad: {{ $reserva['reserva']->auto->capacidad }}
                  <br/>
                  Fecha reserva: {{ $reserva['reserva']->fecha_reserva }}
                  <br/>
                  Fecha inicio reserva: {{ $reserva['reserva']->fecha_inicio }}
                  <br/>
                  Fecha termino reserva: {{ $reserva['reserva']->fecha_termino }}
                  <br/>
                  <span> Costo: {{ '' }} </span>
                </p>

              @elseif ($reserva['tipo'] == 'hotel')
                    <p class="card-text">
                    {{-- Hotel: {{ $reserva['reserva']->habitacion->hotel->nombre }} --}}
                    {{-- <br/> --}}
                    {{-- Estrellas: {{ $reserva['reserva']->habitacion->hotel->estrellas }} --}}
                    {{-- <br/> --}}
                    Descripción: {{ $reserva['reserva']->habitacion->descripcion }}
                    <br/>
                    Fecha reserva: {{ $reserva['reserva']->fecha_reserva }}
                    <br/>
                    Fecha inicio reserva: {{ $reserva['reserva']->fecha_inicio }}
                    <br/>
                    Fecha termino reserva: {{ $reserva['reserva']->fecha_termino }}
                    <br/>
                    <span> Costo: {{ session('costo') }} </span>
                    </p>
              @elseif ($reserva['tipo'] == 'vuelo')
                <p class="card-text">
                  Codigo Vuelo: {{ $reserva['reserva']->tramo->codigo }}
                  <br/>
                  Partida: {{ $reserva['reserva']->tramo->horarioPartida() }}
                  <br/>

                  Partida: {{ $reserva['reserva']->tramo->origen->ciudad->nombre . ', ' . $reserva['reserva']->tramo->origen->ciudad->pais->nombre }}
                  <br/>

                  Llegada: {{ $reserva['reserva']->tramo->horarioLlegada() }}
                  <br/>

                  Destino: {{ $reserva['reserva']->tramo->destino->ciudad->nombre . ', ' . $reserva['reserva']->tramo->destino->ciudad->pais->nombre }}
                  <br/>

                  Costo: {{ $reserva['reserva']->tramo->precio() }}
                  <br/>

                  
                  <br/>
                </p>
                <form
                    action="{{ action('HomeController@deleteFromCart') }}"
                    method="POST"
                    onsubmit="return confirm('Esta seguro de que desea eliminar el producto del carrito?')">

                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="reserva_id" value="{{ $reserva['reserva']->id }}">
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-cart-arrow-down"></i> Eliminar del carrito
                    </button>
                </form>
              @elseif ($reserva['tipo'] == 'otro_tipo')
              @endif
            </li>
          @endforeach
          </ul>
          <div class="card-footer">
            <div class="text-right">
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
