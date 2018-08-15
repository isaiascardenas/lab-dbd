<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Cuenta extends Model
{
    protected $table = 'tipo_cuentas';

    protected $fillable = [
        'descripcion',
    ];}
