@extends('layouts.app')

@section('content')
	HTML RESERVA DE AVION

	<form action="">
		<div>
			<label for="origen">Origen</label>
			<select name="id_origen" id="">
				<option value="1">Origen 1</option>
				<option value="2">Origen 2</option>
				<option value="3">Origen 3</option>
			</select>
		</div>
		<div>
			<label for="destino">Destino</label>
			<select name="id_destino" id="">
				<option value="1">Destino 1</option>
				<option value="2">Destino 2</option>
				<option value="3">Destino 3</option>
			</select>
		</div>
	</form>
@endsection