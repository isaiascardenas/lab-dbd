<?php

namespace App;

use App\User;
use App\Banco;
use App\TipoCuenta;
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

    public function banco()
    {
        return $this->belongsTo(Banco::class);
    }

    public function tipoCuenta()
    {
        return $this->belongsTo(TipoCuenta::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
