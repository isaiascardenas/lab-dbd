@extends('layouts.app')

@section('content')
  <h2>
      <i class="fas fa-building"></i> Habitaciones disponibles
  </h2>

  <hr>

  @include('layouts.messages')
  <div class="card">
    <table class="table table-hover table-bordered table-sm datatable">
      <thead>
        <tr>
          <th class="no-sort"></th>
          <th>Hotel</th>
          <th>Capacidad Niño</th>
          <th>Capacidad Adulto</th>
          <th>Precio por noche</th>
        </tr>
      </thead>
      <tbody>
        @foreach($habitacionDisp as $habitacion)
        <tr>
          <td> 
            <a class="btn btn-sm btn-info" href="/reserva-habitaciones/reservar/{{ $habitacion->id }}">
              Reservar
            </a>
          </td>
          <td>{{ $habitacion->hotel->nombre }}</td>
          <td>{{ $habitacion->capacidad_adulto }}</td>
          <td>{{ $habitacion->capacidad_nino }}</td>
          <td>{{ $habitacion->precioPorNoche(TRUE) }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
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
