<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Modulos\ReservaHotel\Hotel;

class Localizacion extends Model
{
    protected $table = 'localizaciones';

    protected $fillable = [
        'pais',
        'ciudad'
    ];

    public function hoteles()
    {
    	return $this->hasMany(Hotel::class);
    }
}
