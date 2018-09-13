<div class="card bg-light">
    <div class="card-header">
        <h2><i class="fas fa-bus"></i> Reserva tu traslado </h2>
    </div>
    <div class="card-body">
        <form action="/reserva-traslados/" method="post">
            {{ csrf_field() }}

            <div class="form-group form-row align-items-end">
                <div class="col-3 form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="tipo_traslado" id="tipo_traslado" value="1" checked>
                    <label for="Hotel-Aeropuerto" class="form-check-label">Hotel-Aeropuerto</label>
                </div>

                <div class="col-3 form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="tipo_traslado" id="tipo_traslado" value="0">
                    <label for="Aeropuerto-Hotel" class="form-check-label">Aeropuerto-Hotel</label>
                </div>
            </div>

        <div class="H-A">
            <div class="form-group form-row align-items-end">
                <div class="col">
                    <label for="hotel_id">Origen</label>
                    <div class="form-group">
                        <select id="origen_id_1" name="hotel_id_1" class="form-control selectpicker" title="Hotel" data-live-search="true">
                            @foreach ($hoteles as $hotel)
                                <option value="{{ $hotel->id }}">
                                {{ $hotel->nombre }}, {{ $hotel->ciudad->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col">
                    <label for="aeropuerto_id">Destino</label>
                    <div class="form-group">
                        <select id="destino_id_1" name="aeropuerto_id_1" class="form-control selectpicker" title="Aeropuerto" data-live-search="true">
                            @foreach ($aeropuertos as $aeropuerto)
                                <option value="{{ $aeropuerto->id }}">
                                {{ $aeropuerto->nombre }} ({{ $aeropuerto->codigo }}), {{ $aeropuerto->ciudad->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="A-H">
            <div class="form-group form-row align-items-end">
                <div class="col">
                    <label for="hotel_id">Origen</label>
                    <div class="form-group">
                        <select id="origen_id_0" name="aeropuerto_id_0" class="form-control selectpicker" title="Aeropuerto" data-live-search="true">
                            @foreach ($aeropuertos as $aeropuerto)
                                <option value="{{ $aeropuerto->id }}">
                                {{ $aeropuerto->nombre . ", " . $aeropuerto->codigo }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col">
                    <label for="aeropuerto_id">Destino</label>
                    <div class="form-group">
                        <select id="destino_id_0" name="hotel_id_0" class="form-control selectpicker" title="Hotel" data-live-search="true">
                            @foreach ($hoteles as $hotel)
                                <option value="{{ $hotel->id }}">
                                {{ $hotel->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

            <div id="fechas_traslados" class="form-group form-row align-items-end">
                <div class="col">
                    <label for="">Fecha</label>
                    <div class="input-group">
                        <input type="text" id="fecha_traslado" name="fecha_traslado" class="form-control text-center" readonly="readonly">
                        <span class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="form-group form-row align-items-end">
                <div class="col">
                    <label>Pasajeros</label>
                    <div class="row">
                        <div class="col input-group">
                            <input type="number" name="capacidad" class="form-control text-right" value="1">
                            <div class="input-group-append">
                                <span class="input-group-text">Cantidad Pasajeros</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">Busca tu traslado</button>
        </form>
    </div>
</div>

<script>
    $(".A-H").hide();
    let fechaInicioT = flatpickr('#fecha_traslado', {
        enableTime: false,
        dateFormat: "d-m-Y",
        minDate: "today",
    });

    $("input[name=tipo_traslado]").change(function(){
      var $hotelAero = $(".H-A");
      var $AeroHotel = $(".A-H");
      if(this.value == "0"){
        $hotelAero.hide();
        $AeroHotel.show();
      } else {
        $AeroHotel.hide();
        $hotelAero.show();
      }
  });


</script>
