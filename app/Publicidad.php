<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicidad extends Model
{
    protected $table = 'publicidades';

     protected $fillable = [
        'nombre',
        'imagen',
        'eventos_id',
        'tipo',
        'url',
        'estado',
        'clicks',
    ];

      public function evento()
    {
        return $this->belongsTo('App\Evento', 'eventos_id');
    }

}
