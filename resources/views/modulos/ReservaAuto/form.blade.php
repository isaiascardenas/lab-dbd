<div class="card bg-light">
	<div class="card-header">
		<h2><i class="fas fa-car"></i> Reserva tu auto </h2>
	</div>
	<div class="card-body">
		<form action="/vuelo/list" method="post">
			{{ csrf_field() }}
			
			<div class="form-group form-row align-items-end">				
				<div class="col">
					<label for="id_destino">Cuidad</label>
					<div class="form-group">
						<select id="id_destino" name="id_destino" class="form-control select2" placeholder="Destino">
							@foreach ($ciudades as $ciudad)
							<option value="{{ $ciudad->id }}">{{ $ciudad->ciudad . ", " . $ciudad->aeropuerto }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			
			<div class="form-group form-row align-items-end">
				<div class="col">
					<label for="fecha_ida">Fecha retiro</label>
					<input type="text" id="fecha_ida" name="fecha_ida" class="form-control gijgo-datepicker">
				</div>
				
				<div class="col vuelo-vuelta">
					<label for="fecha_vuelta">Fecha entrega</label>
					<input type="text" id="fecha_vuelta" name="fecha_vuelta" class="form-control gijgo-datepicker">
				</div>
			</div>
			
			<div class="form-group form-row align-items-end">
				<div class="col">
					<label>Pasajeros</label>
					<div class="row">
						<div class="col input-group">
							<input type="number" name="pasajeros" class="form-control text-right" value="1">
							<div class="input-group-append">
								<span class="input-group-text">Adultos</span>
							</div>
						</div>
						<div class="col input-group">
							<input type="number" name="pasajeros" class="form-control text-right" value="0">
							<div class="input-group-append">
								<span class="input-group-text">Ni&ntilde;os</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-1"></div>
				<div class="col">
					<label for="">Tipo Pasaje</label>
					<select name="tipo_pasaje" class="form-control">
						@foreach ($data["tipoPasaje"] as $pasaje)
						<option value="{{ $pasaje["id"] }}">{{ $pasaje["descripcion"] }}</option>
						@endforeach
					</select>
				</div>
			</div>
			
			<button type="submit" class="btn btn-primary btn-lg btn-block">Busca tu vuelo</button>
		</form>
	</div>
</div>
