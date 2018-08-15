@extends('layouts.admin')

@section('content')
	<h2>
    <i class="fas fa-plane"></i> Aviones
  </h2>
	
	<hr>

	@include('layouts.messages')
	
	<div class="form-group">
		<a href="/aviones/create/" class="btn btn-primary">
      <i class="fas fa-plus"></i> Nuevo Avión
    </a>
	</div>

	<table class="table table-hover table-bordered table-sm">
		<thead>
			<tr>
        <th></th>
				<th>Modelo</th>
				<th>Aerolinea</th>
			</tr>
		</thead>
		<tbody>
			@foreach($aviones as $avion)
			<tr>
				<td>
          <a class="btn btn-sm btn-info" href="/aviones/{{ $avion->id }}">
            <i class="fas fa-eye"></i>
          </a>
        </td>
				<td>{{ $avion->modelo }}</td>
				<td>
          <a href="/aerolineas/{{ $avion->aerolinea->id }}">
            {{ $avion->aerolinea->nombre }}
          </a>
        </td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{{ $aviones->links() }}
	</div>
@endsection