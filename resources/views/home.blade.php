@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-3">
			<div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
				<a class="nav-link active" id="vuelo-tab" data-toggle="pill" href="#vuelo" role="tab" aria-controls="vuelo" aria-selected="true"><i class="fas fa-plane"></i> Reserva Vuelo</a>
				<a class="nav-link" id="hotel-tab" data-toggle="pill" href="#hotel" role="tab" aria-controls="hotel" aria-selected="false"><i class="fas fa-building"></i> Hoteler&iacute;a</a>
				<a class="nav-link" id="auto-tab" data-toggle="pill" href="#auto" role="tab" aria-controls="auto" aria-selected="false"><i class="fas fa-car"></i> Reserva Automovil</a>
				<a class="nav-link" id="actividad-tab" data-toggle="pill" href="#actividad" role="tab" aria-controls="actividad" aria-selected="false"><i class="fas fa-tasks"></i> Actividad</a>
			</div>
		</div>
		<div class="col-9">
			<div class="tab-content">
				<div class="tab-pane fade show active" id="vuelo" role="tabpanel" aria-labelledby="vuelo-tab">
					@include('modulos.ReservaVuelo.form')
				</div>
				<div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
					{{-- @include('modulos.ReservaHotel.form'); --}}
				</div>
				<div class="tab-pane fade" id="auto" role="tabpanel" aria-labelledby="auto-tab">
					@include('modulos.ReservaAuto.form')
				</div>
				<div class="tab-pane fade" id="actividad" role="tabpanel" aria-labelledby="actividad-tab">
					{{-- @include('modulos.ReservaActividad.form'); --}}
				</div>
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
		$('.gijgo-datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });

        $('.select2').select2();

		$("[data-hide-target]").on('change', function(){
			console.log('asdf');
			var $target = $($(this).data('hide-target'));

			if ($(this).is(':checked')){
				$target.hide();
			} else {
				$target.show();
			}
			
		});
	</script>
@endsection
