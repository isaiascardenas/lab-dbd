@extends('layouts.app')

@section('content')
    <div class="card user-profile-card">
        <div class="card-body">

            <h2 class="card-title">
                <i class="fas fa-user user-icon"></i>
                Perfil: <h4 class="user-name"> {{ $user->nombre }} </h4>
            </h2>

            <hr>

            <div class="row">
                <div class="col-md-6 offset-2">
                    <div class="form-group row">
                        <label class="col-3" for="nombre"> Nombre </label>
                        <div class="col-9">{{ $user->nombre }}</div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3" for="rut"> Rut </label>
                        <div class="col-9">{{ $user->rut }}</div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3" for="email"> Email </label>
                        <div class="col-9">{{ $user->email }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <img class="user-img" src="{{asset('images/useravatar.png')}}">
                </div>
            </div>

            <div class="row">
                <div class="col-auto mr-auto">
                    <a href="/" class="btn btn-info float-left">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>

                <div class="col-auto">
                    <a href="/profile/users/{{ $user->id }}/edit" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
