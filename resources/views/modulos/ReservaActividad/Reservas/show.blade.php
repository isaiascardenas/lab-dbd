@extends('layouts.admin')

@section('content')
	<h2>
    <i class="fas fa-map-marker-alt"></i> Actividad #{{ $actividad->id }}
  </h2>
	
	<hr>

	<div class="form-group row">
		<label class="col-3" for="nombre">Descripcion</label>
		<div class="col-9">{{ $actividad->descripcion }}</div>
	</div>




  <div class="form-group row">
    <label class="col-3" for="nombre">Ubicacion</label>
    <div class="col-9">{{ $actividad->ciudad->nombre }}</div>
  </div>





  <div class="form-group form-row align-items-end">
      <div class="col">
          <label>Pasajeros</label>
          <div class="row">
              <div class="col input-group">
                  <div class="col-9">{{ $actividad->max_adultos }}</div>
                  <div class="input-group-append">
                      <span class="input-group-text">Máx Adultos</span>
                  </div>
              </div>
              <div class="col input-group">
                  <div class="col-9">{{ $actividad->max_ninos }}</div>
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
                  <div class="col-9">{{ $actividad->costo_adulto }}</div>
                  <div class="input-group-append">
                      <span class="input-group-text">Precio Adultos</span>
                  </div>
              </div>
              <div class="col input-group">
                  <div class="col-9">{{ $actividad->costo_nino }}</div>
                  <div class="input-group-append">
                      <span class="input-group-text">Precio Ni&ntilde;os</span>
                  </div>
              </div>
          </div>
      </div>
  </div>




  <div id="fechas_vuelo" class="form-group form-row align-items-end">
      <div class="col">
          <label for="fecha_ida">Fecha Ida</label>
          <div class="input-group">
              <input type="text" id="fecha_ida" name="fecha_ida" class="form-control text-center datepicker" readonly="readonly" value="{{ $actividad->fecha_inicio }}" disabled>
              <span class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
              </span>
          </div>
      </div>

      <div class="col-1 text-center">
          <i class="fas fa-arrow-right fa-2x fecha_termino"></i>
      </div>

      <div class="col">
          <label for="fecha_vuelta" class="fecha_termino">Fecha Vuelta</label>
          <div class="input-group">
              <input type="text" id="fecha_vuelta" name="fecha_vuelta" class="form-control text-center datepicker fecha_termino" readonly="readonly" value="{{ $actividad->fecha_termino }}" disabled>
              <span class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
              </span>
          </div>
      </div>
  </div>



  <div class="form-group row">
    <label class="col-3" for="nombre">Id Ciudad</label>
    <div class="col-9">
      <div class="col-9">{{ $actividad->ciudad_id }}</div>
    </div>
  </div>







	
  <div class="row">
    <div class="col-auto mr-auto">
  		<a href="/actividades/" class="btn btn-info float-left">
        <i class="fas fa-arrow-left"></i> Volver
      </a>
    </div>
  
    <div class="col-auto">
  		<a href="/actividades/{{ $actividad->id }}/edit" class="btn btn-primary">
        <i class="fas fa-edit"></i> Editar
      </a>
    </div>
    
    <div class="auto">
      <form action="{{ action('ReservaActividad\ActividadesController@destroy', $actividad->id) }}" method="POST" onsubmit="return confirm('¿Esta seguro que desea eliminar?')">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger">
          <i class="fas fa-trash-alt"></i> Eliminar
        </button>
      </form>
    </div>
  		
	</div>
@endsection