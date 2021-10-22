<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcione extends Model
{
     protected $fillable = [
                'eventos_id',
                 'pais',
                 'cedula',
                'empresa',
                'celular',
                'cargo',
                'email',
                'direccion',
                'ciudad',
                'titulo',
                'universidad',
                'nacimiento',
                'nombre',
                'apellidos',
                'ubicacion',
                'tk',
                'estado',
                'asistio',

                'asistencia',
                'telefono',
                'genero',
                'edad',
                'educacion',
                'entero',
                'whatsapp',

                
    ];

     public function evento()
    {
        return $this->belongsTo('App\Evento', 'eventos_id');
    }

     public function ciudad()
    {
        return $this->belongsTo('App\Ciudad', 'ubicacion');
    }

}
