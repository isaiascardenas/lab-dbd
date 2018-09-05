<div class="card bg-light">
    <div class="card-header">
        <h2><i class="fas fa-plane"></i> Reserva tu vuelo</h2>
    </div>
    <div class="card-body">
        <form action="/vuelos/" method="post">
            {{ csrf_field() }}

            <div class="form-group form-row align-items-end">
                <div class="col">
                    <label for="origen_id">Origen</label>
                    <div class="form-group">
                        <select id="origen_id" name="origen_id" class="form-control selectpicker" title="Origen" data-live-search="true">
                            @foreach ($aeropuertos as $aeropuerto)
                            <option value="{{ $aeropuerto->id }}">{{ "(" . $aeropuerto->codigo . ") " . $aeropuerto->ciudad->nombre . ", " . $aeropuerto->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-1 text-center">
                    <i class="fas fa-arrow-right fa-2x"></i>
                </div>

                <div class="col">
                    <label for="destino_id">Destino</label>
                    <div class="form-group">
                        <select id="destino_id" name="destino_id" class="form-control selectpicker" title="Destino" data-live-search="true">
                            @foreach ($aeropuertos as $aeropuerto)
                            <option value="{{ $aeropuerto->id }}">{{ "(" . $aeropuerto->codigo . ") " . $aeropuerto->ciudad->nombre . ", " . $aeropuerto->nombre }}</option>
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
                    <input type="radio" class="form-check-input" name="tipo_vuelo" id="vuelo_solo_ida" value="0">
                    <label for="vuelo_solo_ida" class="form-check-label">Solo ida</label>
                </div>
            </div>

            <div id="fechas_vuelo" class="form-group form-row align-items-end fechas-vuelo">
                <div class="col">
                    <label for="fecha_ida">Fecha Ida</label>
                    <div class="input-group">
                        <input type="text" id="fecha_ida" name="fecha_ida" class="form-control text-center datepicker" readonly="readonly">
                        <span class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </span>
                    </div>
                </div>

                <div class="col-1 text-center">
                    <i class="fas fa-arrow-right fa-2x vuelo-vuelta"></i>
                </div>

                <div class="col">
                    <label for="fecha_vuelta" class="vuelo-vuelta">Fecha Vuelta</label>
                    <div class="input-group">
                        <input type="text" id="fecha_vuelta" name="fecha_vuelta" class="form-control text-center datepicker vuelo-vuelta" readonly="readonly">
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
                            <input type="number" name="pasajeros_adultos" class="form-control text-right" value="1">
                            <div class="input-group-append">
                                <span class="input-group-text">Adultos</span>
                            </div>
                        </div>
                        <div class="col input-group">
                            <input type="number" name="pasajeros_ninos" class="form-control text-right" value="0">
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
                        @foreach ($tipoPasaje as $pasaje)
                        <option value="{{ $pasaje["id"] }}">{{ $pasaje["descripcion"] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">Busca tu vuelo</button>
        </form>
    </div>
</div>
