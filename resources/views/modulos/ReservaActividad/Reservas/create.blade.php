@extends('layouts.admin')

@section('content')
    <h2>
        <i class="fas fa-map-marker-alt"></i> Nueva Actividad
    </h2>
    
    <hr>
    
    @include('layouts.messages')

    <form method="post" action="{{ action('ReservaActividad\ActividadesController@store') }}">
        {{ csrf_field() }}
        
        <div class="form-group row">
          <label class="col-3" for="nombre">Descripcion</label>
          <div class="col-9">
            <textarea class="form-control" name="descripcion" id="descripcion"></textarea>
          </div>
        </div>


        <div class="form-group row">
            <label class="col-3" for="nombre">Ubicacion</label>
            <div class="col-9">
                <div class="form-group">
                    <select id="ubicacion_id" name="ciudad_id" class="form-control selectpicker" title="Ciudad" data-live-search="true">
                        @foreach ($ciudades as $ciudad)
                            <option value="{{ $ciudad->id }}">
                                {{ $ciudad->nombre . ", " . $ciudad->pais->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>





        <div class="form-group form-row align-items-end">
            <div class="col">
                <label>Integrantes</label>
                <div class="row">
                    <div class="col input-group">
                        <input type="number" name="max_adultos" class="form-control text-right" value="1">
                        <div class="input-group-append">
                            <span class="input-group-text">Máx Adultos</span>
                        </div>
                    </div>
                    <div class="col input-group">
                        <input type="number" name="max_ninos" class="form-control text-right" value="0">
                        <div class="input-group-append">
                            <span class="input-group-text">Máx Ni&ntilde;os</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group form-row align-items-end">
            <div class="col">
                <label>Precios</label>
                <div class="row">
                    <div class="col input-group">
                        <input type="number" name="costo_adulto" class="form-control text-right" value="1">
                        <div class="input-group-append">
                            <span class="input-group-text">Precio Adultos</span>
                        </div>
                    </div>
                    <div class="col input-group">
                        <input type="number" name="costo_nino" class="form-control text-right" value="0">
                        <div class="input-group-append">
                            <span class="input-group-text">Precio Ni&ntilde;os</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div id="fechas_actividades" class="form-group form-row align-items-end">
            <div class="col">
                <label for="fecha_ida">Fecha Inicio</label>
                <div class="input-group">
                    <input type="text" id="fecha_comienzoca" name="fecha_inicio" class="form-control text-center" readonly="readonly">
                    <span class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </span>
                </div>
            </div>

            <div class="col-1 text-center">
                <i class="fas fa-arrow-right fa-2x fecha_termino"></i>
            </div>

            <div class="col">
                <label for="fecha_vuelta" class="fecha_termino">Fecha Termino</label>
                <div class="input-group">
                    <input type="text" id="fecha_llegadaca" name="fecha_termino" class="form-control text-center" readonly="readonly" >
                    <span class="input-group-append">
                        <spa2018-09-07 21:01:53n class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </span>
                </div>
            </div>
        </div>


        <div class="text-right">
            <a href="/actividades/" class="btn btn-info">
                <i class="fas fa-ban"></i> Cancelar
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Guardar
            </button>
        </div>
    </form>
@endsection



@section('script')
    <script>
        let fechaTermino = flatpickr('#fecha_llegadaca', {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });

        let fechaInicio = flatpickr('#fecha_comienzoca', {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            minDate: "today",
        });

        fechaInicio.set("onChange", function(d) {
            fechaTermino.set("minDate", d[0]);
        });
    </script>
@endsection