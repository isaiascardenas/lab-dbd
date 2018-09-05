@extends('layouts.admin')

@section('content')
    <h2>
        <i class="fas fa-map-marker-alt"></i> Sucursales
    </h2>

    <hr>

    @include('layouts.messages')

    <div class="form-group">
        <a href="/sucursales/create/" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nueva Sucursal
        </a>
    </div>

    <table class="table table-hover table-bordered table-sm datatable">
        <thead>
            <tr>
                <th class="no-sort"></th>
                <th> Compañia </th>
                <th> Ciudad </th>
            </tr>
        </thead>
        <tbody>
            @foreach($sucursales as $sucursal)
                <tr>
                    <td>
                        <a class="btn btn-sm btn-info" href="/sucursales/{{ $sucursal->id }}">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                    <td>{{ $sucursal->compania->nombre}}</td>
                    <td>{{ $sucursal->ciudad->nombre}}</td>
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
