
<div class="card bg-light">
	<div class="card-header">
		<h2><i class="fas fa-building"></i> Reserva tu Hotel</h2>

	</div>
	<div class="card-body">
		<form action="/reserva_habitaciones" method="get">
			{{ csrf_field() }}
			<div class="form-group form-row align-items-end">
				<div class="col">
					<label for="id_destino">Destino</label>
					<div class="form-group">
						<select id="destino_id" name="destino_id" class="form-control selectpicker" title="Destino" data-live-search="true">
							@foreach ($ciudades as $ciudad)
							<option value="{{ $ciudad->id }}">{{ 
							$ciudad->nombre  . " , " .  
							$ciudad->pais->nombre  }} </option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
				
			
			
			<div class="form-group form-row align-items-end">
				<div class="col">
					<label for="fecha_entrada">Fecha Entrada</label>
					<div class="input-group">
						<input  type="text" id="fecha_entrada" name="fecha_entrada" value="" required class="form-control text-center datepicker" readonly="readonly" >
						<span class="input-group-append">
							<span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
						</span>
					</div>
				</div>


				
				<div class="col-1 text-center fecha-salida">
					<i class="fas fa-arrow-right fa-2x"></i>
				</div>
				
				<div class="col">
					<label for="fecha_salida">Fecha Salida</label>
					<div class="input-group">
						<input  type="text" id="fecha_salida" name="fecha_salida" value="" required class="form-control text-center datepicker" readonly="readonly" >
						<span class="input-group-append">
							<span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
						</span>
					</div>
				</div>
			</div>
			
			<div class="form-group form-row align-items-end">
				<div class="col-5 col-sm-5">
					<label>Habitación</label>
					<div class="row ">
						<div class="col input-group">
							<input type="number" name="capacidad_adultos" class="form-control text-center" value="1">
							<div class="input-group-append">
								<span class="input-group-text">Adultos</span>
							</div>
						</div>
						<div class="col input-group">
							<input type="number" name="capacidad_ninos" class="form-control text-center" value="0">
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
							<input type="number" name="estrellas" class="form-control text-center" value="1" max ="5" min = "1" >
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


<script>



let fechaEntrada = flatpickr('#fecha_entrada', {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    minDate: "today",
});

let fechaSalida = flatpickr('#fecha_salida', {
    enableTime: true,
    dateFormat: "Y-m-d H:i",

});

fechaEntrada.set("onChange", 
	function(d) {
    fechaSalida.set("minDate", d[0].fp_incr(1));
});



</script>
