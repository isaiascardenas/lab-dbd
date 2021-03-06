@extends('layouts.app')

@section('content')
    @isset($success)
      <div class="alert alert-light" role="alert">
        {{ $success }}
      </div>
    @endif

    @empty($reservas)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Tu carro esta vacío</h4>
            <p>
            Para buscar productos y agregarlos a tu carro de compras haz click <a href="/"> aqui </a>
            </p>
            <hr>
            <p class="mb-0">Debes buscar productos de tu interés y agregarlos a tu carro de compras para poder pagar.</p>
        </div>
    @else

        @include('layouts.messages')

        <div class="card">
          <div class="card-header">
            <h5 class="card-title">
              <i class="fas fa-shopping-cart"></i>
              Carro de compras
            </h5>
          </div>
          <ul class="list-group list-group-flush">
          @foreach ($reservas as $key => $reserva)
            <li class="list-group-item">
              <div class="row">
                @if ($reserva['tipo'] == 'auto')
                  <div class="col-2">
                    <span class="badge badge-secondary badge-pill">
                      Auto
                    </span>
                  </div>
                  <div class="col">
                    <p class="card-text">
                      <b>Patente</b> {{ $reserva['reserva']['detalle']->auto->patente }}
                      <br/>
                      Capacidad: {{ $reserva['reserva']['detalle']->auto->capacidad }} personas.
                      <br/>
                      Inicio reserva: {{ $reserva['reserva']['detalle']->fechaInicio() }}
                      <br/>
                      Termino reserva: {{ $reserva['reserva']['detalle']->fechaTermino() }}
                    </p>

                @elseif ($reserva['tipo'] == 'hotel')
                  <div class="col-2">
                    <span class="badge badge-warning badge-pill">
                      Hotel
                    </span>
                  </div>
                  <div class="col">
                    <p class="card-text">
                      <b>Hotel</b> {{ $reserva['reserva']['detalle']->habitacion->hotel->nombre }}
                      <br/>
                      Inicio reserva: {{ $reserva['reserva']['detalle']->fechaInicio() }}
                      <br/>
                      Termino reserva: {{ $reserva['reserva']['detalle']->fechaTermino() }}
                    </p>
                @elseif ($reserva['tipo'] == 'traslado')
                  <div class="col-2">
                    <span class="badge badge-primary badge-pill">
                      Traslado
                    </span>
                  </div>
                  <div class="col">
                    <p class="card-text">
                      <b>Hotel</b> {{ $reserva['reserva']['detalle']->hotel->nombre }}
                      <b>Aeropuerto</b> {{ $reserva['reserva']['detalle']->aeropuerto->nombre }}
                      <br/>
                      Fecha Inicio: {{ $reserva['reserva']['detalle']->fechaInicio() }}
                      <br/>
                      Fecha Termino: {{ $reserva['reserva']['detalle']->fechaTermino() }}
                    </p>
                @elseif ($reserva['tipo'] == 'vuelo')
                  <div class="col-2">
                    <span class="badge badge-dark badge-pill">
                      Vuelo
                    </span>
                  </div>
                  <div class="col">
                    <p class="card-text">
                      <b>Codigo Vuelo</b>: {{ $reserva['reserva']['detalle']->tramo->codigo }}
                      <br/>
                      
                      Horario Partida: {{ $reserva['reserva']['detalle']->tramo->horarioPartida() }}
                      <br/>

                      Partida: {{ $reserva['reserva']['detalle']->tramo->origen->ciudad->nombre . ', ' . $reserva['reserva']['detalle']->tramo->origen->ciudad->pais->nombre }}
                      <br/>

                      Horario Llegada: {{ $reserva['reserva']['detalle']->tramo->horarioLlegada() }}
                      <br/>

                      Destino: {{ $reserva['reserva']['detalle']->tramo->destino->ciudad->nombre . ', ' . $reserva['reserva']['detalle']->tramo->destino->ciudad->pais->nombre }}
                      <br/>
                                             
                      Pasajero: {{ $reserva['reserva']['extra']->nombre . ' / ' . $reserva['reserva']['extra']->rut}}
                      <br/>
                    </p>
                @elseif ($reserva['tipo'] == 'actividad')
                  <div class="col-2">
                      <span class="badge badge-info badge-pill">
                          Actividad
                      </span>
                  </div>
                  <div class="col">
                    <p class="card-text">
                      {{ $reserva['reserva']['detalle']->actividad->titulo }}
                      <br>
                      Ciudad: {{ $reserva['reserva']['detalle']->actividad->ciudad->nombre }}
                      <br>
                      Inicio: {{ $reserva['reserva']['detalle']->actividad->fechaInicio() }}
                      <br>
                      Termino: {{ $reserva['reserva']['detalle']->actividad->fechaTermino() }}
                      <br>
                      Cant. Niños: {{ $reserva['reserva']['detalle']->capacidad_ninos }}
                      <br>
                      Cant. Adultos: {{ $reserva['reserva']['detalle']->capacidad_adultos }}
                    </p>
                
                @elseif ($reserva['tipo'] == 'paqueteVH')
                  <div class="col-2">
                      <span class="badge badge-light badge-pill">
                          Paquete Vuelo + Hotel
                      </span>
                  </div>
                  <div class="col">
                    <p class="card-text">
                      <b>Vuelo</b>
                      <br>
                      @foreach($reserva['reserva']['detalle']->reservaBoletos as $reservacion)
                        {{ $reservacion->tramo->HorarioPartida() }},
                        {{ $reservacion->tramo->origen->ciudad->nombre }}
                        <i class="fas fa-chevron-right"></i>
                        {{ $reservacion->tramo->horarioLlegada() }},
                        {{ $reservacion->tramo->destino->ciudad->nombre }}
                        <br>
                      @endforeach
                    </p>
                    <p class="card-text">
                      <b>Reserva Habitación</b>
                      <br>
                      <b>Hotel</b> {{ $reserva['reserva']['detalle']->reservaHabitacion->habitacion->hotel->nombre }}
                    </p>
                @elseif ($reserva['tipo'] == 'paqueteVA')
                  <div class="col-2">
                      <span class="badge badge-dark badge-pill">
                          Paquete Vuelo + Auto
                      </span>
                  </div>
                  <div class="col">
                    <p class="card-text">
                      <b>Vuelo(s)</b>
                      <br>
                      @foreach($reserva['reserva']['detalle']->reservaBoletos as $reservacion)
                        {{ $reservacion->tramo->HorarioPartida() }},
                        {{ $reservacion->tramo->origen->ciudad->nombre }}
                        <i class="fas fa-chevron-right"></i>
                        {{ $reservacion->tramo->horarioLlegada() }},
                        {{ $reservacion->tramo->destino->ciudad->nombre }}
                        <br>
                      @endforeach
                    </p>
                    <p class="card-text">
                      <b>Reserva Automóvil</b>
                      <br>
                      <b>Compañia</b> {{ $reserva['reserva']['detalle']->reservaAuto->auto->sucursal->compania->nombre }}
                    </p>
                @endif
                </div>
                <div class="col-2">
                  <p class="lead text-right">
                    {{ $reserva['reserva']['detalle']->precio(TRUE) }}
                  </p>
                </div>
                <div class="col-1 text-right">
                  <form
                      action="{{ action('CartController@delete') }}"
                      method="POST"
                      onsubmit="return confirm('Esta seguro de que desea eliminar el producto del carro?')">

                      {{ csrf_field() }}
                      @method('DELETE')

                      <input type="hidden" name="reserva_id" value="{{ $key }}">
                      <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar">
                          <i class="fas fa-trash-alt"></i>
                      </button>
                  </form>
                </div>
              </div>
            </li>
          @endforeach
            <li class="list-group-item">
              <h5>
                <i class="fas fa-credit-card"></i>
                Escoge tu cuenta
              </h5>
              <form
                  action="{{ action('CartController@pay') }}"
                  method="POST"
                  id="pagar-carro-form"
                  onsubmit="return confirm('¿Esta seguro que desea realizar el pago de los productos en el carro?')">

                  {{ csrf_field() }}
                  @method('POST')
                  <table class="table table-hover table-sm">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Tipo de Cuenta</th>
                        <th>Número Cuenta</th>
                        <th>Banco</th>
                        <th>Saldo</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($cuentas as $cuenta)
                        <tr class="{{ $cuenta->bg }}">
                          <td>
                            <input type="radio" name="cuenta_id" value="{{ $cuenta->id }}" {{ $cuenta->disabled }} required>
                          </td>
                          <td>
                            {{ $cuenta->tipoCuenta->descripcion }}
                          </td>
                          <td>
                            {{ $cuenta->numero_cuenta }}
                          </td>
                          <td>
                            {{ $cuenta->banco->nombre }}
                          </td>
                          <td class="text-right">
                            {{ $cuenta->saldo(TRUE) }}
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                      {{-- <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <label class="input-group-text" for="cuenta-select">Cuenta Bancaria</label>
                          </div>
                          
                          <select id="cuenta-select" name="cuenta_id" class="form-control" title="Cuenta">
                              @foreach ($cuentas as $cuenta)
                                  <option value="{{ $cuenta->id }}">

                                  {{ $cuenta->tipoCuenta->descripcion }}
                                  &nbsp;&nbsp;&nbsp;
                                  {{ $cuenta->numero_cuenta }},
                                  &nbsp;&nbsp;&nbsp;
                                  {{ $cuenta->banco->nombre }},
                                  &nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;
                                  Saldo:
                                  &nbsp;&nbsp;&nbsp;
                                  $ {{ $cuenta->saldo }}

                                  </option>
                              @endforeach
                          </select>
                      </div>
                  </div> --}}
              </form>
            </li>
          </ul>

          <div class="card-footer">
            <div class="text-right">
              <a href="{{ url('/') }}" class="btn btn-link float-left">
                <i class="fas fa-arrow-left"></i>
                Seguir comprando
              </a>
              <button type="submit" form="pagar-carro-form" class="btn btn-primary">
                  <i class="fas fa-credit-card"></i>
                  Pagar {{ $totalCarro }}
              </button>
            </div>
          </div>
        </div>


    @endif
@endsection
