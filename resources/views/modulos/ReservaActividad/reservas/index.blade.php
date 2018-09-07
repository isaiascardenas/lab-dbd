@extends('layouts.admin')

@section('content')
    <h2>
        <i class="fas fa-ticket-alt"></i> Escoge una actividad
    </h2>

    <hr>

    @include('layouts.messages')

    <div class="form-group">
        <a href="/reserva-boletos/create/" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nueva Reserva de actividad
        </a>
    </div>

    <table class="table table-hover table-bordered table-sm datatable">
        <thead>
            <tr>
                <th class="no-sort"></th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Termino</th>
                <th>Descuento</th>
                <th>Costo</th>
                <th>Tramo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservaBoletos as $reservaBoleto)
                <tr>
                    <td>
                        <a class="btn btn-sm btn-info" href="/reserva-boletos/{{ $reservaBoleto->id }}">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                    <td>{{ $reservaBoleto->fecha_reserva }}</td>
                    <td>{{ $reservaBoleto->descuento }}</td>
                    <td>{{ $reservaBoleto->costo }}</td>
                    <td>
                        <a href="/tramos/{{ $reservaBoleto->tramo_id }}">
                            {{ $reservaBoleto->tramo->codigo }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
