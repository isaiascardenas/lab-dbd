@extends('layouts.admin')

@section('content')
	<h2><i class="fas fa-map-marker-alt"></i> Tramos</h2>
	
	<hr>
	
	@include('layouts.messages')
	
	<div class="form-group">
		<a href="/tramos/create/" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Tramo</a>
	</div>

	<table class="table table-hover table-bordered table-sm">
		<thead>
			<tr>
				<th></th>
				<th>C&oacute;digo</th>
				<th>Fecha Partida</th>
				<th>Fecha Llegada</th>
				<th>Aerolinea</th>
				<th>Aeropuerto Origen</th>
				<th>Aeropuerto Destino</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tramos as $tramo)
			<tr>
				<td><a class="btn btn-sm btn-info" href="/tramos/{{ $tramo->id }}"><i class="fas fa-eye"></i></a></td>
				<td>{{ $tramo->codigo }}</td>
				<td>{{ $tramo->horarioPartida() }}</td>
				<td>{{ $tramo->horarioLlegada() }}</td>
				<td><a href="/aerolineas/{{ $tramo->avion->aerolinea->id }}">{{ $tramo->avion->aerolinea->nombre }}</a></td>
				<td><a href="/aeropuertos/{{ $tramo->origen->id }}">{{ $tramo->origen->nombre }}</a></td>
				<td><a href="/aeropuertos/{{ $tramo->destino->id }}">{{ $tramo->destino->nombre }}</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection