<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
     protected $fillable = [
        'nombre','estado','imagen','tipo','eventos_id','url','orden'
    ];

    public function evento()
    {
        return $this->belongsTo('App\Evento', 'eventos_id');
    }
}
