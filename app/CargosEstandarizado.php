<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CargosEstandarizado extends Model
{
   protected $fillable = [
        'descripcion',
        'estado',
    ];
}
