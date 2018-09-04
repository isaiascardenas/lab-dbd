<div class="card bg-light">
    <div class="card-header">
        <h2><i class="fas fa-car"></i> Reserva tu auto </h2>
    </div>
    <div class="card-body">
        <form action="/autos" method="post">
            {{ csrf_field() }}

            <div class="form-group form-row align-items-end">
                <div class="col">
                    <label for="id_destino"> Cuidad </label>
                    <div class="form-group">
                        <select id="origen_id" name="origen_id" class="form-control selectpicker" title="Origen" data-live-search="true">
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
                    <label for="fecha_ida">Fecha retiro</label>
                    <input type="text" id="fecha_ida" name="fecha_ida" class="form-control text-center datepicker" readonly="readonly">
                    <span class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </span>
                </div>

                <div class="col vuelo-vuelta">
                    <label for="fecha_vuelta">Fecha entrega</label>
                    <input type="text" id="fecha_ida" name="fecha_ida" class="form-control text-center datepicker" readonly="readonly">
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
                            <input type="number" name="pasajeros" class="form-control text-right" value="1">
                            <div class="input-group-append">
                                <span class="input-group-text">Adultos</span>
                            </div>
                        </div>
                        <div class="col input-group">
                            <input type="number" name="pasajeros" class="form-control text-right" value="0">
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
