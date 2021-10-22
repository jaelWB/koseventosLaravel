<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conferencia extends Model
{
    protected $fillable = [
        'nombre','descripcion','estado','imagen','eventos_id','url'
    ];

    public function evento()
    {
        return $this->belongsTo('App\Evento', 'eventos_id');
    }
}
