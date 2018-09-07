@extends('layouts.app')

@section('content')
    <h2>
        <i class="fas fa-map-marker-alt"></i> Habitaciones disponibles
    </h2>

    <hr>

    @include('layouts.messages')

  <table class="table table-hover table-bordered table-sm datatable">
    <thead>
      <tr>
        <th class="no-sort" >Reservar</th>
        <th>Capacidad Niño</th>
        <th>Capacidad Adulto</th>
        <th>Precio por noche</th>
        <th>Descripcion</th>
        <th>Desde</th>
        <th>hasta</th>
        <th>Hotel</th>
      </tr>
    </thead>
    <tbody>
      @foreach($habitacionDisp as $habitacion)
      <tr>
        <td> 
            <a class="btn btn-sm btn-info" href="/reserva_habitacion/reservar/{{ $habitacion->id }}">
            <i class="fas fa-save"></i>
          </a>
        </td>
        <td>{{ $habitacion->capacidad_nino }}</td>
        <td>{{ $habitacion->capacidad_adulto }}</td>
        <td>{{ $habitacion->precio_por_noche }}</td>
        <td>{{ $habitacion->descripcion }}</td>
        <td>{{ $request_fecha_inicio }}</td>
        <td>{{ $request_fecha_termino }}</td>
        <td>{{ $habitacion->hotel->nombre }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                'language': {
                    'url': 'https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                },
                'columnDefs': [
                    {'targets': 'no-sort', 'orderable': false}
                ], 
                'order': [[1, 'asc']]
            });
        } );
    </script>
@endsection
