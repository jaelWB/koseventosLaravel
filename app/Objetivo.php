<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    protected $fillable = [
        'descripcion',
        'autor',
        'eventos_id',
        'estado',
        'url',
        'texto_url',
    ];

      public function evento()
    {
        return $this->belongsTo('App\Evento', 'eventos_id');
    }

}
