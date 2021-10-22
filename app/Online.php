<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Online extends Model
{
     protected $table = 'onlines';

     protected $fillable = [
        'titulo',
        'descripcion',
        'fecha',
        'hora',
        'video',
        'enlace',
        'modal',
        'url_modal',
        'eventos_id',
        'estado',
        'nombre_enlace',
        'slug',
        'chat',
    ];

      public function evento()
    {
        return $this->belongsTo('App\Evento', 'eventos_id');
    }

}
