@extends('layouts.admin')

@section('content')
	<h2>
    <i class="fas fa-map-marker-alt"></i> Aerol&iacute;neas
  </h2>
	
	<hr>

	@include('layouts.messages')
	
	<div class="form-group">
		<a href="/aerolineas/create/" class="btn btn-primary">
      <i class="fas fa-plus"></i> Nueva Aerol&iacute;nea
    </a>
	</div>

	<table class="table table-hover table-bordered table-sm datatable">
		<thead>
			<tr>
				<th class="no-sort"></th>
				<th>Nombre</th>
			</tr>
		</thead>
		<tbody>
			@foreach($aerolineas as $aerolinea)
			<tr>
				<td>
          <a class="btn btn-sm btn-info" href="/aerolineas/{{ $aerolinea->id }}">
            <i class="fas fa-eye"></i>
          </a>
        </td>
				<td>{{ $aerolinea->nombre }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection