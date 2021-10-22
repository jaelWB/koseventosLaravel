<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ciudadesEventos extends Model
{
      protected $table = 'ciudades_eventos';

    protected $fillable = [
        'ciudades_id','eventos_id','fecha','hora','fecha_fin','timer','slug','fecha_descriptiva','orden'
    ];
    
    public function ciudad()
    {
        return $this->belongsTo('App\Ciudade', 'ciudades_id');
    }

    public function evento()
    {
        return $this->belongsTo('App\Evento', 'eventos_id');
    }

   
}
