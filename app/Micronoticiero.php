<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micronoticiero extends Model
{
    protected $fillable = [
        'descripcion',
        'estado',
    ];
}
