<div class="card bg-light">
    <div class="card-header">
        <h2><i class="fas fa-calendar-alt"></i> Reserva tu actividad </h2>
    </div>
    <div class="card-body">
        <form action="/reserva_actividades" method="post">
            {{ csrf_field() }} 

            <div class="form-group form-row align-items-end">
                <div class="col">
                    <label for="ubicacion_id">Ubicación</label>
                    <div class="form-group">
                        <select id="ubicacion_id" name="ciudad_id" class="form-control selectpicker" title="Ciudad" data-live-search="true">
                            @foreach ($actividades as $actividad)
                            <option value="{{ $actividad->id }}">{{ $actividad->ciudad->nombre . ", " . $actividad->ciudad->pais->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <div id="fechas_actividades" class="form-group form-row align-items-end">
                <div class="col">
                    <label for="fecha_ida">Fecha Inicio</label>
                    <div class="input-group">
                        <input type="text" id="fecha_comienzofa" name="fecha_inicio" class="form-control text-center" readonly="readonly">
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
                        <input type="text" id="fecha_llegadafa" name="fecha_termino" class="form-control text-center" readonly="readonly" >
                        <span class="input-group-append">
                            <spa2018-09-07 21:01:53n class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </span>
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

            <button type="submit" class="btn btn-primary btn-lg btn-block">Busca tu actividad</button>
        </form>
    </div>
</div>

<script>
        let fechaTerminof = flatpickr('#fecha_llegadafa', {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });

        let fechaIniciof = flatpickr('#fecha_comienzofa', {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            minDate: "today",
        });

        fechaInicio.set("onChange", function(d) {
            fechaTermino.set("minDate", d[0]);
        });
</script>