
<!----integrar Jquery para datePiker y select2  --->

<div class="card bg-light">
	<div class="card-header">
		<h2><i class="fas fa-building"></i> Reserva tu Hotel</h2>

	</div>
	<div class="card-body">
		<form action="/hotel/index" method="post">
			{{ csrf_field() }}
			
			<div class="form-group form-row align-items-end">
				<div class="col">
					<label for="id_destino">Destino</label>
					<div class="form-group">
						<input id="id_destino" name="id_destino" class="form-control select2" placeholder="Escribe tu lugar de destino...">
						</input>
					</div>
				</div>
			</div>
				
			
			
			<div class="form-group form-row align-items-end">
				<div class="col">
					<label for="fecha_entrada">Fecha Entrada</label>
					<input type="text" id="fecha_entrada" name="fecha_entrada" class="form-control gijgo-datepicker">
				</div>
				
				<div class="col-1 text-center fecha-salida">
					<i class="fas fa-arrow-right fa-2x"></i>
				</div>
				
				<div class="col fecha-salida">
					<label for="fecha_salida">Fecha Salida</label>
					<input type="text" id="fecha_salida" name="fecha_salida" class="form-control gijgo-datepicker">
				</div>
			</div>
			
			<div class="form-group form-row align-items-end">
				<div class="col-5 col-sm-5">
					<label>Habitación</label>
					<div class="row ">
						<div class="col input-group">
							<input type="number" name="capacidad" class="form-control text-center" value="1">
							<div class="input-group-append">
								<span class="input-group-text">Adultos</span>
							</div>
						</div>
						<div class="col input-group">
							<input type="number" name="capacidad" class="form-control text-center" value="0">
							<div class="input-group-append">
								<span class="input-group-text">Ni&ntilde;os</span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-3 col-sm-2"> </div>


				<div class="col-2">
					<label>Estrellas</label>
					<div class="row">
						<div class="col input-group">
							<input type="number" name="capacidad" class="form-control text-center" value="1" max ="5" min = "1" >
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="fas fa-star"></i>
								</span>
							</div>
						</div>
						
					</div>
				</div>
				
			</div>
			
			<button type="submit" class="btn btn-primary btn-lg btn-block">Busca tu Hotel</button>
		</form>
	</div>
</div>