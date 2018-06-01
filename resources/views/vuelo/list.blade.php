@extends('layouts.app')

@section('content')
	@foreach($vuelos as $vuelo)
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">{{ $vuelo->codigo }}</h5>
			<h6 class="card-subtitle mb-2 text-muted">{{ $vuelo->aerolinea }}</h6>
			<p class="card-text">{{ $vuelo->fecha }}</p>
			<a href="#" class="card-link">Card link</a>
		</div>
	</div>
	@endforeach
@endsection