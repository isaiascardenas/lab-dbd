<div class="card bg-light">
	<div class="card-header">
		<h2><i class="fas fa-plane"></i> Reserva tu vuelo</h2>
	</div>
	<div class="card-body">
		<form action="/vuelo" method="post">
			{{ csrf_field() }}
			
			<div class="form-group form-row align-items-end">
				<div class="col">
					<label for="id_origen">Origen</label>
					<div class="form-group">
						<select id="id_origen" name="id_origen" class="form-control select2" placeholder="Origen">
							@foreach ($data["localizacion"] as $localizacion)
							<option value="{{ $localizacion["id"] }}">{{ $localizacion["ciudad"] . ", " . $localizacion["aeropuerto"] }}</option>
							@endforeach
						</select>
					</div>
				</div>
				
				<div class="col-1 text-center">
					<i class="fas fa-arrow-right fa-2x"></i>
				</div>
				
				<div class="col">
					<label for="id_destino">Destino</label>
					<div class="form-group">
						<select id="id_destino" name="id_destino" class="form-control select2" placeholder="Destino">
							@foreach ($data["localizacion"] as $localizacion)
							<option value="{{ $localizacion["id"] }}">{{ $localizacion["ciudad"] . ", " . $localizacion["aeropuerto"] }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			
			<div class="form-group form-row align-items-end">
				<div class="col-3 form-check form-check-inline">
					<input type="radio" class="form-check-input" name="tipo_vuelo" id="vuelo_ida_vuelta" value="1" checked>
					<label for="vuelo_ida_vuelta" class="form-check-label">Ida y vuelta</label>
				</div>
				
				<div class="col-3 form-check form-check-inline">
					<input type="radio" class="form-check-input" name="tipo_vuelo" id="vuelo_solo_ida" value="0" data-hide-target=".vuelo-vuelta">
					<label for="vuelo_solo_ida" class="form-check-label">Solo ida</label>
				</div>
			</div>
			
			<div class="form-group form-row align-items-end">
				<div class="col">
					<label for="fecha_ida">Fecha Ida</label>
					<input type="text" id="fecha_ida" name="fecha_ida" class="form-control gijgo-datepicker">
				</div>
				
				<div class="col-1 text-center vuelo-vuelta">
					<i class="fas fa-arrow-right fa-2x"></i>
				</div>
				
				<div class="col vuelo-vuelta">
					<label for="fecha_vuelta">Fecha Vuelta</label>
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