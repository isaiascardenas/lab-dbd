@extends('layouts.admin')

@section('content')
    <h2>
        <i class="fas fa-map-marker-alt"></i> Autos
    </h2>

    <hr>

    @include('layouts.messages')

    <div class="form-group">
        <a href="/autos/create/" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nuevo Auto
        </a>
    </div>

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
                        <a class="btn btn-sm btn-info" href="/autos/{{ $auto->id }}">
                            <i class="fas fa-eye"></i>
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