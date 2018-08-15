<?php

namespace App;

use App\Pais;
use App\Modulos\ReservaAuto\Sucursal;
use Illuminate\Database\Eloquent\Model;
use App\Modulos\ReservaHabitacion\Hotel;
use App\Modulos\ReservaActividad\Actividad;



class Ciudad extends Model
{
    protected $table = 'ciudades';

    protected $fillable = [
        'nombre',
        'pais_id',
    ];

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    public function sucursal()
    {
        return $this->hasMany(Sucursal::class);
    }

    public function hoteles()
    {
        return $this->hasMany(Hotel::class);
    } 
    public function actividades()
    {
        return $this->hasMany(Actividad::class);
    } 
}
