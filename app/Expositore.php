<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expositore extends Model
{
    protected $fillable = [
        'nombre','resumen','estado','imagen','eventos_id','linkedin','facebook','instagram','url','twitter','tipo'
    ];

    public function evento()
    {
        return $this->belongsTo('App\Evento', 'eventos_id');
    }
}
