@extends('layouts.admin')

@section('content')
	<h2>
    <i class="fas fa-map-marker-alt"></i> Actividades
  </h2>
	
	<hr>

	@include('layouts.messages')
	
	<div class="form-group">
		<a href="/actividades/create/" class="btn btn-primary">
      <i class="fas fa-plus"></i> Nueva Actividad
    </a>
	</div>

	<table class="table table-hover table-bordered table-sm datatable">
		<thead>
			<tr>
				<th class="no-sort"></th>
				<th>Descripcion</th>
			</tr>
		</thead>
		<tbody>
			@foreach($actividades as $actividad)
			<tr>
				<td>
          <a class="btn btn-sm btn-info" href="/actividades/{{ $actividad->id }}">
            <i class="fas fa-eye"></i>
          </a>
        </td>
				<td>{{ $actividad->descripcion }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection