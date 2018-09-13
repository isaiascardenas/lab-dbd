<?php

namespace App;

use App\Cuenta;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $table = 'bancos';

    protected $fillable = [
        'nombre',
    ];

    public function cuentas()
    {
        return $this->hasMany(Cuenta::class);
    }
}
