@extends('layouts.app')

@section('content')
    <h2>
        <i class="fas fa-map-marker-alt"></i> Escoge tu auto
    </h2>

    <hr>

    @include('layouts.messages')

    <table class="table table-hover table-bordered table-sm datatable">
        <thead>
            <tr>
                <th class="no-sort"></th>
                <th> Patente </th>
                <th> Descripción </th>
                <th> Precio hora </th>
                <th> Capacidad </th>
            </tr>
        </thead>
        <tbody>
            @foreach($autos as $auto)
                <tr>
                    <td>
                        <a class="btn btn-sm btn-info" href="reserva_autos/reservar/{{ $auto->id }}">
                            Reservar
                        </a>
                    </td>
                    <td>{{ $auto->patente }}</td>
                    <td>{{ $auto->descripcion }}</td>
                    <td>{{ $auto->precio_hora }}</td>
                    <td>{{ $auto->capacidad }}</td>
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
