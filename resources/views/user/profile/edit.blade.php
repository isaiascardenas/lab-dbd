@extends('layouts.app')

@section('content')

    @include('layouts.messages')

    <div class="card user-profile-card">
        <div class="card-body">

            <h2 class="card-title">
                <i class="fas fa-map-marker-alt"></i> Editar Perfil
            </h2>

            <hr>

            <div class="row">
                <div class="col-md-6 offset-2">

                    <form method="post" id="edit-user-profile-form" action="{{ action('UserProfileController@update', $user->id) }}">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="POST">

                        <div class="form-group row">
                            <label class="col-3" for="nombre"> Nombre </label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $user->nombre }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-3" for="rut"> Rut </label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="rut" id="rut" value="{{ $user->rut }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-3" for="email"> Email </label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-3" for="password"> Cambiar Contraseña </label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="password" id="password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-3" for="password_confirm"> Confirmar contraseña </label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="password_confirm" id="password_confirm">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-4">
                    <img class="user-img-edit" src="{{asset('images/useravatar.png')}}">
                </div>
            </div>

            <div class="row">
                <div class="col-auto mr-auto">
                    <a href="/profile/users/{{ $user->id }}" class="btn btn-info float-left">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>

                <div class="col-auto">
                    <a
                        class="btn btn-primary"
                        href="/profile/users/{{ $user->id }}"
                        onclick="event.preventDefault();
                        document.getElementById('edit-user-profile-form').submit();">
                        <i class="fas fa-save"></i> Guardar
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
