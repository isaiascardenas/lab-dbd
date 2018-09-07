<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Trivago') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
	
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" type="text/css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- DateTimePicker-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script defer src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    {{-- <script defer src="https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"></script> --}}

    <!-- Datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap Select -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
	<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Trivago') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                          <!-- 
                        	<li>
                        		<a href="/cart" class="nav-link">
                        			<i class="fas fa-shopping-cart"></i>
                        			<span class="badge badge-pill badge-primary" style="position:relative;top:-10px;left:-10px;"></span>
                        		</a>
                        	</li>
                          -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user-circle"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
	
        <div class="container-fluid row">
        	<aside class="col-2 pl-0">
        		<div class="list-group list-group-flush">
        			<!-- APP -->
        			<a class="font-weight-bold list-group-item list-group-item-action disabled" href="#"><i class="fas fa-globe"></i> App</a>
        			<a class="list-group-item list-group-item-action" href="/usuarios/">Usuarios</a>
        			<!-- RESERVA ACTIVIDADES -->
        			<a class="font-weight-bold list-group-item list-group-item-action disabled" href="#"><i class="fas fa-tasks"></i> Actividades</a>
        			<!-- RESERVA AUTOS -->
        			<a class="font-weight-bold list-group-item list-group-item-action disabled" href="#"><i class="fas fa-car"></i> Autos</a>
        			<!-- RESERVA HOTELES -->
        			<a class="font-weight-bold list-group-item list-group-item-action disabled" href="#"><i class="fas fa-building"></i> Hoteles</a>
              <!-- RESERVA VUELOS -->
        			<a class="font-weight-bold list-group-item list-group-item-action disabled" href="#"><i class="fas fa-plane"></i> Vuelos</a>
        			<a class="list-group-item list-group-item-action" href="/aerolineas/">Aerol&iacute;neas</a>
        			<a class="list-group-item list-group-item-action" href="/aeropuertos/">Aeropuertos<a>
              <!--<a class="list-group-item list-group-item-action" href="/asientos/">Asientos</a>-->
              <a class="list-group-item list-group-item-action" href="/aviones/">Aviones</a>
              <a class="list-group-item list-group-item-action" href="/pasajeros/">Pasajeros</a>
              <a class="list-group-item list-group-item-action" href="/reserva-boletos/">Reserva Boletos</a>
        			<a class="list-group-item list-group-item-action" href="/tipo-asientos/">Tipo Asientos</a>
              <a class="list-group-item list-group-item-action" href="/tramos/">Tramos</a>
        		</div>
        	</aside>
          <main class="col py-3">
            @yield('content')
          </main>
        </div>

        <footer class="container-fluid mt-3 position-sticky">
        	&copy; 2018 {{ config('app.name', 'Trivago') }} Chile - <address>DIINF, UdeS, Santiago de Chile - 127 000 000 001</address>
        </footer>
    </div>

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
      });

      $('select.selectpicker').selectpicker({
          noneSelectedText: 'No se ha seleccionado nada',
          noneResultsText: 'Ningún resultado coincide con {0}',
          selectOnTab: true
      });

      $('.fechas-vuelo').datepicker({
          autoclose: true,
          clearBtn: true,
          endDate: '',
          format: 'dd-mm-yyyy',
          inputs: $('.datepicker'),
          todayHighlight: true
      });
    </script>
    @yield('script')
</body>
</html>
