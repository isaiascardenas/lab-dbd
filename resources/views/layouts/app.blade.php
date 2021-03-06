<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TetraVago') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <script
            defer
            src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"
            integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe"
            crossorigin="anonymous">
        </script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" type="text/css" rel="stylesheet">

        <!-- DateTimePicker-->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <!-- DataTables -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
        <script defer src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script defer src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

        <!-- Bootstrap Select -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
        <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
        <style>
          html, body {
            height: 100%;
          }
          body {
            display: flex;
            flex-direction: column;
          }

          #app {
            flex: 1 0 auto;
          }
          footer {
            flex-shrink: 0;
            background-color: rgba(106, 27, 154, 0.8);
            padding: 10px 0px;
            color: #eceff1 !important;
          }
        </style>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light navbar">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'TetraVago') }}
                    </a>
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <li>
                                <a href="/cart" class="nav-link">
                                    <i class="fas fa-shopping-cart"></i>
                                    @if (session('countReservas'))
                                      <span class="badge badge-pill badge-primary" style="position:relative;top:-10px;left:-10px;">
                                        {{ session('countReservas')  }}
                                      </span>
                                    @endif
                                </a>
                            </li>

                            <!-- Authentication Links -->
                            @guest
                                <li>
                                    <a
                                        class="nav-link"
                                        href="{{ route('login') }}"
                                        style="color: #eceff1 !important; background: rgba(255,255,255,0);">
                                        {{ __('Ingresar') }}
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="nav-link"
                                        style="color: #eceff1 !important; background: rgba(255,255,255,0);"
                                        href="{{ route('register') }}"
                                        color= "#FFFFFF">
                                        {{ __('Regístrate') }}
                                    </a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a
                                        id="navbarDropdown"
                                        class="nav-link dropdown-toggle"
                                        href="#" role="button"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false" v-pre>
                                        <i class="fas fa-user-circle"></i>
                                        {{ Auth::user()->nombre }}
                                        <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a
                                            class="dropdown-item"
                                            href="/profile/users/{{ Auth::user()->id }}">
                                            {{ __('Perfil') }}
                                        </a>
                                        @if (Auth::user()->isAdmin())
                                        <a
                                            class="dropdown-item"
                                            href="/users/">
                                            {{ __('Dashboard') }}
                                        </a>  
                                        @endif
                                        <a
                                            class="dropdown-item"
                                            href="/profile/historial">
                                            {{ __('Ver historial') }}
                                        </a>
                                        <a
                                            class="dropdown-item"
                                            href="/cuentas">
                                            {{ __('Cuentas y saldos') }}
                                        </a>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Cerrar Sesión') }}
                                        </a>
                                        <form
                                            id="logout-form"
                                            action="{{ route('logout') }}"
                                            method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>

                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>


            <main class="container py-4" style="width: 100%;">
                @yield('content')
            </main>
        </div>
        <footer class="text-center">
            &copy; 2018 {{ config('app.name', 'TetraVago') }}
            <br>
            <address>Chile - DIINF, UdeS, Santiago de Chile - 127 000 000 001</address>
            </center>
        </footer>

        @yield('script')
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });
        </script>
    </body>
</html>
