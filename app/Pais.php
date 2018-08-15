<?php

namespace App;

use App\Ciudad;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'paises';

    protected $fillable = [
        'nombre',
    ];

    public function ciudades()
    {
        return $this->hasMany(Ciudad::class);
    }
}
