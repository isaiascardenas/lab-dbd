<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
  protected $table = 'orden_compras';

  protected $fillable = [
    'costo_total',
    'fecha_generado',
    'detalle',
    'user_id'
  ];

  /* Relaciones */

  // public function user()
  // {
  //   $this->belongsTo(User::class);
  // }
}
