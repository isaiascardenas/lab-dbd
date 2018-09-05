@extends('layouts.admin')

@section('content')
  <h2>
    <i class="fas fa-map-marker-alt"></i> Editar Actividad #{{ $actividad->id }}
  </h2>
  
  <hr>
  
  @include('layouts.messages')

  <form method="post" action="{{ action('ReservaActividad\ActividadesController@update', $actividad->id) }}">
    {{ csrf_field() }}

    <input name="_method" type="hidden" value="PATCH">


    <div class="form-group row">
      <label class="col-3" for="nombre">Descripcion</label>
      <div class="col-9">
        <textarea class="form-control" name="descripcion" id="descripcion">{{ $actividad->descripcion }}"</textarea>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-3" for="nombre">Ubicacion</label>
        <div class="col-9">
            <div class="form-group">
                <select id="ubicacion_id" name="ciudad_id" class="form-control selectpicker" title="Ciudad" data-live-search="true" value="{{ $actividad->ciudad->id }}">
                    @foreach ($ciudades as $ciudad)
                    <option value="{{ $ciudad->id }}" {{ $actividad->ciudad_id == $ciudad->id?'selected':'' }}>
                        {{ $ciudad->nombre . ", " . $ciudad->pais->nombre }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>





    <div class="form-group form-row align-items-end">
        <div class="col">
            <label>Pasajeros</label>
            <div class="row">
                <div class="col input-group">
                    <input type="number" name="max_adultos" class="form-control text-right" value="1" value="{{ $actividad->max_adultos }}">
                    <div class="input-group-append">
                        <span class="input-group-text">Máx Adultos</span>
                    </div>
                </div>
                <div class="col input-group">
                    <input type="number" name="max_ninos" class="form-control text-right" value="0" value="{{ $actividad->max_ninos }}">
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
                    <input type="number" name="costo_adulto" class="form-control text-right" value="1" value="{{ $actividad->costo_adulto }}">
                    <div class="input-group-append">
                        <span class="input-group-text">Precio Adultos</span>
                    </div>
                </div>
                <div class="col input-group">
                    <input type="number" name="costo_nino" class="form-control text-right" value="0" value="{{ $actividad->costo_nino }}">
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
                <input type="text" id="datepicker" name="fecha_inicio" class="form-control text-center datepicker" readonly="readonly" value="{{ $actividad->fecha_inicio }}">
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
                <input type="text" id="datepicker" name="fecha_termino" class="form-control text-center datepicker fecha_termino" readonly="readonly" value="{{ $actividad->fecha_termino }}">
                <span class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </span>
            </div>
        </div>
    </div>



    <div class="text-right">
      <a href="/actividades/{{ $actividad->id }}" class="btn btn-info">
        <i class="fas fa-ban"></i> Cancelar
      </a>
      <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Actualizar
      </button>
    </div>
  </form>
@endsection

@section('script')
    <script>

        $('#fechas_actividades').datepicker({
            autoclose: true,
            clearBtn: true,
            endDate: '',
            format: 'dd-mm-yyyy',
            inputs: $('.datepicker'),
            todayHighlight: true
        });
    </script>
@endsection 