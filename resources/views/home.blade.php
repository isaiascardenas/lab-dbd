@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-3">
			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-plane"></i> Reserva Vuelo</a>
				<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-building"></i> Hoteler&iacute;a</a>
				<!-- a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a -->
			</div>
		</div>
		<div class="col-9">
			<div class="tab-content">
				<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
					<h2><i class="fas fa-plane"></i> Reserva tu vuelo</h2>
					<form action="/vuelo/list" method="post">
						<div class="form-group form-row align-items-end">
							<div class="col-5">
								<label for="id_origen">Origen</label>
								<select id="id_origen" name="id_origen" class="form-control" placeholder="Origen">
									@foreach ($data["localizacion"] as $localizacion)
									<option value="{{ $localizacion["id"] }}">{{ $localizacion["pais"] . ", " . $localizacion["nombre"] }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-2 text-center">
								<i class="fas fa-arrow-right fa-2x"></i>
							</div>
							<div class="col-5">
								<label for="id_destino">Destino</label>
								<select id="id_destino" name="id_destino" class="form-control" placeholder="Destino">
									@foreach ($data["localizacion"] as $localizacion)
									<option value="{{ $localizacion["id"] }}">{{ $localizacion["pais"] . ", " . $localizacion["nombre"] }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group form-row align-items-end">
							<div class="col-3 form-check form-check-inline">
								<input type="radio" class="form-check-input" name="tipo_vuelo" id="vuelo_ida_vuelta" checked>
								<label for="vuelo_ida_vuelta" class="form-check-label">Ida y vuelta</label>
							</div>
							<div class="col-3 form-check form-check-inline">
								<input type="radio" class="form-check-input" name="tipo_vuelo" id="vuelo_solo_ida">
								<label for="vuelo_solo_ida" class="form-check-label">Solo ida</label>
							</div>
						</div>
						<div class="form-group form-row align-items-end">
							<div class="col-5">
								<label for="">Fecha Ida</label>
								<input type="text" class="form-control gijgo-datepicker">
							</div>
							<div class="col-2 text-center">
								<i class="fas fa-arrow-right fa-2x"></i>
							</div>
							<div class="col-5">
								<label for="">Fecha Vuelta</label>
								<input type="text" class="form-control gijgo-datepicker">
							</div>
						</div>
						<div class="form-group form-row align-items-end">
							<div class="col-5">
								<label for="">Pasajeros</label>
								<input type="text" class="form-control">
							</div>
							<div class="offset-2 col-5">
								<label for="">Tipo Pasaje</label>
								<select name="tipo_pasaje" class="form-control">
									@foreach ($data["tipoPasaje"] as $pasaje)
									<option value="{{ $pasaje["id"] }}">{{ $pasaje["descripcion"] }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-lg btn-block">Buscar tu vuelo</button>
						</div>
					</form>
				</div>
				<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
					<h2><i class="fas fa-building"></i> Hoteleria</h2>
					<form action="/hotel/list" method="post">
						<div class="form-group form-row">
							<div class="col">
								<label for="id_origen">Ciudad</label>
								<select id="id_origen" name="id_origen" class="form-control" placeholder="Origen">
									@foreach ($data["localizacion"] as $localizacion)
									<option value="{{ $localizacion["id"] }}">{{ $localizacion["pais"] . ", " . $localizacion["nombre"] }}</option>
									@endforeach
								</select>
							</div>
							<div class="col">
								<label for="id_destino">Destino</label>
								<select id="id_destino" name="id_destino" class="form-control" placeholder="Destino">
									@foreach ($data["localizacion"] as $localizacion)
									<option value="{{ $localizacion["id"] }}">{{ $localizacion["pais"] . ", " . $localizacion["nombre"] }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-lg btn-block">Buscar tu vuelo</button>
						</div>
					</form>
				</div>
				<!-- div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div -->
			</div>
		</div>
	</div>

	<h3><i class="fas fa-cubes"></i> Paquetes</h3>
	<div id="carouselPaquetes" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselPaquetes" data-slide-to="0" class="active"></li>
			<li data-target="#carouselPaquetes" data-slide-to="1"></li>
			<li data-target="#carouselPaquetes" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			@foreach ($data["paquetes"] as $paquete)
			<div class="carousel-item {{ $paquete["class"] }}">
				<img class="img-fluid" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_163b1aaecbb%20text%20%7B%20fill%3A%23555%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_163b1aaecbb%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22285.921875%22%20y%3D%22218.3%22%3EFirst%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="{{ $paquete["destino"] }}">
				<a href="/paquete/{{ $paquete["id"] }}">
					<div class="carousel-caption d-none d-md-block">
						<h5>{{ $paquete["destino"] }}</h5>
						<p>{{ $paquete["valor"] }}</p>
					</div>
				</a>
			</div>
			@endforeach
		</div>
		<a class="carousel-control-prev" href="#carouselPaquetes" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Anterior</span>
		</a>
		<a class="carousel-control-next" href="#carouselPaquetes" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Siguiente</span>
		</a>
	</div>
@endsection

@section('script')
	<script>
			$(".gijgo-datepicker").datepicker({
				uiLibrary: 'bootstrap4'
			});
		$(document).ready(function(){
		});
	</script>
@endsection
