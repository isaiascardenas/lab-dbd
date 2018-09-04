@extends('layouts.admin')

@section('content')
	<h2>
    <i class="fas fa-map-marker-alt"></i> Aeropuertos
  </h2>
	
	<hr>

	@include('layouts.messages')
	
	<div class="form-group">
		<a href="/aeropuertos/create/" class="btn btn-primary">
      <i class="fas fa-plus"></i> Nuevo Aeropuerto
    </a>
	</div>

	<table class="table table-hover table-bordered table-sm datatable">
		<thead>
			<tr>
				<th class="no-sort"></th>
				<th>Código</th>
				<th>Nombre</th>
				<th>Dirección</th>
				<th>Ciudad</th>
			</tr>
		</thead>
		<tbody>
			@foreach($aeropuertos as $aeropuerto)
			<tr>
				<td>
          <a class="btn btn-sm btn-info" href="/aeropuertos/{{ $aeropuerto->id }}">
            <i class="fas fa-eye"></i>
          </a>
        </td>
				<td>{{ $aeropuerto->codigo }}</td>
				<td>{{ $aeropuerto->nombre }}</td>
				<td>{{ $aeropuerto->direccion }}</td>
				<td>{{ $aeropuerto->ciudad->nombre .', '. $aeropuerto->ciudad->pais->nombre }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection