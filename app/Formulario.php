<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
     protected $fillable = [
        'eventos_id','pais','cedula',
        'empresa',
        'celular',
        'cargo',
        'email',
        'direccion',
        'ciudad',
        'titulo',
        'universidad',
        'nacimiento',

        'asistencia',
        'telefono',
        'genero',
        'edad',
        'educacion',
        'entero',
        'whatsapp',

    ];

}
