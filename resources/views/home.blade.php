@extends('layouts.app')

@section('content')
  <style>
    #carouselPaquetes .carousel-caption {
      background: rgba(0, 0, 0, 0.7);
      left: 0;
      right: 0;
      bottom: 0;
    }
  </style>

  <div id="carouselPaquetes" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      @for ($i = 0; $i < count($paquetesVH); $i++)
        <li data-target="#carouselPaquetes" data-slide-to="{{ $i }}" {{ $i == 0 ? 'class="active"' : '' }}></li>
      @endfor
    </ol>

    <div class="carousel-inner">
      @foreach ($paquetesVH as $paquete)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
          <img src="https://picsum.photos/1110/400?image={{ mt_rand(1, 50) }}" alt="">
          <a href="/paquetes/1/{{ $paquete->id }}">
            <div class="carousel-caption d-none d-md-block">
              <h3>
                {{ $paquete->reservaBoletos[0]->tramo->precio(TRUE) }}
              </h3>
              <p>
                {{ $paquete->reservaBoletos[0]->tramo->origen->ciudad->nombre }}, 
                {{ $paquete->reservaBoletos[0]->tramo->origen->ciudad->pais->nombre }}
                por
                {{ $paquete->reservaHabitacion->duracion() }} día(s)
              </p>
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
  <br>
  <div class="row">
      <div class="col-3">
          <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
              <a class="nav-link active" id="vuelo-tab" data-toggle="pill" href="#vuelo" role="tab" aria-controls="vuelo" aria-selected="true">
                <i class="fas fa-plane"></i> Vuelos
              </a>
              <a class="nav-link" id="hotel-tab" data-toggle="pill" href="#hotel" role="tab" aria-controls="hotel" aria-selected="false">
                <i class="fas fa-building"></i> Hoteles
              </a>
              <a class="nav-link" id="auto-tab" data-toggle="pill" href="#auto" role="tab" aria-controls="auto" aria-selected="false">
                <i class="fas fa-car"></i> Automóviles
              </a>
              <a class="nav-link" id="actividad-tab" data-toggle="pill" href="#actividad" role="tab" aria-controls="actividad" aria-selected="false">
                <i class="fas fa-calendar-alt"></i> Actividades
              </a>
              <a class="nav-link" id="traslado-tab" data-toggle="pill" href="#traslado" role="tab" aria-controls="traslado" aria-selected="false">
                <i class="fas fa-bus"></i> Traslados
              </a>
              <a class="nav-link" href="/paquetes">
                <i class="fas fa-cubes"></i> Paquetes
              </a>
          </div>
      </div>
      <div class="col-9">
          <div class="tab-content">
              <div class="tab-pane fade show active" id="vuelo" role="tabpanel" aria-labelledby="vuelo-tab">
                  @include('modulos.ReservaVuelo.vuelos.form')
              </div>
              <div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
                  @include('modulos.ReservaHabitacion.form');
              </div>
              <div class="tab-pane fade" id="auto" role="tabpanel" aria-labelledby="auto-tab">
                  @include('modulos.ReservaAuto.form')
              </div>
              <div class="tab-pane fade" id="actividad" role="tabpanel" aria-labelledby="actividad-tab">
                  @include('modulos.ReservaActividad.form')
              </div>
              <div class="tab-pane fade" id="traslado" role="tabpanel" aria-labelledby="traslado-tab">
                  @include('modulos.ReservaTraslado.form')
              </div>
          </div>
      </div>
  </div>

@endsection

@section('script')
<script>
  $('select.selectpicker').selectpicker({
      noneSelectedText: 'No se ha seleccionado nada',
      noneResultsText: 'Ningún resultado coincide con {0}',
      selectOnTab: true
  });

  $("input[name=tipo_vuelo]").change(function(){
      var $target = $(".vuelo-vuelta");
      if(this.value == "0"){
        $target.hide();
      } else {
        $target.show();
      }
  });
</script>
@endsection
