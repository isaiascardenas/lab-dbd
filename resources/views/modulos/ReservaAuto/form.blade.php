<div class="card bg-light">
    <div class="card-header">
        <h2><i class="fas fa-car"></i> Reserva tu auto </h2>
    </div>
    <div class="card-body">
        <form action="/reserva-autos" method="post">
            {{ csrf_field() }}

            <div class="form-group form-row align-items-end">
                <div class="col">
                    <label for="ciudad_id">Cuidad</label>
                    <div class="form-group">
                        <select id="ciudad_id" name="ciudad_id" class="form-control selectpicker" title="Ciudad" data-live-search="true">
                            @foreach ($ciudades as $ciudad)
                              <option value="{{ $ciudad->id }}">
                                {{ $ciudad->nombre }}, {{ $ciudad->pais->nombre }}
                              </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group form-row align-items-end">
                <div class="col">
                    <label for="fecha_inicio">Fecha retiro</label>
                    <div class="input-group">
                      <input type="text" id="fecha_inicio" name="fecha_inicio" class="form-control text-center" readonly="readonly">
                      <span class="input-group-append">
                          <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                      </span>
                    </div>
                </div>

                <div class="col fecha_entrega">
                    <label for="fecha_termino">Fecha entrega</label>
                    <div class="input-group">
                      <input type="text" id="fecha_termino" name="fecha_termino" class="form-control text-center" readonly="readonly">
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
                            <input type="number" name="adultos" class="form-control text-right" value="1">
                            <div class="input-group-append">
                                <span class="input-group-text">Adultos</span>
                            </div>
                        </div>
                        <div class="col input-group">
                            <input type="number" name="ninos" class="form-control text-right" value="0">
                            <div class="input-group-append">
                                <span class="input-group-text">Ni&ntilde;os</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">Busca tu auto</button>
        </form>
    </div>
</div>

<script>

let fechaTermino = flatpickr('#fecha_termino', {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
});

let fechaInicio = flatpickr('#fecha_inicio', {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    minDate: "today",
});

fechaInicio.set("onChange", function(d) {
    fechaTermino.set("minDate", d[0]);
});

</script>
