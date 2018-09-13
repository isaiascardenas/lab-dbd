@extends('layouts.app')

@section('content')
  <h2>
      <i class="fas fa-cubes"></i> Paquetes
  </h2>
  
  @include('layouts.messages')
  
  <br>
  
  <div class="row">
  @foreach($paquetesVH as $paqueteVH)
    <div class="col-3 form-group">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            Paquete c/Habitación # {{ $paqueteVH->id }}
          </div>
        </div>
        <img src="https://picsum.photos/300/200?image={{ mt_rand(1, 50) }}" alt="">
        <div class="card-body">
          <p class="text-center">
            {{ $paqueteVH->reservaBoletos[0]->tramo->destino->ciudad->nombre }},
            {{ $paqueteVH->reservaBoletos[0]->tramo->destino->ciudad->pais->nombre }}
            <span class="d-block">
              {{ $paqueteVH->reservaHabitacion->duracion() }} día(s)
            </span>
          </p>

          <p class="lead text-center">
            {{ $paqueteVH->precio(TRUE) }}
          </p>

          <div class="d-block text-right">
            <a class="btn btn-sm btn-info" href="/paquetes/1/{{ $paqueteVH->id }}">
              <i class="fas fa-check"></i>
              Seleccionar
            </a>
          </div>
        </div>
      </div>
    </div>
  @endforeach

  @foreach($paquetesVA as $paqueteVA)
    <div class="col-3 form-group">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            Paquete c/Auto # {{ $paqueteVA->id }}
          </div>
        </div>
        <img src="https://picsum.photos/300/200?image={{ mt_rand(1, 50) }}" alt="">
        <div class="card-body">
          <p class="text-center">
            {{ $paqueteVA->reservaBoletos[0]->tramo->destino->ciudad->nombre }},
            {{ $paqueteVA->reservaBoletos[0]->tramo->destino->ciudad->pais->nombre }}
            <span class="badge bagde-info d-block">
              INCLUYE AUTO
            </span>
          </p>

          <p class="lead text-center">
            {{ $paqueteVA->precio(TRUE) }}
          </p>

          <div class="d-block text-right">
            <a class="btn btn-sm btn-info" href="/paquetes/2/{{ $paqueteVA->id }}">
              <i class="fas fa-check"></i>
              Seleccionar
            </a>
          </div>
        </div>
      </div>
    </div>
  @endforeach
  </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                'language': {
                    'url': 'https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                },
                'columnDefs': [
                    {'targets': 'no-sort', 'orderable': false}
                ],
                'order': [[1, 'asc']]
            });
        } );
    </script>
@endsection
