<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table = 'cuentas';

    protected $fillable = [
        'numero_cuenta',
        'saldo',
        'tipo_cuenta_id',
        'banco_id',
        'user_id',
    ];
}
