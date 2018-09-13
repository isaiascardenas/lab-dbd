@extends('layouts.app')

@section('content')
    @include('layouts.messages')

    <div class="row">

        <div class="col-3">
            <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">
                    <i class="fas fa-plane"></i>Perfil
                </a>
                <a class="nav-link" id="cuentas-tab" data-toggle="pill" href="#cuentas" role="tab" aria-controls="cuentas" aria-selected="false">
                    <i class="fas fa-building"></i>Cuentas y saldos
                </a>
            </div>
        </div>

        <div class="col-9">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    @yield('profile')
                </div>
                <div class="tab-pane fade" id="cuentas" role="tabpanel" aria-labelledby="cuentas-tab">
                    @yield('cuentas');
                </div>
            </div>
        </div>

    </div>
@endsection
