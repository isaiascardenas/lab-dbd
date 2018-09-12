<?php

namespace App;

use App\Rol;
use App\Cuenta;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'rut',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function cuentas()
    {
        return $this->hasMany(Cuenta::class);
    }

    public function roles()
    {
        $roles = \DB::table('user_rol')->where('user_id', $this->id)->get();
        return Rol::whereIn('id', $roles->pluck('rol_id'))->get();
    }

    public function isAdmin()
    {
        $rol = $this->roles()->filter(function($rol) {
            return $rol->id == 1;
        })->first();

        return $rol && $rol->id == 1;
    }
}
