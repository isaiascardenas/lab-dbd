@extends('layouts.admin')

@section('content')
	<h2>
    <i class="fas fa-user"></i> Pasajeros
  </h2>
	
	<hr>

	@include('layouts.messages')
	
	<div class="form-group">
		<a href="/pasajeros/create/" class="btn btn-primary">
      <i class="fas fa-plus"></i> Nuevo Pasajero
    </a>
	</div>

	<table class="table table-hover table-bordered table-sm datatable">
		<thead>
			<tr>
        <th class="no-sort"></th>
				<th>Nombre</th>
				<th>Rut</th>
        <th>Reserva Boleto</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pasajeros as $pasajero)
			<tr>
				<td>
          <a class="btn btn-sm btn-info" href="/pasajeros/{{ $pasajero->id }}">
            <i class="fas fa-eye"></i>
          </a>
        </td>
        <td>{{ $pasajero->nombre }}</td>
				<td>{{ $pasajero->rut }}</td>
        <td>{{ $pasajero->reserva_boleto_id }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection