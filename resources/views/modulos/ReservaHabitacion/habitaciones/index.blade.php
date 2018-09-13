@extends('layouts.admin')

@section('content')
  <h2>
    <i class="fas fa-building"></i> Habitaciones
  </h2>
  
  <hr>

  @include('layouts.messages')
  
  <div class="form-group">
    <a href="/habitaciones/create/" class="btn btn-primary">
      <i class="fas fa-plus"></i> Nueva Habitacion
    </a>
  </div>

  <table class="table table-hover table-bordered table-sm datatable">
    <thead>
      <tr>
        <th class="no-sort"></th>
        <th>Capacidad Niño</th>
        <th>Capacidad Adulto</th>
        <th>Precio por noche</th>
        <th>Descripcion</th>
        <th>Hotel</th>
      </tr>
    </thead>
    <tbody>
      @foreach($habitaciones as $habitacion)
      <tr>
        <td>
          <a class="btn btn-sm btn-info" href="/habitaciones/{{ $habitacion->id }}">
            <i class="fas fa-eye"></i>
          </a>
        </td>
        <td>{{ $habitacion->capacidad_nino }}</td>
        <td>{{ $habitacion->capacidad_adulto }}</td>
        <td>{{ $habitacion->precio_por_noche }}</td>
        <td>{{ $habitacion->descripcion }}</td>
        <td>{{ $habitacion->hotel->nombre }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection