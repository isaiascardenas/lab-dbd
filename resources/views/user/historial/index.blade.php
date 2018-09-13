@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
          <h2 class="card-title">
              <i class="fas fa-history"></i>
              Historial de Compras
          </h2>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>Fecha</th>
                <th>Detalle</th>
                <th>Costo</th>
              </tr>
            </thead>
            <tbody>
              @foreach($ordenes as $orden)
              <tr>
                <td>{{ $orden->fechaGenerado() }}</td>
                <td>{!! $orden->detalle() !!}</td>
                <td class="text-right">{{ $orden->costoTotal(TRUE) }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          <a href="/" class="btn btn-info">
              <i class="fas fa-arrow-left"></i> Volver
          </a>
        </div>
    </div>
@endsection
