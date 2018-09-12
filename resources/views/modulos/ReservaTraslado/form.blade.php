<div class="card bg-light">
    <div class="card-header">
        <h2><i class="fas fa-calendar-alt"></i> Reserva tu traslado </h2>
    </div>
    <div class="card-body">
        <form action="/reserva-traslados" method="post">
            {{ csrf_field() }}

            <div class="form-group form-row align-items-end">
                <div class="col">
                    <label for="ciudad_id">Ubicación</label>
                    <div class="form-group">
                        <select id="ciudad_id" name="ciudad_id" class="form-control selectpicker" title="Ciudad" data-live-search="true">
                            @foreach ($ciudades as $ciudad)
                                <option value="{{ $ciudad->id }}">
                                {{ $ciudad->nombre . ", " . $ciudad->pais->nombre }}
                                </option>
                            @endforeach
                        </select>
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
    let fechaIniciof = flatpickr('#fecha_traslado', {
        enableTime: false,
        dateFormat: "d-m-Y",
        minDate: "today",
    });
</script>
