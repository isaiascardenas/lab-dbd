<?php

namespace App\Modulos\ReservaAuto;

use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
    ];
}
