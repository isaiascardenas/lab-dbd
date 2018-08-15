<?php

namespace App;

use App\Cuenta;
use Illuminate\Database\Eloquent\Model;

class TipoCuenta extends Model
{
    protected $table = 'tipo_cuentas';

    protected $fillable = [
        'descripcion',
    ];
    public function cuentas()
    {
        return $this->hasMany(Cuenta::class);
    }
}
