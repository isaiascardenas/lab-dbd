@extends('layouts.admin')

@section('content')
	<h2>
    <i class="fas fa-plane"></i> Tipo Asientos
  </h2>
	
	<hr>

	@include('layouts.messages')
	
	<div class="form-group">
		<a href="/tipo-asientos/create/" class="btn btn-primary">
      <i class="fas fa-plus"></i> Nuevo Tipo Asiento
    </a>
	</div>

	<table class="table table-hover table-bordered table-sm datatable">
		<thead>
			<tr>
        <th class="no-sort"></th>
				<th>Descripción</th>
				<th>Factor Costo</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tipoAsientos as $tipoAsiento)
			<tr>
				<td>
          <a class="btn btn-sm btn-info" href="/tipo-asientos/{{ $tipoAsiento->id }}">
            <i class="fas fa-eye"></i>
          </a>
        </td>
        <td>{{ $tipoAsiento->descripcion }}</td>
				<td>{{ $tipoAsiento->factor_costo }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection