@extends('layouts.admin')

@section('content')
  <h2>
    <i class="fas fa-building"></i> Hoteles
  </h2>
  
  <hr>

  @include('layouts.messages')
  
  <div class="form-group">
    <a href="/hoteles/create/" class="btn btn-primary">
      <i class="fas fa-plus"></i> Nuevo Hotel
    </a>
  </div>

  <table class="table table-hover table-bordered table-sm datatable">
    <thead>
      <tr>
        <th class="no-sort"></th>
        <th>Nombre</th>
        <th>Estrellas</th>
        <th>Descripcion</th>
        <th>Ciudad</th>
      </tr>
    </thead>
    <tbody>
      @foreach($hoteles as $hotel)
      <tr>
        <td>
          <a class="btn btn-sm btn-info" href="/hoteles/{{ $hotel->id }}">
            <i class="fas fa-eye"></i>
          </a>
        </td>
        <td>{{ $hotel->nombre }}</td>
        <td>{{ $hotel->estrellas }}</td>
        <td>{{ $hotel->descripcion }}</td>
        <td>{{ $hotel->ciudad->nombre }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection