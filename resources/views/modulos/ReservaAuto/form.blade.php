<div class="card bg-light">
    <div class="card-header">
        <h2><i class="fas fa-car"></i> Reserva tu auto </h2>
    </div>
    <div class="card-body">
        <form action="/reserva_autos" method="get">
            {{ csrf_field() }}

            <div class="form-group form-row align-items-end">
                <div class="col">
                    <label for="sucursal_id"> Cuidad </label>
                    <div class="form-group">
                        <select id="sucursal_id" name="sucursal_id" class="form-control selectpicker" title="Ciudad" data-live-search="true">
                            @foreach ($sucursales as $sucursal)
                                <option value="{{ $sucursal->id }}">
                                {{ $sucursal->compania->nombre }}, {{$sucursal->ciudad->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group form-row align-items-end">
                <div class="col">
                    <label for="fecha_inicio">Fecha retiro</label>
                    <input type="text" id="fecha_inicio" name="fecha_inicio" class="form-control text-center datepicker" readonly="readonly">
                    <span class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </span>
                </div>

                <div class="col fecha_entrega">
                    <label for="fecha_termino">Fecha entrega</label>
                    <input type="text" id="fecha_termino" name="fecha_termino" class="form-control text-center datepicker" readonly="readonly">
                    <span class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </span>
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
